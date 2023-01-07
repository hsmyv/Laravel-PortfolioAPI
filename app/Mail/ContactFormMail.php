<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactFormMail extends Mailable
{
    use Queueable, SerializesModels;
    public $contacts;
    public $file;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($contacts = [], $file)
    {
        $this->contacts = $contacts;
        $this->file = $file;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.mail')
            ->with([
                'name' => $this->contacts['name'],
                'email'=> $this->contacts['email'],
                'subject'=> $this->contacts['subject'],
                'body'   => $this->contacts['body']

            ])
            ->attach($this->file);
    }
}
