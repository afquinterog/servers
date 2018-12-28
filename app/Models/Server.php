<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Server extends Model
{
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
     * Get the server last update
     *
     * @param  string  $value
     * @return string
     */
    public function getLastUpdateAttribute($value)
    {
        return "15 seconds ago"; 
    }
}
