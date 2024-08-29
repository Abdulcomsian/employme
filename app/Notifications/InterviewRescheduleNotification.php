<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class InterviewRescheduleNotification extends Notification
{
    use Queueable;
    protected $candidateDetails;
    protected $employerDetails;
    protected $jobDetails;
    protected $interviewStatus;
    protected $type;
    /**
     * Create a new notification instance.
     */
    public function __construct($candidateDetails, $employerDetails, $jobDetails, $type=0, $interviewStatus=0)
    {
        $this->candidateDetails = $candidateDetails;
        $this->employerDetails = $employerDetails;
        $this->jobDetails = $jobDetails;
        $this->type = $type;
        $this->interviewStatus = $interviewStatus;
        //
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

        if($this->type == 0){
            $subject = "Interview Request Notification";
            if(auth()->user()->hasRole('employer')){
                $greetings = 'Dear '.$this->candidateDetails->candidatePersonalDetails->first_name;
                $message = $this->employerDetails->employerDetails->institution.' has requested you to interview for the position of  '.$this->jobDetails->job_title;
            } else { 
                $greetings = 'Dear '.$this->employerDetails->employerDetails->institution;
                $message = $this->candidateDetails->candidatePersonalDetails->first_name.' has requested you to interview for the position of  '.$this->jobDetails->job_title;
            }
        }
        elseif($this->type == 1)
        {
            $status = '';
            $subject = "Interview Reschedule Notification";
            if($this->interviewStatus == 1)
            {
                $status = 'accepted';
            }elseif($this->interviewStatus == 2){
                $status = 'rejected';
            }

            if(auth()->user()->hasRole('employer')){
                $greetings = 'Dear '.$this->candidateDetails->candidatePersonalDetails->full_name;
                $message = $this->employerDetails->employerDetails->institution.' has '.$status.' your request to reschedule the interview for the position of '.$this->jobDetails->job_title;
            } else {
                $greetings = 'Dear '.$this->employerDetails->employerDetails->institution;
                $message = $this->candidateDetails->candidatePersonalDetails->first_name.' has '.$status.' your request to reschedule the interview for the position of '.$this->jobDetails->job_title;
            }
        }elseif($this->type == 2){

            $subject = "Interview Conducted";
            if(auth()->user()->hasRole('employer')){
                $greetings = 'Dear '.$this->candidateDetails->candidatePersonalDetails->first_name;
                $message = $this->employerDetails->employerDetails->institution.' has  marked your interview as conducted for the position of  '.$this->jobDetails->job_title;
            } else {
                $greetings = 'Dear '.$this->employerDetails->employerDetails->institution;
                $message = $this->candidateDetails->candidatePersonalDetails->first_name.' has  marked your interview as conducted for the position of  '.$this->jobDetails->job_title;
            }
        }else{
            $subject = "Interview Reschedule Notification";
            if(auth()->user()->hasRole('employer')){
                $greetings = 'Dear '.$this->candidateDetails->candidatePersonalDetails->first_name;
                $message = $this->employerDetails->employerDetails->institution.' has requested to reschedule the interview for the position of  '.$this->jobDetails->job_title;
            } else {
                $greetings = 'Dear '.$this->employerDetails->employerDetails->institution;
                $message = $this->candidateDetails->candidatePersonalDetails->first_name.' has requested to reschedule the interview for the position of  '.$this->jobDetails->job_title;
            }
        }
        return (new MailMessage)
                    ->subject($subject)
                    ->greeting($greetings)
                    ->line($message)
                    // ->action('Notification Action', url('/'))
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
