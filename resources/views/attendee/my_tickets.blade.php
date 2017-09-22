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
        <div class="col-md-12">
          @if ($tickets->Count())
          @foreach ($tickets as $ticket)
            <div class="row">
              <div class="col-md-3">
                <a href="{{ route('single_event', $ticket->slug) }}">
                <img class="img-responsive" src="{{ $ticket->image_path }}" width="100%" height="100px" alt="Event Photo">
                </a>
              </div>
              <div class="col-md-9">
                <ul class="list-group">
                  <li class="list-group-item">Event Name - {{ $ticket->title }}</li>
                  <li class="list-group-item">Venue - {{ $ticket->venue.', '.$ticket->state }}</li>
                  @if ($ticket->ticket_type == 0)
                    <li class="list-group-item">Amount Paid - Free Event</li>
                  @elseif ($ticket->ticket_type == 1)
                    <li class="list-group-item">Early Bird - &#8358;{{ number_format($ticket->amount,2) }}</li>
                  @elseif ($ticket->ticket_type == 2)
                    <li class="list-group-item">Regular - &#8358;{{ number_format($ticket->amount,2) }}</li>
                  @else
                  <li class="list-group-item">VIP - &#8358;{{ number_format($ticket->amount,2) }}</li>
                  @endif
                  <li class="list-group-item">Quantity - {{ $ticket->quantity }}</li>
                  @if ($ticket->status == 0)
                    <li class="list-group-item">Due {{ date_format(new DateTime($ticket->event_start_date), "F jS, Y") }} | {{ date_format(new DateTime($ticket->event_start_time), "h:ia") }} </li>
                    @else
                    <li class="list-group-item">Held on {{ date_format(new DateTime($ticket->event_start_date), "F jS, Y") }} | {{ date_format(new DateTime($ticket->event_start_time), "h:ia") }} </li>
                  @endif
                </ul>
              </div>
              </div>
            @endforeach
            <div class="text-center">
  						{!! $tickets->links() !!}
  					</div>
            @else
              <div class="img-responsive text-center">
                <img src="/images/no_ticket.png" alt="no ticket">
              </div>
            @endif
          </div>
        </div>
      </div>
    </section>
  @stop
