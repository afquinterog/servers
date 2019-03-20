<?php

namespace App\Observers;

use App\Models\ServerMetric;

class MetricObserver
{
    /**
     * Handle the server metric "created" event.
     *
     * @param  \App\ServerMetric  $serverMetric
     * @return void
     */
    public function created(ServerMetric $serverMetric)
    {
        \Log::info("metric created = " . $serverMetric->id . " /" . $serverMetric->value);
        //Get the server
        $server = $serverMetric->server()->first();
        $server->checkMetric($serverMetric);
    }

    /**
     * Handle the server metric "updated" event.
     *
     * @param  \App\ServerMetric  $serverMetric
     * @return void
     */
    public function updated(ServerMetric $serverMetric)
    {
        //
    }

    /**
     * Handle the server metric "deleted" event.
     *
     * @param  \App\ServerMetric  $serverMetric
     * @return void
     */
    public function deleted(ServerMetric $serverMetric)
    {
        //
    }

    /**
     * Handle the server metric "restored" event.
     *
     * @param  \App\ServerMetric  $serverMetric
     * @return void
     */
    public function restored(ServerMetric $serverMetric)
    {
        //
    }

    /**
     * Handle the server metric "force deleted" event.
     *
     * @param  \App\ServerMetric  $serverMetric
     * @return void
     */
    public function forceDeleted(ServerMetric $serverMetric)
    {
        //
    }
}
