@component('mail::message')
# {{ $request->subject }}

Message Body <br>
{{ $request->message }}
<br>
From <br>
{{ $request->first_name.' '.$request->last_name }}<br>
{{ $request->email }}

{{ config('app.name') }}
@endcomponent
