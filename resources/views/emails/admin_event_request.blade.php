@component('mail::message')

<p>Event request available on your dashbord</p>
<p><a href="{{ route('event_request') }}">Go to dashboard</a></p>

Cheers,<br>
{{ config('app.name') }}
@endcomponent
