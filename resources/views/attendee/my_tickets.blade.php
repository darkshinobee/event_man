@extends('main')
@section('title', 'My Tickets')
@section('content')
  <section class="section-page-header">
    <div class="container">
      <h1 class="entry-title">MY TICKETS</h1>
    </div>
  </section>
  <section class="section-full-events-schedule">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          @if ($p_tickets->Count() || $u_tickets->Count())
            <div class="row">
              <div class="col-sm-4">
                <h2 class="text-center m-t-15">UPCOMING EVENTS</h2>
                @if (!$u_tickets->Count())
                  <div class="img-responsive text-center">
                    <img src="{{ asset('/images/no_ticket.png') }}" alt="no ticket">
                  </div>
                  @else
                    @foreach ($u_tickets as $u_ticket)

                  <div class="card" style="">
                    <a href="{{ route('single_event', $u_ticket->slug) }}">
                      <img class="card-img-top" src="{{ asset($u_ticket->image_path) }}" alt="Card image cap">
                    </a>
                    <div class="card-body p-t-10">
                      <ul class="list-group list-group-flush">
                        <li class="list-group-item">Event Name - {{ $u_ticket->title }}</li>
                        <li class="list-group-item">Venue - {{ $u_ticket->venue.', '.$u_ticket->state }}</li>
                        @if ($u_ticket->ticket_type == 0)
                          <li class="list-group-item">Amount Paid - Free Event</li>
                        @elseif ($u_ticket->ticket_type == 1)
                          <li class="list-group-item">Early Bird - &#8358;{{ number_format($u_ticket->amount,2) }}</li>
                        @elseif ($u_ticket->ticket_type == 2)
                          <li class="list-group-item">Regular - &#8358;{{ number_format($u_ticket->amount,2) }}</li>
                        @else
                          <li class="list-group-item">VIP - &#8358;{{ number_format($u_ticket->amount,2) }}</li>
                        @endif
                        <li class="list-group-item">Quantity - {{ $u_ticket->quantity }}</li>
                        @if ($u_ticket->status == 0)
                          <li class="list-group-item">Due {{ date_format(new DateTime($u_ticket->event_start_date), "F jS, Y") }} | {{ date_format(new DateTime($u_ticket->event_start_time), "h:ia") }} </li>
                        @else
                          <li class="list-group-item">Held on {{ date_format(new DateTime($u_ticket->event_start_date), "F jS, Y") }} | {{ date_format(new DateTime($u_ticket->event_start_time), "h:ia") }} </li>
                        @endif
                      </ul>
                    </div>
                  </div>
                @endforeach
                @endif
              </div>
              <div class="col-sm-2"></div>
              <div class="col-sm-4">
                <h2 class="text-center m-t-15">PAST EVENTS</h2>
                @if (!$p_tickets->Count())
                  <div class="img-responsive text-center">
                    <img src="{{ asset('/images/no_ticket.png') }}" alt="no ticket">
                  </div>
                  @else
                @foreach ($p_tickets as $p_ticket)

                  <div class="card" style="">
                    <a href="{{ route('single_event', $p_ticket->slug) }}">
                      <img class="card-img-top" src="{{ asset($p_ticket->image_path) }}" alt="Card image cap">
                    </a>
                    <div class="card-body p-t-10">
                      <ul class="list-group list-group-flush">
                        <li class="list-group-item">Event Name - {{ $p_ticket->title }}</li>
                        <li class="list-group-item">Venue - {{ $p_ticket->venue.', '.$p_ticket->state }}</li>
                        @if ($p_ticket->ticket_type == 0)
                          <li class="list-group-item">Amount Paid - Free Event</li>
                        @elseif ($p_ticket->ticket_type == 1)
                          <li class="list-group-item">Early Bird - &#8358;{{ number_format($p_ticket->amount,2) }}</li>
                        @elseif ($p_ticket->ticket_type == 2)
                          <li class="list-group-item">Regular - &#8358;{{ number_format($p_ticket->amount,2) }}</li>
                        @else
                          <li class="list-group-item">VIP - &#8358;{{ number_format($p_ticket->amount,2) }}</li>
                        @endif
                        <li class="list-group-item">Quantity - {{ $p_ticket->quantity }}</li>
                        @if ($p_ticket->status == 0)
                          <li class="list-group-item">Due {{ date_format(new DateTime($p_ticket->event_start_date), "F jS, Y") }} | {{ date_format(new DateTime($u_ticket->event_start_time), "h:ia") }} </li>
                        @else
                          <li class="list-group-item">Held on {{ date_format(new DateTime($p_ticket->event_start_date), "F jS, Y") }} | {{ date_format(new DateTime($u_ticket->event_start_time), "h:ia") }} </li>
                        @endif
                      </ul>
                    </div>
                  </div>
                @endforeach
                @endif
              </div>
            </div>
          @else
            <div class="img-responsive text-center">
              <img src="{{ asset('/images/no_ticket.png') }}" alt="no ticket">
            </div>
          @endif
        </div>
      </div>
    </div>
  </section>
@stop
