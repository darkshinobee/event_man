<link rel="stylesheet" href="{{ ltrim('css/ticket.css'), '/' }}" />
<link rel="stylesheet" href="/css/ticket.css" />
<div class="box">
  <div class='inner'>
    <h1><img src="{{ asset('images/logos/t_logo.png') }}" alt="TicketRoom Logo"></h1>
  <h1>{{ $event->title }}</h1>
  <div class='info clearfix'>
    <div class='wp'>Qty<h2>{{ $book->quantity }}</h2></div>
    @if ($book->ticket_type == 0)
      <div class='wp'>Type<h2>Free</h2></div>
    @elseif ($book->ticket_type == 1)
      <div class='wp'>Type<h2>Early Bird</h2></div>
    @elseif ($book->ticket_type == 2)
      <div class='wp'>Type<h2>Regular</h2></div>
    @else
      <div class='wp'>Type<h2>VIP</h2></div>
    @endif

    <div class='wp'>Ref No<h2>{{ substr($tran->reference, 0, 5) }}</h2></div>
  </div>
  <div class='total clearfix'>
    @foreach ($guests as $guest)
      <h3>{{ $guest->name }}</h3>
    @endforeach
  </div>
    <div class='total clearfix'>
      <h3><img src="https://api.qrserver.com/v1/create-qr-code/?data=https://ticketroom.ng/attendance/{{$tran->reference}}&amp;size=100x100"/></h3>
  </div>
  <div class="total clearfix">
    <h3>{{ date_format(new DateTime($event->event_start_date), "l F j, Y ") }} | {{ date_format(new DateTime($event->event_start_time), "h:ia") }}</h3>
  </div>
  </div>
</div>
