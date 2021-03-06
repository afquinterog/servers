<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Observers\MetricObserver;

class ServerMetric extends Model
{

    protected $guarded = [];

    /**
     * The event map for the model.
     *
     * @var array
     */
    protected $dispatchesEvents = [
        'created' => MetricObserver::class
    ];
    
    /**
     * Get the metric type
     */
    public function metricType()
    {
        return $this->belongsTo('App\Models\MetricType');
    }

    /**
     * Get the server 
     */
    public function server()
    {
        return $this->belongsTo('App\Models\Server');
    }

}
