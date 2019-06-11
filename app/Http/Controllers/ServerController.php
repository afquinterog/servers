<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Server;

class ServerController extends Controller
{
    /**
     * @param  Request $request
     * @return view
     */
    public function index(Request $request)
    {
        return view('marketing.index');
    }

    /**
     * Hook to enable server's to send his metrics
     */
    public function hookMetrics(Request $request, Server $server){
        return $server->hookMetrics( $request->all() );
    }
}
