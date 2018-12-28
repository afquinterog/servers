<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Facades\App\Helpers\Aws;
use App\Models\Server;
use Illuminate\Support\Facades\Config;
use App\Traits\RemoteExecution;

class CreateUiCommand extends Command
{
    use RemoteExecution;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'devenv:create-ui {--name= : Environment name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create an ui dev environment on aws';

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
        $this->info("Starting ui dev environment creation ...");

        //Get environment name
        $name = $this->option('name') ? $this->option('name') : "ui-server-" . date("Y-m-d") ;

        $result = Aws::createUiInstance();

        $instanceId = Aws::getInstanceValue($result, '"InstanceId":' );

        //Save server in database
        $this->createServer($instanceId, $name);

        // $ip = '54.84.242.152';
        // $task = "cd /home/ubuntu \n" .
        //     "cd /home/ubuntu/api \n".
        //     "ls -al ";

        // $command =  
        //     " envoy run  execute " .  
        //     " --route=/home/ubuntu " . 
        //     " --server=server " ;

        // $result = $this->executeRemoteTask($ip, $task, $command);

        //echo $result;

        $this->info("Ui dev environment created sucessfully!");
    }

    public function createServer($instanceId, $name){
        $server = new Server();

        $server->code = $instanceId;
        $server->name = $name;
        $server->server_type_id = Config::get('constants.AWS.UI_SERVER_TYPE');

        $server->save();
    }

    
}
