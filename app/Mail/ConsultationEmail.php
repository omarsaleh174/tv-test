<?php
namespace App\Mail;

use App\Entities\Admin\Consultation;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ConsultationEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $consultation;

   
    public function __construct(Consultation $consultation)
    {
        $this->consultation = $consultation;
    }
 
    public function build()
    {
        $data = $this->consultation;
        return $this->subject('لديك استشارة جديدة  ')
    ->view('emails.consultation_request',compact('data'));
    }
}
