<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Reset extends Mailable
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
        return $this->subject('Reset Password')
            ->view('emails.reset',compact('data'))
            ->from('appelagy@gmail.com');
        return $this->markdown('emails.reset',compact('data'));
    }

}
