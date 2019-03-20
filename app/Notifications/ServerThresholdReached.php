<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ServerThresholdReached extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * The server name
     */
    private $server;

    /**
     * The threshold message
     */
    private $message;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($server, $message)
    {
        $this->server = $server;
        $this->message = $message;
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
        //Email parameters
        $params = array(
            'server' => $this->server,
            'message' => $this->message,
        );

        return (new MailMessage)
            ->from('andres@servermonitor.co')
            ->subject('Server Threshold Reached')
            ->markdown('mail.server.threshold', $params);
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
