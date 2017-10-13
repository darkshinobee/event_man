@component('mail::message')
<p style="text-align:center"><img src="{{ asset('images/t_logo.png') }}" alt="TicketRoom Logo"></p>
# Subject - {{ $request->subject }}<br>
Event - {{ $event->title }}

# Message <br>
{{ $request->message }}
<br>

From <br>
{{ $request->first_name.' '.$request->last_name }}<br>
{{ $request->attendee_email }}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
