<?php

namespace App\Nova\Metrics;

use Illuminate\Http\Request;
use Laravel\Nova\Metrics\Trend;
use App\Models\ServerMetric;

class ServerConnections extends Trend
{
    /**
     * Calculate the value of the metric.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function calculate(Request $request)
    {
        $data = ServerMetric::where('server_id', $request->resourceId)
            ->where('metric_type_id', 5);

        return $this->averageByHours($request, $data, 'value')->showLatestValue();
    }

    /**
     * Get the ranges available for the metric.
     *
     * @return array
     */
    public function ranges()
    {
        return [
            12 => '12 Hours',
            24 => '24 Hours',
            168 => 'Last week',
        ];
    }

    /**
     * Determine for how many minutes the metric should be cached.
     *
     * @return  \DateTimeInterface|\DateInterval|float|int
     */
    public function cacheFor()
    {
        // return now()->addMinutes(5);
    }

    /**
     * Get the URI key for the metric.
     *
     * @return string
     */
    public function uriKey()
    {
        return 'server-connections';
    }
}
