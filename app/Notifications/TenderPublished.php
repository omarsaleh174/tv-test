<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Entities\Admin\Tender;

class TenderPublished extends Notification
{
    use Queueable;
    public $tenders;

    public function __construct($tenders)
    {
        $this->tenders = $tenders;
    }
    
    public function via($notifiable)
    {
        return ['mail'];
    }
    public function toMail($notifiable)
    {
        return (new MailMessage)
       ->from('info@tv-adviser.com', 'TV Adviser')
             ->subject('لديك مناقصات اليوم')
            ->line('Here are the tenders relevant to your interests:')
            ->markdown('emails.tenders_published', ['tenders' => $this->tenders]);
    }
    

    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
