<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendWelcomeMail extends Mailable
{
    use Queueable, SerializesModels;
    public $data;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //return $this->from($this->data['sender_mail'])->subject($this->data['subject'])->view('emails.email_template')->with('data', $this->data);
        return $this->from('admin.ems@kiwitech.com')
        ->subject('Welcome To Employee Management!')
        ->view('emails.welcome_mail')
        ->with('data',$this->data);
    }
}
