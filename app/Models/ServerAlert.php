<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServerAlert extends Model
{
    /**
     * Get the server 
     */
    public function server()
    {
        return $this->belongsTo('App\Models\Server');
    }

    /**
     * Get the metric type
     */
    public function metricType()
    {
        return $this->belongsTo('App\Models\MetricType');
    }

    /**
     * Scope a query to only include metrics of a given type.
     *
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @param  mixed $type
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfType($query, $type)
    {
        return $query->where('metric_type_id', $type);
    }
}
