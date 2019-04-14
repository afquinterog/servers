<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Facades\App\Helpers\Aws;
use Illuminate\Support\Facades\DB;
use Laravel\Nova\Actions\Actionable;

use App\Models\ServerMetric;
use App\Models\ServerAlert;
use App\Helpers\Metrics;
use App\Notifications\ServerThresholdReached;

class Server extends Model
{
    use Actionable;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'instance_created_at',
    ];

    /**
     * Get the server type
     */
    public function serverType()
    {
        return $this->belongsTo('App\Models\ServerType');
    }

    /**
     * Get the server metrics
     */
    public function serverMetrics()
    {
        return $this->hasMany('App\Models\ServerMetric');
    }

    /**
     * Get the server alerts
     */
    public function serverAlerts()
    {
        return $this->hasMany('App\Models\ServerAlert');
    }

    /**
     * Get the server task results
     */
    public function tasks()
    {
        return $this->hasMany('App\Models\TaskResult');
    }

    /**
     * Get the server parameters
     */
    public function serverParameters()
    {
        return $this->hasMany('App\Models\ServerParameter');
    }

    /**
     * Get the server name
     *
     * @param  string  $value
     * @return string
     */
    public function getNameAttribute($value)
    {
        return $value;
    }

    /**
     * Ping the server
     *
     * @return void
     */
    public function ping()
    {
        $this->ping_at = now();
        $this->save();
    }

    /**
     * Get the server last update
     *
     * @param  string  $value
     * @return string
     */
    public function getLastUpdateAttribute($value)
    {
        return "15 seconds ago";
    }

    public function getPingAtForHummans()
    {
        return \Carbon\Carbon::createFromTimeStamp(strtotime($this->ping_at))->diffForHumans();
    }


    /**
     * Check if the metric triggered a server alert
     * 
     * @param  array $messages The messages to store
     * @return void
     */
    public function checkMetric($metric)
    {
        $users = $this->serverType->company->users()->get();
        $alerts = $this->serverAlerts()->ofType($metric->metric_type_id)->get();

        foreach ($alerts as $alert) {
            \Log::info($alert->limit . "/" . $alert->message);
            if ($metric->value > $alert->limit) {
                $msg = str_replace("SERVER_VALUE", $this->name, $alert->message);
                $msg = str_replace("ACTUAL_VALUE", $metric->value, $msg);
                //Dispatch job to notify alert threshold passed to user
                foreach ($users as $user) {
                    $user->notify(new ServerThresholdReached($this->name, $msg));
                }
            }
        }
    }


    /**
     * Hook to get server metrics
     * 
     * @param  array $messages The messages to store
     * @return void
     */
    public function hookMetrics($request)
    {
    //SAmple call
    //http://localhost:8000/hookServerMetrics?server=1&disk=25&mem=822/992|82.86|&cpu=90&con=1&ip=1&memc=50&token=pTX7s2h9FlmVB7lWDmAucUaN2A85NHO9JyZcvL2T
    //    
        $token = isset($request['token']) ? $request['token'] : "";
        
        if ($token == config('constants.METRICS_TOKEN')) {

            //Get metrics information array from helperf
            $metricsHelper = resolve('App\Helpers\Metrics');
            $metrics = $metricsHelper->parseServerInformation($request);

            //Find server 
            $server = Server::findOrFail($request['server']);
            $server->ping();

            foreach ($metrics as $metric) {
                $server->serverMetrics()->save(new ServerMetric($metric));
            }
        }
    }



    public function setEnvironmentVariable($name, $value)
    {
        $actualValue = $this->serverParameters->where('name', $name)->first();

        if ($actualValue) {
            $actualValue->value = $value;
            $result = $actualValue->save();
        } else {
            $variable = new ServerParameter([
                'name' => $name,
                'value' => $value
            ]);
            $result = $this->serverParameters()->save($variable);
        }

        return $result;
    }

    public function getParameter($name)
    {
        return $this->serverParameters()->where('name', $name)->first()->value;
    }

    public function getPriceAttribute($value)
    {
        return $this->getServerPrice();
    }

    public function getServerPrice()
    {
        //Get the server cost
        if ($this->instance_created_at) {
            $value = ($this->instance_created_at->diffInSeconds(now()) / 3600) * $this->cost;
            return number_format($value, 2) . " US ";
        }

        return "";
    }


    public function setStateRunning()
    {
        $this->status = "running";
        $this->active = 1;
        $this->save();
    }

    public function deleteInstance()
    {
        if ($this->code != "") {
            $result = "";
            $result = Aws::terminateInstance($this->code);

            $schema = $this->getParameter("SCHEMA");

            $this->code = $this->ip = "";
            $this->save();

            if ($schema) {
                $deleteSchema = DB::connection('shared-database')->statement("drop schema {$schema} cascade");
            }

            return $result;
        }

    }



}
