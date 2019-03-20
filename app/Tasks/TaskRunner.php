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

    public function run($server, $task)
    {
        //Replace task with server environment variables
        if ($task->content) {
            $this->injectServerVariablesInTask($server, $task);
        }

        if ($task->custom) {
            $customTask = new $task->custom();
            $result = $customTask->run($server, $task);
        } else {
            $result = $this->executeRemoteTask($server->ip, $task->content);
        }

        //Update server status
        //$server->setStateRunning();
        
        //Save task execution results associated to server
        $taskResult = new TaskResult(['results' => $result, 'task_id' => $task->id]);
        $server->tasks()->save($taskResult);

        //Notify to subscribers
        $notifications = $server->serverParameters()->where('name', 'SERVER_NOTIFICATIONS')->first();

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
    public function injectServerVariablesInTask($server, $task)
    {
        $special = array("{", "}");

        foreach ($server->serverParameters as $parameter) {
            $task->content = str_replace($parameter->name, $parameter->value, $task->content);
        }

        $task->content = str_replace($special, "", $task->content);


    }

}