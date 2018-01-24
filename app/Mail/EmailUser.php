<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class EmailUser extends Mailable
{
    use Queueable, SerializesModels;
    /**
     * @var
     */
    public $name;
    public $title;
    public $email;
    public $message;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($request)
    {
        $data = $request->all();
        $this->name = $data['name'];
        $this->title = $data['title'];
        $this->email = $data['email'];
        $this->message = $data['message'];
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->email, $this->name)
                    ->markdown('emails.question')
                    ->subject($this->title);
    }
}
