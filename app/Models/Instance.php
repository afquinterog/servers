<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Instance extends Model
{
    /**
     * Get the application
     */
    public function application()
    {
        return $this->belongsTo('App\Models\Application');
    }

    /**
     * Get the server
     */
    public function server()
    {
        return $this->belongsTo('App\Models\Server');
    }

    public function getLastCommit(){
        return $this->application->commits()->latest()->first();
    }

    /**
     * Get the instance deployments
     */
    public function deployments()
    {
        return $this->hasMany('App\Models\Deployment');
    }

    /**
     * Mark the instance as out of date so new deployments needs to be pushed on it
     */
    public function markUpToDate($updated){
        $this->updated = 0;
        $this->save();
    }
}
