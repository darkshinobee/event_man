@component('mail::message')
# Ticket Created Successfully

Hi {{ $organizer->first_name }}, your event has been created.
# Order Summary
@component('mail::table')
|       |         |
| :------------- |:-------------|
| Event Name      |{{ $event->title }} |
| Venue      |{{ $event->venue.', '.$event->state }} |
| Category      | {{ $event->category }} |
| Date      | {{ date_format(new DateTime($event->event_start_date), "F jS, Y") }} |
| Time      | {{ date_format(new DateTime($event->event_start_time), "h:ia") }} |
@if ($event->ticket_type == 0)
| FREE Event      | &#8358;0.00 |
@else
  @if ($event->early_max != null)
| Early Bird      | &#8358;{{ number_format($event->early_bird,2) }} |@endif
@if ($event->early_max != null)
| Regular      | &#8358;{{ number_format($event->regular_fee,2) }} |@endif
@if ($event->early_max != null)
| VIP      | &#8358;{{ number_format($event->vip_fee,2) }} |@endif
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
