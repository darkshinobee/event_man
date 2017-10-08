@component('mail::message')

Hi {{ $organizer->first_name }},<br>
<p>We are delighted to inform you that your event has been approved and is now live. Thank you for choosing TicketRoom. </p>
<p>You may <a href="{{ route('single_event', $event->slug) }}">share the link</a> and start filling up your guestlist immediately.</p>
<p>
  <span><a href="{{ route('events.create') }}">Create New Event</a></span>
</p>
Cheers,<br>
{{ config('app.name') }}
@endcomponent
