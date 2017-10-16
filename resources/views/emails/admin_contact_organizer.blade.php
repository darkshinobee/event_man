@component('mail::message')
<p style="text-align:center"><img src="{{ asset('images/logos/t_logo.png') }}" alt="TicketRoom Logo"></p>
# {{ $request->subject }}<br>
Hi {{ $organizer->first_name }}, <br>
<p>{{ $request->message }}</p>

Cheers,<br>
{{ config('app.name') }}
@endcomponent
