@component('mail::message')
<p style="text-align:center"><img src="{{ asset('images/t_logo.png') }}" alt="TicketRoom Logo"></p>
<p>Event request available on your dashbord</p>
<p><a href="{{ route('event_request') }}">Go to dashboard</a></p>

Cheers,<br>
{{ config('app.name') }}
@endcomponent
