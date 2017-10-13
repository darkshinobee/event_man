@component('mail::message')
<p style="text-align:center"><img src="{{ asset('images/t_logo.png') }}" alt="TicketRoom Logo"></p>
Hi {{ $organizer->first_name }},<br>
<p>We're really glad you chose TicketRoom. Your event request has been received and is being processed. We will let you know within 10 - 12 hours the status of your request. </p>
<p>In the mean time, <a style="#ff6600" href="{{ route('upcoming_events') }}">check out these upcoming events</a></p>
<br>
Cheers,<br>
{{ config('app.name') }}
@endcomponent
