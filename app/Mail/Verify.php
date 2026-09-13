<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Verify extends Mailable
{
    use Queueable, SerializesModels;
   private $data;

    public function __construct($data)
    {
        $this->data =$data;
    }

    public function build()
    {
        $data = $this->data;
        return $this->subject('verification email')
            ->view('emails.verify',compact('data'))
            ->from('elagkapp@gmail.com');
        return $this->markdown('emails.verify',compact('data'));
    }
}
