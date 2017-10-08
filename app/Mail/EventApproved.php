<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class EventApproved extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($event, $organizer)
    {
        $this->event = $event;
        $this->organizer = $organizer;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.event_approved')
        ->with(['event' => $this->event, 'organizer' => $this->organizer])
        ->from('no-reply@ticketroom.ng', 'TicketRoom')
        ->subject('Event Approved');
    }
}
