<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ApplicationDeployed extends Notification
{
    use Queueable;

    /**
     * Deployment
     * @var App\Models\Deployment
     */
    public $deployment;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($deployment)
    {
        $this->deployment = $deployment;
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
        $application = $this->deployment->instance->application;

        //Email parameters
        $params = array('application' => $application->name ,
                        //'status' => $this->deployment->status,
                        'result' => $this->deployment->result,
                        'author' => $this->deployment->author,
                        'branch' => $this->deployment->branch
                        );

         return (new MailMessage)
                ->subject('Application Sucessfully Deployed')
                ->markdown('mail.application.deployed', $params );

        // if( $this->deployment->status ){
        //     return (new MailMessage)
        //         ->subject('Application Sucessfully Deployed')
        //         ->markdown('mail.application.deployed', $params );
        // }
        // else{
        //     return (new MailMessage)
        //         ->error()
        //         ->subject('Error on Deployment')
        //         ->markdown('mail.application.deployed-error', $params );
        // }
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
