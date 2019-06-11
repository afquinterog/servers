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
     * Get the application notifications
     */
    public function notifications()
    {
        return $this->hasMany('App\Models\ApplicationNotification');
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
     * Get application notifications
     */
    public function emailNotifications()
    {
        return $this->hasMany('App\Models\ApplicationParameter')->where('name','EMAIL_NOTIFICATIONS');
    }

    /**
     * Get the company
     */
    public function company()
    {
        return $this->belongsTo('App\Models\Company');
    }


}
