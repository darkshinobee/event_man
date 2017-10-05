@component('mail::message')
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
