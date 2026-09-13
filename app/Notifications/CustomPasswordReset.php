<?php
namespace App\Notifications;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class CustomPasswordReset extends Notification
{
    protected $resetUrl;
    public function __construct($resetUrl)
    {
        $this->resetUrl = $resetUrl;
    }

    public function via($notifiable)
    {
        return ['mail']; 
    }

    public function toMail($notifiable)
    {
        $resetUrl = $this->resetUrl;
        $siteTitle = getSeoValue('site_title'); 
        return (new MailMessage)->subject('طلب إعادة تعيين كلمة المرور')  
            ->view('emails.password_reset', [
                'user' => $notifiable, 
                'resetUrl' => $resetUrl, 
                'siteTitle' => $siteTitle, 
            ]);
    }
}
