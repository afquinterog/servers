<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Deployments\GithubParser;
use Facades\App\Deployments\Deploy;

class DeploymentController extends Controller
{
    /**
     * Hook to enable github deployments
     */
    public function hookGithub(Request $request, GithubParser $githubParser){
        $data = $request->all();
        $token = $request->input('token', ' ' );

        if($token == config('constants.DEPLOY_TOKEN') ){
            $commit = $githubParser->parse($data);
            Deploy::apply($commit);
        }
    }
}
