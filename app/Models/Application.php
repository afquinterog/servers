<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{

    /**
     * Get the application commits
     */
    public function commits()
    {
        return $this->hasMany('App\Models\Commit');
    }

    /**
     * Get the instances where the application is running
     */
    public function instances()
    {
        return $this->hasMany('App\Models\Instance');
    }

    /**
     * The application deployments
     */
    public function deployments()
    {
        return $this->hasManyThrough('App\Models\Deployment', 'App\Models\Instance');
    }

    /**
     * Get the application parameters
     */
    public function applicationParameters()
    {
        return $this->hasMany('App\Models\ApplicationParameter');
    }

    /**
     * Get the company
     */
    public function company()
    {
        return $this->belongsTo('App\Models\Company');
    }

    
}
