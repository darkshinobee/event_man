<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class EventRejected extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($organizer)
    {
        $this->organizer = $organizer;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.event_rejected')
        ->with(['organizer' => $this->organizer])
        ->from('no-reply@ticketroom.ng', 'TicketRoom')
        ->subject('Event Rejected');
    }
}
