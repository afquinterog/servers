<?php

namespace App\Observers;

use App\Models\Server;

class ServerObserver
{
    /**
     * Handle the server "created" event.
     *
     * @param  \App\Server  $server
     * @return void
     */
    public function creating(Server $server)
    {
        //generate a unique token 
        $server->token = str_random(25);

        //create task to generate ssh key
        //$server->createSshKey()
    }

    /**
     * Handle the server "updated" event.
     *
     * @param  \App\Server  $server
     * @return void
     */
    public function updated(Server $server)
    {
        //
    }

    /**
     * Handle the server "deleted" event.
     *
     * @param  \App\Server  $server
     * @return void
     */
    public function deleted(Server $server)
    {
        //
    }

    /**
     * Handle the server "restored" event.
     *
     * @param  \App\Server  $server
     * @return void
     */
    public function restored(Server $server)
    {
        //
    }

    /**
     * Handle the server "force deleted" event.
     *
     * @param  \App\Server  $server
     * @return void
     */
    public function forceDeleted(Server $server)
    {
        //
    }
}
