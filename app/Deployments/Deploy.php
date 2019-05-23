<?php

namespace App\Deployments;

use App\Models\Instance;
use App\Models\Deployment;
use App\Models\Commit;
use App\Jobs\DeployOnInstance;

/**
 * Handle commmon operations for the deployment process
 */
class Deploy
{
    const DEPLOYMENT_FILE = './deploy.sh';

    public function script($instance, $commit){

        $deploymentFile = self::DEPLOYMENT_FILE;

        $addServerKey = "eval $(ssh-agent) ; ssh-add /home/ubuntu/keys/{$instance->server->key};";

        $remoteTask= $addServerKey . "cd {$instance->route} && {$deploymentFile}";

        return $remoteTask;

    }

    public function history($instance, $commit, $result){
        $deployment = new Deployment();
        $deployment->branch = $commit->branch;
        $deployment->author = $commit->author;
        $deployment->url = $commit->url;
        $deployment->previous = $commit->previous;
        $deployment->actual = $commit->actual;
        $deployment->message = $commit->message;
        $deployment->result = $result;

        $instance->deployments()->save($deployment);
    }

    /**
     * Apply a commit on the application instances
     */
    public function apply(Commit $commit){

        //get application
        $application = $commit->application;

        //get application instances
        foreach($application->instances as $instance){
            \Log::info('check ' . $instance->id . " / " . $instance->branch);

            $instance->autodeploy ? dispatch( new DeployOnInstance($instance, $commit) ) : $instance->markUpdated(0);
            
        }

    }

}