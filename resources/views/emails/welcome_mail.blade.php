@component('mail::message')
# Welcome Aboard!

Hi {{ $first_name }},

Welcome to TicketRoom! My name is Ahmed, I'm the founder. Thank you for signing up. At Ticketroom, our goal is help you discover experiences in your city that will help spice up your week. If there's anything I can do to help just let me know!
<br>
Here's a quick guide to help you get started.

Search &amp; Discover Abuja one event at a time.
@component('mail::button', ['url' => ''])
Go To Homepage
@endcomponent

Create Event.<br>
If you're an event organizer, you can start selling your event tickets and managing your guestlist within the next 12 hours.
<br>
Click <a href="#">here</a> for details<br>
Thanks,<br>
{{ config('app.name') }}
@endcomponent
