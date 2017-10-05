@component('mail::message')
# {{ $request->subject }}

Message Body <br>
{{ $request->message }}
<br>

@if ($request->reference)
  Reference No - {{ $request->reference }} <br>
@endif
@if ($request->organizer)
  Organizer - {{ $request->organizer }} <br>
@endif

From <br>
{{ $request->first_name.' '.$request->last_name }}<br>
{{ $request->email }}

{{ config('app.name') }}
@endcomponent
