<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendEmailToKsr extends Mailable
{
    use Queueable, SerializesModels;

    public $mailD;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($mailD)
    {
        $this->mailD = $mailD;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('New Project Detected.')
                    ->view('emails.reqProjEmailAdmin');
    }
}
