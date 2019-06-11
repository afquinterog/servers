<?php

namespace App\Listeners;

use App\Events\DeploymentExecuted;
use Illuminate\Queue\InteractsWithQueue;
use App\Notifications\ApplicationDeployed;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Notification;

class DeploymentMailNotification implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  DeploymentExecuted  $event
     * @return void
     */
    public function handle(DeploymentExecuted $event)
    {
        $deployment = $event->getDeployment();

        $users = $deployment->instance->application->notifications;

        $notification = new ApplicationDeployed($deployment);

        Notification::send($users, $notification );
    }
}
