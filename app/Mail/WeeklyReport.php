<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WeeklyReport extends Mailable
{
    use Queueable, SerializesModels;

    public $renewalData;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($renewalData)
    {
        $this->renewalData = $renewalData;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
 
        return $this->subject('Your Weekly Report')
                    ->view('web2.emails.weekly_report')
                    ->with(['renewalData' => $this->renewalData]);
    }
}
