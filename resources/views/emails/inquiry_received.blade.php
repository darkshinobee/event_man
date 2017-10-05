@component('mail::message')
# Thank You For Being Awesome

We have received your message and would like to thank you for writing to us. If your inquiry is urgent, please use the telephone number listed below to talk to one of our staff members. Otherwise, we will reply by email as soon as possible.
<br>
In the meantime, check out this week's events.

@component('mail::button', ['url' => 'http://ticketroom.dev/upcoming_events'])
Upcoming Events
@endcomponent

Talk to you soon,<br>
{{ config('app.name') }}<br>
Phone: +2347038191374
@endcomponent
