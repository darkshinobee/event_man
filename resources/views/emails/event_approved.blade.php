@component('mail::message')
<p style="text-align:center"><img src="{{ asset('images/t_logo.png') }}" alt="TicketRoom Logo"></p>
<p>Hi {{ $organizer->first_name }},</p>
<p>We are delighted to inform you that your event has been approved and is now live. Thank you for choosing TicketRoom.</p>
<p>You may <a style="color:#ff6600" href="{{ route('single_event', $event->slug) }}">share this link</a> and start filling up your guestlist immediately.</p>
<h3>IMPORTANT!!!</h3>
<h4>ADMISSION CONTROL</h4>
<ol>
  <li>There are two ways you can control admission at your event:
    <ul>
      <li>Use a third-party app to scan tickets for validation. Download and install this app [insert link to app] and link it to our server by adding XXX to the Server section. We are currently working on having our app for this. But this works just fine.</li>
      <li>You can use the guest list for smaller events or as a back-up. You can download the complete guest list after your event closes. We strongly recommend you print your guest list in case of unforeseen challenges like your battery running low.</li>
      <li><a style="color:#ff6600" href="{{ route('view_list', $event->id) }}">Here is your guest list.</a></li>
    </ul>
  </li><br>
<li>In the case where a guest buys more than one ticket, it would be indicated on the ticket and guest list. The name(s) of the other guest(s) would be displayed on the same ticket when scanned. Look out for these.</li>
</ol>

<h4>EVENT CLOSING</h4>
<p>We close all events at midnight (12AM) on the day of each event. Once an event is closed, nobody can get a ticket for that event anymore. That way you are sure that your guest list is up-to-date with no last-minute changes.</p>
<p>That's all!</p>

<p>If you have any questions, please feel free to contact us at <i>support@ticketroom.ng</i>. We're here for you.</p>
<p><a style="color:#ff6600" href="{{ route('my_events') }}">View all your events</a></p>
<p><a style="color:#ff6600" href="{{ route('events.create') }}">Create New Event</a></p>
Cheers,<br>
{{ config('app.name') }}
@endcomponent
