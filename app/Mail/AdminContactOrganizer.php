<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AdminContactOrganizer extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($request, $organizer)
    {
      $this->request = $request;
      $this->organizer = $organizer;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.admin_contact_organizer')
        ->with([
          'request' => $this->request,
          'organizer' => $this->organizer
        ])
        ->from('no-reply@ticketroom.ng', 'TicketRoom')
        ->subject($this->request->subject);
    }
}
