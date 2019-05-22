<?php

namespace App\Tasks;

use Illuminate\Support\Facades\DB;
use App\Cloud\GenericCloudProvider;


class DeployTask extends GenericTask
{

    public function run($instance, $task)
    {

        //Get server parameters
        //$schema = $application->getParameter("SCHEMA") ?? "";

        $task = "cd /var/www/v2.bioscann.org";

        \Log::info('execute on=' . $instance->server->ip );

        return "action executed";

        //$result = $this->executeRemoteTask($instance->server->ip, $task);



    }

    public function updateServer($server, $instanceId){
        $server->code = $instanceId;
        $server->status = "creating";
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
        $parameters =[
            'instance' => $server->code,
            'profile' => 'venture'
        ];

        $result = $this->provider->getInstanceData($parameters);
        $server->ip = $this->provider->extractValue($result, "PublicIpAddress");
        //$server->ip = Aws::getServerIp($result);

        //Set server instance date
        $server->instance_created_at = now();
        $server->save(); 
    }

    public function configureApi($server, $schema, $partnerName, $syndicationTenantId, $syndicationAuthToken)
    {

       $task = "cd /home/ubuntu/scripts \n
               ./configure_api.sh $schema $partnerName $syndicationTenantId $syndicationAuthToken";

       $result = $this->executeRemoteTask($server->ip, $task);

       return $result;
    }

    public function configureUi($server, $domain, $uiBranch)
    {

        $adminBranch = $accountsBranch = $txactBranch = $uiBranch;

        $task = "cd /home/ubuntu/scripts \n
                ./init.sh $domain";

        //echo $task;
        //echo $ui->ip . " / ". $task;
        $result = $this->executeRemoteTask($server->ip, $task);
        
        //Configure admin application
        $task = "cd /home/ubuntu/scripts \n
                ./update-code.sh {$domain} admin {$adminBranch}  ";
        $result .= $this->executeRemoteTask($server->ip, $task); 

        $task = "cd /home/ubuntu/scripts \n
                ./update-code.sh {$domain} accounts {$accountsBranch}  ";
        $result .= $this->executeRemoteTask($server->ip, $task);
        
        $task = "cd /home/ubuntu/scripts \n
                ./update-code.sh {$domain} txact {$txactBranch}  ";
        $result .= $this->executeRemoteTask($server->ip, $task); 

        return $result;
        
    }

    public function afterRun($results)
    {
        echo $results;
    }
}