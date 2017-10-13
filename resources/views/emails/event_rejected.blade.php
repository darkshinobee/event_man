@component('mail::message')
<p style="text-align:center"><img src="{{ asset('images/t_logo.png') }}" alt="TicketRoom Logo"></p>
Hi {{ $organizer->first_name }},<br>
<p>We're so glad you chose TicketRoom. Unfortunately, your event request was not approved. This may be due to, but not limited to, the following reasons:</p>
<ol>
  <li>You do not agree with our terms and pricing.</li>
  <li>Your event is not in accordance with our mission.</li>
</ol>
<p><a style="#ff6600" href="{{ route('pricing') }}">See our pricing page</a></p>
<p>Let us know if you have any questions or how else we can accommodate you.</p>
<p>Check out these <a style="#ff6600" href="{{ route('upcoming_events') }}">upcoming events</a></p>

Cheers,<br>
{{ config('app.name') }}
@endcomponent
