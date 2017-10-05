<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactOrganizer extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($request, $event)
    {
      $this->request = $request;
      $this->event = $event;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.contact_organizer')
        ->with(['request' => $this->request, 'event' => $this->event])
        ->from('no-reply@ticketroom.ng', 'TicketRoom')
        ->subject('You received a message regarding your event');
    }
}
