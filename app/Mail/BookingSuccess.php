<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class BookingSuccess extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($event, $customer, $tran, $organizer)
    {
        $this->event = $event;
        $this->customer = $customer;
        $this->tran = $tran;
        $this->organizer = $organizer;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.booking_success')
                    ->with([
                      'event' => $this->event,
                      'customer' => $this->customer,
                      'tran' => $this->tran,
                      'organizer' => $this->organizer
                    ])
                    ->from('no-reply@ticketroom.ng', 'TicketRoom')
                    ->subject('Your eTicket');
    }
}
