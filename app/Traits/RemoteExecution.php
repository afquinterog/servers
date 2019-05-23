<?php

namespace App\Traits;

use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Illuminate\Support\Facades\Log;

trait RemoteExecution
{

    static $command =  "/home/ubuntu/.composer/vendor/bin/envoy run execute" ;
        
    /**
     * Execute a task on remote server
     *
     * @param $ip the server ip
     * @param $command the command that will run the task
     * @param $task the task to execute
     * 
     * @return string result of the command
     */
    public function executeRemoteTask($ip, $key, $task){

        if( !env('REMOTE_TASK_DEBUG') ){

            $previous = "eval $(ssh-agent); ssh-add /home/ubuntu/keys/{$key};";
            //Change the actual path to be the main path and get the envoy file
            chdir( base_path() );

            //Create the envoy file
            $file = file_get_contents('./Envoy.blade.php.tmpl', true);


            $file = str_replace( "TAG_SERVER_IP", $ip, $file);
            $file = str_replace( "TAG_CONTENT", $task, $file);

            file_put_contents('Envoy.blade.php', $file);

            $process = new Process( $previous . self::$command );
            $process->setTimeout(60);
            $process->run();

            if (!$process->isSuccessful()) {
                $result = $process->getErrorOutput();
                throw new ProcessFailedException($process);
            }

            $result = $process->getOutput();
            Log::info($result);

            unlink('Envoy.blade.php');
        
            return $result;
        }else{
            Log::info("Executing the task {$task} on the ip {$ip}");
            return "Test remote execution result";
        }
        
        
    }
}