@component('mail::message')
# Welcome on Board!

Hi {{ $first_name }},<br>

<p>Welcome to TicketRoom! My name is Ahmed, I'm the founder. Thank you for signing up. At Ticketroom, our goal is help you discover experiences in your city that will help spice up your week. If there's anything I can do to help just let me know!
</p>
<p>Here's a quick guide to help you get started.</p>
<p><a href="http://ticketroom.dev/upcoming_events">Discover your city one event at a time.</a>
</p>
<a href="{{ route('events.create') }}">Create Event</a><br>
<p>If you're an event organizer, you can start selling your event tickets and managing your guestlist within the next 12 hours.
</p>
<p>Click <a href="{{ route('events.create') }}">here</a> for details</p>
Cheers,<br>
Ahmed Y
@endcomponent
