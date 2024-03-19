<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class BusinessLicenseNotification extends Notification
{
    use Queueable;
    protected $employer;
    protected $type;
    protected $status;
    /**
     * Create a new notification instance.
     */
    public function __construct($employer=null, $type=null, $status=null)
    {
        $this->employer = $employer;
        $this->type = $type;
        $this->status = $status;
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
        if($this->type == 1)
        {
            $status = '';
            if($this->status == 1)
            {
                $message = 'Congratualtion! Your Business License  has been approved by our team member.';
            }elseif($this->status == 2){
                $message = 'Your Business License  has been rejected by our team member. Kindly upload it again';
            }
            $greetings = 'Dear '.$this->employer->employerDetails->institution;
            
        }else{
            $greetings = 'Dear Admin';
            $message =$this->employer->employerDetails->institution.' has uploaded a business license';;
        }
        return (new MailMessage)
                    ->subject('License Approval')
                    ->greeting($greetings)
                    ->line($message)
                    ->line('Thank you for using our application!');
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
