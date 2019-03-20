<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Server;

class CreateServerCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'devenv:server-create {--name= : Server Name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new server';

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
        $name = $this->option('name');

        $server = (new Server(['name'=> $name,
            'cost' => 0.023,
            'server_type_id' => 1 
        ]))->save();


        $this->info("New server created");
    }
}
