<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CustomEnterprisePlanRequest extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public $message;

    public function __construct($message)
    {
        $this->message = $message;
    }

    public function build()
    {
        return $this->subject('Custom Enterprise Plan Request #'.$this->message['messageid'])
            ->markdown('web.emails.custom-enterprise-plan-request');
    }
}
