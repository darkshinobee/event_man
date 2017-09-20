<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SaleSuccess extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
     public function __construct($event, $book, $customer, $organizer)
     {
         $this->event = $event;
         $this->book = $book;
         $this->customer = $customer;
         $this->organizer = $organizer;
     }

    /**
     * Build the message.
     *
     * @return $this
     */
     public function build()
     {
         return $this->markdown('emails.sale_success')
                     ->with([
                       'event' => $this->event,
                       'book' => $this->book,
                       'customer' => $this->customer,
                       'organizer' => $this->organizer
                     ])
                     ->from('no-reply@ticketroom.ng', 'TicketRoom')
                     ->subject('Ticket Booked For Your Event');
     }
}
