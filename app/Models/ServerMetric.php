<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServerMetric extends Model
{
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
