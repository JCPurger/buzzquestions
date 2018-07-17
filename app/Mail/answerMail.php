<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class answerMail extends Mailable
{
    use Queueable, SerializesModels;

    public $subject;
    public $token;
    public $text;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Request $request,$token)
    {
        $this->subject = $request->subject;
        $this->text = $request->text;
        $this->token = $token;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->subject)
                    ->view('emails.question-link');
    }
}
