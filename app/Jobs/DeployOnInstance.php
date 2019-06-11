<?php

namespace App\Jobs;

use App\Models\Task;
use App\Models\Commit;
use App\Models\Instance;
use App\Models\Deployment;
use Illuminate\Bus\Queueable;
use Facades\App\Tasks\TaskRunner;
use App\Events\DeploymentExecuted;
use Facades\App\Deployments\Deploy;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

/**
 * Deploy code on a specific instance
 * The deploy will look for deploy.sh that is the file that should take care of the deployment
 */
class DeployOnInstance implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * The instance
     *
     * @var Instance
     */
    protected $instance;

    /**
     * The commit to deploy
     *
     * @var Commit
     */
    protected $commit;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Instance $instance, Commit $commit)
    {
        $this->instance = $instance;
        $this->commit = $commit;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $remoteTask = Deploy::script($this->instance, $this->commit);

        $result = TaskRunner::custom($this->instance->server, $remoteTask );

        $deployment = Deploy::history($this->instance, $this->commit, $result );

        event( new DeploymentExecuted($deployment));

        //$remoteTask= "cd {$route} && git reset --hard {$commit}";
        //$remoteTask= "cd {$route} && ./deploy.sh";

        // \Log::info('execute task on remote server=' . $remoteTask);

        // $result = TaskRunner::custom($this->instance->server, $remoteTask );

        // \Log::info($result);

        // //save new deployment on the instance
        // $deployment = new Deployment();
        // $deployment->branch = $this->commit->branch;
        // $deployment->author = $this->commit->author;
        // $deployment->url = $this->commit->url;
        // $deployment->previous = $this->commit->previous;
        // $deployment->actual = $this->commit->actual;
        // $deployment->message = $this->commit->message;
        // $deployment->result = $result;

        // $this->instance->deployments()->save($deployment);
    }
}
