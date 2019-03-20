<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Log;
use App\Models\Server;
use Facades\App\Helpers\Aws;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use App\Traits\RemoteExecution;
use App\Models\Task;
use Facades\App\Tasks\TaskRunner;
use App\Jobs\RunTask;

class ExecuteTaskCommand extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'devenv:execute-task {--server= : Server id}
                                                {--task= : Task code}
    ';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run a task on a server';


    

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info("Starting task execution ...");

        //Get environment name
        $server = $this->option('server');
        $task = $this->option('task');

        $server = Server::findOrFail($server);
        $task = Task::where('code', $task )->firstOrFail();

        //$result = TaskRunner::run($server, $task);
        RunTask::dispatch($server, $task)
            ->delay(now()->addMinutes(2));
        
        //$this->testTask($server);

        //$this->info($result);
        
        $this->info("Task scheduled sucessfully!");
    }
    
}
