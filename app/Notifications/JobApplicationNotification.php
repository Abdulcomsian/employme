<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class JobApplicationNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    private $email;
    private $applicationData;
    public function __construct($applicationData)
    {
        $this->applicationData = $applicationData;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $send_email = (new MailMessage)
        ->greeting($this->applicationData['greeting'])
        ->subject($this->applicationData['subject'])
        ->view('mails.job-application', ['details' => $this->applicationData]);
        return $send_email;
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
