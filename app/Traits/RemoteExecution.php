<?php

namespace App\Traits;

use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

trait RemoteExecution
{

    static $command =  
        " envoy run  execute " .  
        " --route=/home/ubuntu " . 
        " --server=server " ;
        
    /**
     * Execute a task on remote server
     *
     * @param $ip the server ip
     * @param $command the command that will run the task
     * @param $task the task to execute
     * 
     * @return string result of the command
     */
    public function executeRemoteTask($ip, $task){

        //Change the actual path to be the main path and get the envoy file
        chdir( base_path() );

        //Create the envoy file
        $file = file_get_contents('./Envoy.blade.php.tmpl', true);


        $file = str_replace( "TAG_SERVER_IP", $ip, $file);
        $file = str_replace( "TAG_CONTENT", $task, $file);

        file_put_contents('Envoy.blade.php', $file);

        echo $command;

        $process = new Process( $command );
        $process->setTimeout(60*20);
        $process->run();

        if (!$process->isSuccessful()) {
            $result = $process->getErrorOutput();
            throw new ProcessFailedException($process);
        }


        $result = $process->getOutput();

        unlink('Envoy.blade.php');
    
        return $result;
        
    }
}