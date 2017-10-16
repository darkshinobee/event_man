@component('mail::message')
<p style="text-align:center"><img src="{{ asset('images/logos/t_logo.png') }}" alt="TicketRoom Logo"></p>
# Thank You For Being Awesome

<p>We have received your message and would like to thank you for writing to us. If your inquiry is urgent, please use the telephone number listed below to talk to one of our staff members. Otherwise, we will reply by email as soon as possible.</p>
<p><a style="#ff6600" href="{{ route('upcoming_events') }}">In the meantime, check out these events</a></p>


Talk to you soon,<br>
{{ config('app.name') }}<br>
Phone: +2347038191374
@endcomponent
