@extends('main')
@section('title', 'Attendance')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-sm-8 col-sm-offset-2 text-center">
        @if ($guest->attendance == 0)
          <h2>Welcome {{ $attendee->first_name.' '.$attendee->last_name }}</h2>
          @if ($book->ticket_type == 1)
            <h4>{{ $book->quantity }} Early Bird Ticket(s) - &#8358;{{ number_format($book->amount,2) }}</h4>
          @elseif ($book->ticket_type == 2)
            <h4>{{ $book->quantity }} Regular Ticket(s) - &#8358;{{ number_format($book->amount,2) }}</h4>
          @elseif ($book->ticket_type == 3)
            <h4>{{ $book->quantity }} VIP Ticket(s) - &#8358;{{ number_format($book->amount,2) }}</h4>
            @else
              <h4>{{ $book->quantity }} Free Ticket(s)</h4>
          @endif
          <h4>Reference No - {{ $tran->reference }}</h4>
          @else
            <h2 style="color:red">WARNING</h2>
            <h4>Ticket already scanned</h4>
        @endif
      </div>
    </div>
  </div>
@stop
