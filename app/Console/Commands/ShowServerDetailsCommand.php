<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Server;
use App\User;
use Facades\App\Helpers\Console;
use App\Jobs\SampleJob;

class ShowServerDetailsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'devenv:server-details {--server= : Server id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Show server detailed information';

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

        SampleJob::dispatch();
        
        $server = $this->option('server');

        $server = Server::with('serverParameters:id,name,value,server_id')->findOrFail($server);

        Console::showTitle($this, 'Server Parameters');

        $headers = ['Id', 'Name', 'Value', 'Server Id'];
        $this->table($headers, $server->serverParameters );


        // $users = User::all();
        // $bar = $this->output->createProgressBar(count($users));
        // $bar->start();

        // foreach ($users as $user) {
        //     //$this->performTask($user);
        //     sleep(4);

        //     $bar->advance();
        // }

        // $bar->finish();

    }
}
