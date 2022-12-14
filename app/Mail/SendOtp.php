<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendOtp extends Mailable
{
    use Queueable, SerializesModels;
    protected $kodeotp;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(string $otp)
    {
        $this->kodeotp = $otp;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('home.otp_verification', [
            'kodeotp' => $this->kodeotp,
        ]);
    }
}
