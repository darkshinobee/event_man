@component('mail::message')
# {{ $request->subject }}<br>
Hi {{ $organizer->first_name }}, <br>
<p>{{ $request->message }}</p>

Cheers,<br>
{{ config('app.name') }}
@endcomponent
