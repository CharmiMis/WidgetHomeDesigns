<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class sendWeeklyReportToSalesTeam extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public $startDate;

    public $endDate;

    public $created_users;

    public $canceled_users;

    public $salesmember_email;

    public $salesmember_name;

    public function __construct($startDate, $endDate, $created_users, $canceled_users, $salesmember_email, $salesmember_name)
    {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->created_users = $created_users;
        $this->canceled_users = $canceled_users;
        $this->salesmember_email = $salesmember_email;
        $this->salesmember_name = $salesmember_name;
    }

    /**
     * Get the message envelope.
     */
    //     public function envelope(): Envelope
    //     {
    //         return new Envelope(
    //             subject: 'Send Weekly Report To Sales Team',
    //         );
    //     }

    //     /**
    //      * Get the message content definition.
    //      */
    //     public function content(): Content
    //     {
    //         return new Content(
    //             view: 'view.name',
    //         );
    //     }

    //     /**
    //      * Get the attachments for the message.
    //      *
    //      * @return array<int, \Illuminate\Mail\Mailables\Attachment>
    //      */
    //     public function attachments(): array
    //     {
    //         return [];
    //     }

    public function build()
    {
        return $this->subject('Weekly B2B API Sales Report (Week of '.\Carbon\Carbon::createFromTimeStamp(strtotime($this->startDate))->format('Y/m/d').' - '.\Carbon\Carbon::createFromTimeStamp(strtotime($this->endDate))->format('Y/m/d').')')
            ->markdown('web.emails.send-weekly-api-report-to-sales-team');
    }
}
