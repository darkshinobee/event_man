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
                    <img src="{{ asset('/images/logos/no_ticket.png') }}" alt="no ticket">
                  </div>
                @else
                  <table class="table table-hover">
                    <thead>
                      <th>Event</th>
                      <th>Action</th>
                    </thead>
                    <tbody>
                      @foreach ($u_tickets as $u_ticket)
                        <tr>
                          <td>{{ $u_ticket->title }}</td>
                          <td>
                            <a class="btn btn-sm myBtn" href="{{ route('ticket', $u_ticket->reference) }}">View</a>
                            <a class="btn btn-sm myBtn" href="{{ route('ticket_pdf', $u_ticket->reference) }}">Download</a>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                @endif
              </div>
              <div class="col-sm-2"></div>
              <div class="col-sm-4">
                <h2 class="text-center m-t-15">PAST EVENTS</h2>
                @if (!$p_tickets->Count())
                  <div class="img-responsive text-center">
                    <img src="{{ asset('/images/logos/no_ticket.png') }}" alt="no ticket">
                  </div>
                @else
                  <table class="table table-hover">
                    <thead>
                      <th>Event</th>
                      <th>Action</th>
                    </thead>
                    <tbody>
                      @foreach ($p_tickets as $p_ticket)
                        <tr>
                          <td>{{ $p_ticket->title }}</td>
                          <td>
                            <a class="btn btn-sm myBtn" href="{{ route('ticket', $p_ticket->reference) }}">View Ticket</a>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                @endif
              </div>
            </div>
          @else
            <div class="img-responsive text-center">
              <img src="{{ asset('/images/logos/no_ticket.png') }}" alt="no ticket">
            </div>
          @endif
        </div>
      </div>
    </div>
  </section>
@stop
