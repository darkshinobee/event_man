@component('mail::message')
<p style="text-align:center"><img src="{{ asset('images/t_logo.png') }}" alt="TicketRoom Logo"></p>

<p>Hi {{ $customer->first_name }},</p>
<p>Thank you for choosing TicketRoom. You have been added to the guest list. Awesome!</p>
<p><a style="color:#ff6600" href="{{ route('ticket_pdf', $tran->reference) }}">Download your eTicket</a></p>
<p>When attending the event, simply show your eTicket at the admission gate to check-in. That easy!</p>
<p>Please note that you are the primary guest on this ticket. If you bought more than one ticket for this event, we recommend you and the other person(s) on the ticket check-in at the same time to ensure a smooth admission.</p>
<p>If you have any questions about the event contact the organizer @: {{ $organizer }}</p>
<p><a style="color:#ff6600" href="{{ route('my_tickets') }}">View all your event tickets</a></p>
<p>Do enjoy your event.</p>
<p><a style="color:#ff6600" href="{{ route('events.category', $event->category) }}">Check out these events, you might like them too</a></p>
<p>Got feedback for us? Shoot us a quick email at support@ticketroom.ng</p>
Cheers,<br>
{{ config('app.name') }}
@endcomponent
