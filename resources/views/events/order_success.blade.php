@extends('main')
@section('title', 'Order Successful')
@section('content')
  <section class="section-page-header">
    <div class="container">
      <h1 class="entry-title">ORDER SUCCESSFUL</h1>
    </div>
  </section>
  <section class="section-page-content">
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <p style="text-align:center"><img src="{{ asset('images/logos/t_logo.png') }}" alt="TicketRoom Logo"></p>
          <div class="text-center">
            <h1>Thank you.</h1>
            <h3>Your order was completed successfully.</h3>
            <h4>Reference Number: {{ $tran->reference }}</h4><br>
            <p>An email receipt including the details of your order has been sent to your email address.</p>
            {{-- <p>You can download your ticket by clicking on this link <i><a style="color:#ff6600" href="{{ route('ticket_pdf', $tran->reference) }}">here</a></i> or by visiting the <i><a href="{{ route('my_tickets') }}" style="color:#ff6600">My Tickets</a></i> page anytime.</p><br> --}}
            <h3>Order Summary</h3>
            <table class="table table-striped table-hover">
              <tbody>
                <tr>
                  <td>Event Name</td>
                  <td>{{ $event->title }}</td>
                </tr>
                <tr>
                  <td>Venue</td>
                  <td>{{ $event->venue.', '.$event->state }}</td>
                </tr>
                <tr>
                  <td>Event Date</td>
                  <td>{{ date_format(new DateTime($event->event_start_date), "l F j, Y ") }} | {{ date_format(new DateTime($event->event_start_time), "h:ia") }}</td>
                </tr>
                <tr>
                  <td>Ticket Type</td>
                  @if ($book->ticket_type == 0)
                    <td>Free Event</td>
                  @elseif ($book->ticket_type == 1)
                    <td>Early Bird Ticket</td>
                  @elseif ($book->ticket_type == 2)
                    <td>Regular Ticket</td>
                    @else
                      <td>VIP Ticket</td>
                  @endif
                </tr>
                <tr>
                  <td>No of Tickets</td>
                  <td>{{ $book->quantity }}</td>
                </tr>
                <tr>
                  <td>Amount Paid</td>
                  <td>&#8358;{{ number_format($book->amount,2) }}</td>
                </tr>
              </tbody>
            </table>
            <div class="row">
              <div class="col-sm-6 text-center">
                <h3>Attendee(s)</h3>
                <ol>
                  @foreach ($names as $name)
                    <li>{{ $name->name }}</li>
                  @endforeach
                </ol>
              </div>
              <div class="col-sm-6 text-center">
                <img src="https://api.qrserver.com/v1/create-qr-code/?data=https://www.ticketroom.ng/attendance/{{$tran->reference}}&amp;size=100x100"/>
              </div>
            </div>
            <a href="{{ route('ticket', $tran->reference) }}" class="btn btn-lg myBtn">View Ticket</a>
          </div>
        </div>
      </div>
    </div>
  </section>
@stop
