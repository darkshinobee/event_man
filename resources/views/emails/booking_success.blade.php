@component('mail::message')
# Ticket Booked Successfully

Hi {{ $customer->first_name }},<br>
<p>Thank you for choosing TicketRoom, here is your ticket. You have been added to the guest list. Awesome! On the day of the event, simply show this email at the admission gate to check-in. Simple!
</p>
# Ticket Information
@component('mail::table')
|       |         |
| :------------- |:-------------|
| Order Number     | {{ $tran->reference }}   |
| Event Name      |{{ $event->title }} |
| Venue      | {{ $event->venue }} |
| Date      | {{ date_format(new DateTime($event->event_start_date), "l F j, Y ") }} |
| Time      | {{ date_format(new DateTime($event->event_start_time), "h:ia") }} |
| Quantity      | {{ $book->quantity }} |
@if ($book->ticket_type == 0)
| FREE Event      | &#8358;0.00 |
@elseif ($book->ticket_type == 1)
| Early Bird      | &#8358;{{ number_format($book->amount,2) }} |
@elseif ($book->ticket_type == 2)
| Regular      | &#8358;{{ number_format($book->amount,2) }} |
@else
| VIP      | &#8358;{{ number_format($book->amount,2) }} |
@endif
@endcomponent

<p style="text-align:center">
  <img src="https://api.qrserver.com/v1/create-qr-code/?data=https://www.ticketroom.ng/attendance/{{$tran->reference}}&amp;size=100x100"/>
</p>

@component('mail::panel')
<p>If you have any questions about the event contact the organizer @:</p>
E: {{ $organizer }}
@endcomponent

<p>Do enjoy your event. Feel free to provide a feedback afterwards. All feedbacks are anonymous and would be sent to the organizer directly. This would enable them provide a better service for you the next time around.
</p>
<p>Got feedback for us? Shoot us a quick email at help@ticketroom.ng
</p>
<a href="http://ticketroom.dev/category/{{ $event->category }}">Check out these events, you might like them too</a>

Cheers,<br>
{{ config('app.name') }}
@endcomponent
