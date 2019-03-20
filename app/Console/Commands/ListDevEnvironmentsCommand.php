<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Server;
use Facades\App\Helpers\Aws;
use App\Cloud\GenericCloudProvider;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;

class ListDevEnvironmentsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'devenv:list';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'List develop environments';

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
    public function handle(GenericCloudProvider $provider)
    {
        $headers = ['Id', 'Name', 'IP', 'Price'];
        $columns = ['id','name', 'ip','code', 'cost', 'instance_created_at'];

        $servers = Server::whereIn('server_type_id', [1,2] )->get( $columns );
        //->toArray();

        foreach($servers as $server){

            if( !$server->ip && $server->code ){
                //Get instance information
                //$cmdData = 'ec2 describe-instances --instance-ids %s --profile venture';
                //$cmd = sprintf('/usr/local/bin/aws ' . $cmdData, $server->code );
                
                $result = $provider->getInstanceData(['instance' => $server->code, 
                    'profile' => Config::get('constants.AWS.PROFILE')] );
                //$result = Aws::executeCommand($cmd);

                $server->ip = $provider->extractValue($result, "PublicIpAddress");
                $server->save();
                unset($server->updated_at);
            }
            
            $server->price = $server->getServerPrice();
            unset($server->code, $server->cost, $server->instance_created_at);
            
        }
        
        $this->table($headers, $servers );
    }
}