<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Server;
use App\Traits\RemoteExecution;
use Facades\App\Helpers\Aws;
use Illuminate\Support\Facades\DB;

class CreateStagingEnvCommand extends Command
{
    use RemoteExecution;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'devenv:create-staging-env {--server= : Server unique id}
                                                 {--schema= : Tenant Schema}
                                                 {--domain= : Application domain}
                                                 {--partner-name= : Partner Name}
                                                 {--syndication-tenant-id= : Syndication tenant id}
                                                 {--syndication-auth-token= : Syndication authentication token}
                                                 {--ui-branch= : Branch used on the ui applications}
    ';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Configure an AWS server with venture staging env';

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
        //Get options
        $server = $this->option('server') ;
        $schema = $this->option('schema') ;
        $partnerName = $this->option('partner-name') ;
        $domain = $this->option('domain') ;
        $syndicationTenantId = $this->option('syndication-tenant-id') ;
        $syndicationAuthToken = $this->option('syndication-auth-token') ;
        $uiBranch = $this->option('ui-branch', 'admin') ;


        $server = Server::find($server);
        $this->info("Configuring staging env {$server->name} ");

        //Launch instance
        $result = Aws::createStagingInstance();

        $instanceId = Aws::getInstanceValue($result, '"InstanceId":' );

        //Save server in database
        $this->updateServer($server, $instanceId);

        //Create the schema on shared database
        $this->createSchemaSharedDatabase($schema);

        sleep(3);

        $this->getServerIp($server);

        $this->configureApi($server, $schema,  $partnerName, $syndicationTenantId, $syndicationAuthToken);

        //$this->configureUi($server, $domain, $uiBranch);

        

    }

    public function updateServer($server, $instanceId){
        $server->code = $instanceId;
        //$server->server_type_id = Config::get('constants.AWS.STAGING_SERVER_TYPE');
        $server->save();
    }

    public function createSchemaSharedDatabase($schema)
    {   
        //Create the server schema on shared database
        $createSchema = DB::connection('shared-database')->statement("create schema {$schema}" );
    }

    public function getServerIp($server)
    {
        $result = Aws::getInstanceData($server->code, "venture");
        $server->ip = Aws::getServerIp($result);;
        $server->save(); 
    }

    public function configureApi($server, $schema, $partnerName, $syndicationTenantId, $syndicationAuthToken)
    {
        $command =  
        " envoy run  execute " .  
        " --route=/home/ubuntu " . 
        " --server=server " ;

       /*$task = "cd /home/ubuntu/scripts \n
               ./configure_api.sh $schema $partnerName $syndicationTenantId $syndicationAuthToken";*/

        $task = "cd /home/ubuntu/scripts \n
                 ls -al ";

       //echo $task;
       //echo $ui->ip . " / ". $task;
       $result = $this->executeRemoteTask($server->ip, $task);
       echo $result;

       $this->info("Api has been configured properly");
    }

    public function configureUi($server, $domain, $uiBranch)
    {

        $adminBranch = $accountsBranch = $txactBranch = $uiBranch;

        $command =  
             " envoy run  execute " .  
             " --route=/home/ubuntu " . 
             " --server=server " ;

            $task = "cd /home/ubuntu/scripts \n
                    ./init.sh $domain";

            //echo $task;
            //echo $ui->ip . " / ". $task;
            $result = $this->executeRemoteTask($server->ip, $task, $command);
            echo $result;
           
            //Configure admin application
            $task = "cd /home/ubuntu/scripts \n
                    ./update-code.sh {$domain} admin {$adminBranch}  ";
            $result = $this->executeRemoteTask($server->ip, $task, $command); 
            $this->info($result);

            $task = "cd /home/ubuntu/scripts \n
                    ./update-code.sh {$domain} accounts {$accountsBranch}  ";
            $result = $this->executeRemoteTask($server->ip, $task, $command);
            $this->info($result);
            
            $task = "cd /home/ubuntu/scripts \n
                    ./update-code.sh {$domain} txact {$txactBranch}  ";
            $result = $this->executeRemoteTask($server->ip, $task, $command); 
            $this->info($result);

            $this->info("{$server->name} has been configured properly");
    }
}
