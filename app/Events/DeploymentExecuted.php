<?php

namespace App\Events;

use App\Models\Deployment;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class DeploymentExecuted implements ShouldQueue
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
    * The deployment
    */
    private $deployment;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Deployment $deployment)
    {
        $this->deployment = $deployment;
    }

    /**
    * Get the deployment
    */
    public function getDeployment()
    {
        return $this->deployment;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('app-deployment');
    }
}
