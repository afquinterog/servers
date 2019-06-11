<?php

namespace App\Observers;

use App\Models\Deployment;

class DeploymentObserver
{
    /**
     * Handle the deployment "created" event.
     *
     * @param  \App\ServerMetric  $serverMetric
     * @return void
     */
    public function created(Deployment $deployment)
    {
    }
}
