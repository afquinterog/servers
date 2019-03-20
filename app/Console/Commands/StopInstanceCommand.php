<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Server;
use Facades\App\Helpers\Aws;
use Illuminate\Support\Facades\Log;

class StopInstanceCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'devenv:server-stop-instance {--server= : Server id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Stop the instance associated with the server';

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
        $this->info("Stopping the instance associated with the server ...");

        //Get server and task
        $server = $this->option('server');

        $server = Server::findOrFail($server);

        if( $server->code ){
            $this->info('Stop the instance' . $server->instance );

            //Launch instance
            //$result = Aws::terminateInstance($server->code);

            $result = $server->deleteInstance();

            //$schema = $server->getParameter("SCHEMA");

            //$this->info("Delete schema {$schema}");


            //Create the server schema on shared database
            //$createSchema = DB::connection('shared-database')->statement("delete schema {$schema} cascade" );
    

            $this->info( $result );

            $this->info( "Instance terminate operation initiated ..." );

        }
        else{
            $this->info('There is not instance associated to this server' );
        }
    }
}
