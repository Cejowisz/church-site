<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PrayerMail extends Mailable
{
    use Queueable, SerializesModels;

    public $prayer;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($prayer)
    {
        $this->prayer = $prayer;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.prayer');
    }
}
