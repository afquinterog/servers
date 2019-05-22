<?php

namespace App\Tasks;

use App\Traits\RemoteExecution;
use App\Notifications\TaskExecuted;
use Illuminate\Support\Facades\Notification;
use App\Cloud\GenericCloudProvider;
use App\Models\TaskResult;

class TaskRunner
{
    use RemoteExecution;


    public function custom($server, $script){
        \Log::info("server=".$server);
        \Log::info("script=".$script);
        $result = $this->executeRemoteTask($server->ip, $script);
        return $result;
    }

    public function run($instance, $task)
    {
        //Replace task with server environment variables
        if ($task->content) {
            $this->injectInstanceVariablesInTask($instance, $task);
        }

        if ($task->custom) {
            $customTask = new $task->custom();
            $result = $customTask->run($instance, $task);
        } else {
            $result = $this->executeRemoteTask($server->ip, $task->content);
        }

        //Update server status
        //$server->setStateRunning();
        
        //Save task execution results associated to server
        $taskResult = new TaskResult(['results' => $result, 'task_id' => $task->id]);
        $instance->server->tasks()->save($taskResult);

        //Notify to subscribers
        $notifications = $instance->application->applicationParameters()->where('name', 'SERVER_NOTIFICATIONS')->first();

        if ($notifications) {
            $notifications = explode(',', $notifications->value);

            //foreach notification send notification job
            foreach ($notifications as $notification) {
                Notification::route('mail', $notification)
                    ->notify(new TaskExecuted($server, $task, $result));
            }

        }


        return $result;
    }

    /**
     * Inject server variables on task
     * 
     * @param $server
     * @param $task
     * @return task injected with server variables
     */
    public function injectInstanceVariablesInTask($instance, $task)
    {
        $special = array("{", "}");

        foreach ($instance->application->applicationParameters as $parameter) {
            $task->content = str_replace($parameter->name, $parameter->value, $task->content);
        }

        $task->content = str_replace($special, "", $task->content);


    }

}