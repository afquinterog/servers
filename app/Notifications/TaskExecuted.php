<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class TaskExecuted extends Notification
{
    use Queueable;


    /**
     * The server where task was executed
     * 
     * @var App\Models\Server
     */
    private $server;

    /**
     * The task
     * 
     * @var App\Models\Task
     */
    private $task;

    /**
     * The task execution result
     * 
     * @var string
     */
    private $result;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($server, $task, $result)
    {
        $this->server = $server;

        $this->task = $task;

        $this->result = $result;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {

        $parameters = [
            'result' => $this->result,
            'server' => $this->server->name,
            'task' => $this->task->code,
        ];

        return (new MailMessage)
            ->subject('Task execution result')
            ->markdown('mail.task.executed', $parameters);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
