@component('mail::message')

Hi {{ $organizer->first_name }},<br>
<p>We're really glad you chose TicketRoom. Your event request has been received and is being processed. We will let you know within 10 - 12 hours the status of your request. </p>
<p>In the mean time, <a href="http://ticketroom.dev/upcoming_events">check out these upcoming events</a></p>
<br>
Cheers,<br>
{{ config('app.name') }}
@endcomponent
