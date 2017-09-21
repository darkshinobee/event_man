@component('mail::message')
# Ticket Booked Successfully

Hi {{ $customer->first_name }}, this is your booking confirmation for {{ $event->title }}.
# Order Summary
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

@component('mail::panel')
For more information about your booking contact us @:<br>
T: 0801 234 5678<br>
E: bookings@ticketroom.ng
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
