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
    private $jobApplicationDetails;
    public function __construct($jobApplicationDetails)
    {
        $this->jobApplicationDetails = $jobApplicationDetails;
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
        // $send_email = (new MailMessage)
        // ->line($this->jobApplicationDetails['body']['candidate_full_name'].' with email '.$this->jobApplicationDetails['body']['candidate_email'].' has successfully applied for your job '.$this->jobApplicationDetails['body']['job_title']);
        

        return (new MailMessage)
                    ->subject("Interview Request")
                    ->greeting("Dear ".$this->jobApplicationDetails['body']['employer_name'])
                    ->line($this->jobApplicationDetails['body']['candidate_full_name']." has requested for the job ".$this->jobApplicationDetails['body']['job_title'])
                    ->line('Thank you for using our application!');


        // return $send_email;
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
