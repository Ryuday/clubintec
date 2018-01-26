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
    public $view;
    public $confirmation_code;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($request)
    {
        $data = $request;
        $this->name = $data['name'];
        $this->title = $data['title'];
        $this->email = $data['email'];
        if(isset($data['message'])) {
          $this->message = $data['message'];
        }
        $this->view = $data['view'];
        $this->confirmation_code = $data['confirmation_code'];
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->email, $this->name)
                    ->markdown($this->view)
                    ->subject($this->title);
    }
}
