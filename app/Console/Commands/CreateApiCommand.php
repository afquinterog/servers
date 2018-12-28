<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Log;
use App\Models\Server;
use Facades\App\Helpers\Aws;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class CreateApiCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'devenv:create-api {--name= : Environment name}
                                              {--schema= : Schema name}
    ';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create an api dev environment on aws';


    

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
        $this->info("Starting api dev environment creation ...");

        //Get environment name
        $name = $this->option('name') ? $this->option('name') : "api-server-" . date("Y-m-d") ;
        
        //Get the tenant schema
        $schema = $this->option('schema') ;

        $result = Aws::createApiInstance();

        echo $result;

        $instanceId = Aws::getInstanceValue($result, '"InstanceId":' );

        //Save server in database
        $this->createServer($instanceId, $name, $schema);

        $this->info("Api dev environment created sucessfully!");
    }

    


    public function createServer($instanceId, $name, $schema){
        $server = new Server();

        $server->code = $instanceId;
        $server->name = $name;
        $server->server_type_id = Config::get('constants.AWS.API_SERVER_TYPE');

        $server->save();

        //Create the server schema on shared database
        $createSchema =  DB::connection('shared-database')->statement("create schema {$schema}" );

        
    }
    
}
