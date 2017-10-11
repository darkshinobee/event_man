<!DOCTYPE html>
<html>
<head>
  <link rel="icon" type="image/png" href="/images/favicon_logo1.png">
  <link rel="stylesheet" href="/css/app.css">
  <link rel="stylesheet" href="/css/my_styles.css">
  <script src="/js/app.js"></script>
  <title>TicketRoom | Check-In</title>
</head>
<body>
@if ($guest->attendance == 0)
  <style>
    body{
      background-color: green;
    }
  </style>
  @else
  <style>
    body{
      background-color: red;
    }
  </style>
@endif

  <div class="container">
    <div class="row" style="color:white">
      <div class="col-sm-8 col-sm-offset-2 text-center">
        <h2>{{ $event->title }}</h2>
        <h3>Reference No - {{ $tran->reference }}</h3>
        @if ($book->ticket_type == 1)
          <h4>{{ $book->quantity }} Early Bird Ticket(s) - &#8358;{{ number_format($book->amount,2) }}</h4>
        @elseif ($book->ticket_type == 2)
          <h4>{{ $book->quantity }} Regular Ticket(s) - &#8358;{{ number_format($book->amount,2) }}</h4>
        @elseif ($book->ticket_type == 3)
          <h4>{{ $book->quantity }} VIP Ticket(s) - &#8358;{{ number_format($book->amount,2) }}</h4>
        @else
          <h4>{{ $book->quantity }} Free Ticket(s)</h4>
        @endif
        @if ($guest->attendance == 0)
          @foreach ($names as $name)
            <h4>{{ $name->name }}</h4>
          @endforeach
        @else
          <h1>WARNING</h1>
          <h2>Already Checked In</h2>
          @foreach ($names as $name)
            <h4>{{ $name->name }}</h4>
          @endforeach
        @endif
      </div>
    </div>
  </div>
</body>
</html>
