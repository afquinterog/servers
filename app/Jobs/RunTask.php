<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Log;
use Facades\App\Tasks\TaskRunner;

class RunTask implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * The number of seconds the job can run before timing out.
     *
     * @var int
     */
    public $timeout = 60 ;

    protected $server;

    protected $task;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($server, $task)
    {
        $this->server = $server;
        $this->task = $task;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Log::info("Run the task {$this->task->code} in the server {$this->server->name} ");

        $result = TaskRunner::run($this->server, $this->task);

        //Save task results in database
        Log::info('Task results =' . $result);
        Log::info('Save the task results in database');

    }
}
