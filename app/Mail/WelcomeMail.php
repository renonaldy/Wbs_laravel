<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WelcomeMail extends Mailable
{
    use Queueable, SerializesModels;
    public $get_user_email;
    public $get_user_name;
    public $validToken;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($get_user_email, $get_user_name, $validToken)
    {
        $this->get_user_email = $get_user_email;
        $this->validToken = $validToken;
        $this->get_user_name = $get_user_name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.welcome')->with([
            'user_email' => $this->get_user_email,
            'validToken' => $this->validToken,
            'user_name' => $this->get_user_name,
        ]);
    }
}
