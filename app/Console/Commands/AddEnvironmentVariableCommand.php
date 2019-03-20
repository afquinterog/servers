<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Server;
use App\Models\ServerParameter;

class AddEnvironmentVariableCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'devenv:server-set-env-var {--server= : Server id}
                                                      {--name= : Variable name}
                                                      {--value= : Variable value}
                                               ';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Set an environment variable to a server';

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
        //Get environment name
        $server = $this->option('server');
        $name = $this->option('name');
        $value = $this->option('value');

        $server = Server::with('serverParameters')->findOrFail($server);

        $server->setEnvironmentVariable($name, $value);

        $this->info("Settting/Updating {$name}={$value} on {$server->name}");
    }
}
