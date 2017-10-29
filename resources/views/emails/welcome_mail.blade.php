@component('mail::message')
<p style="text-align:center"><img src="{{ asset('images/logos/t_logo.png') }}" alt="TicketRoom Logo"></p>
# Welcome on Board!

Hi {{ $first_name }},<br>

<p>Welcome to TicketRoom! My name is Ahmed. Thank you for signing up. At TicketRoom, our goal is help you discover experiences in your city that will help spice up your week. If there's anything I can do to help just let me know!
</p>
<p>Here's a quick guide to help you get started.</p>
<p><a style="#ff6600" href="{{ route('upcoming_events') }}">Discover your city one event at a time.</a>
</p>
<p>If you're an event organizer, you can start selling your event tickets and managing your guestlist within the next 12 hours.</p>
<p><a style="#ff6600" href="{{ route('events.create') }}">Create Event</a></p>
Cheers,<br>
Ahmed Y.
@endcomponent
