<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Server;
use Facades\App\Helpers\Aws;

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
    public function handle()
    {
        $headers = ['Id', 'Name', 'IP'];

        $servers = Server::whereIn('server_type_id', [1,2] )->get(['id','name', 'ip','code']);
        //->toArray();

        foreach($servers as $server){

            if( ! $server->ip ){
                //Get instance information
                $cmdData = 'ec2 describe-instances --instance-ids %s --profile venture';
                $cmd = sprintf('/usr/local/bin/aws ' . $cmdData, $server->code );
                $result = Aws::executeCommand($cmd);
                $server->ip = Aws::getServerIp($result);;
                $server->save();
                unset($server->updated_at);
            }
            unset($server->code);
        }
        
        $this->table($headers, $servers );
    }
}