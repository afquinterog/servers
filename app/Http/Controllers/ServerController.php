<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Server;

class ServerController extends Controller
{
    /**
     * Hook to enable server's to send his metrics
     */
    public function hookMetrics(Request $request, Server $server){
        print_r($request->all());
        return $server->hookMetrics( $request->all() );
    }
}
