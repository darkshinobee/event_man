<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="/css/my_styles.css">
  <link rel="stylesheet" href="/css/app.css">
  <script src="/js/app.js"></script>
  <title>{{ $title }} Guest List</title>
</head>
<body style="background-color:white">
  <div class="container">
    <div class="row">
      <div class="text-center">
        <img src="{{ asset('images/t_logo.png') }}" alt="TicketRoom Logo">
      </div>
    </div>
    <div class="row">
      <h2 class="text-center">{{ $title }} - Guest List</h2><br>
      <div class="col-md-8 col-md-offset-2">
        <table class="table">
          <thead style="color:red">
            <tr>
              <th>#</th>
              <th>First Name</th>
              <th>Last Name</th>
              <th>Ticket Type</th>
              <th>Quantity</th>
              <td></td>
            </tr>
          </thead>
          <tbody>
            @php $i=0; @endphp
            @foreach ($guests as $guest)
              @php $i++; @endphp
              <tr>
                <td>{{ $i }}</td>
                <td>{{ $guest->first_name }}</td>
                <td>{{ $guest->last_name }}</td>
                @if ($guest->ticket_type == 0)
                  <td>Free</td>
                @elseif ($guest->ticket_type == 1)
                  <td>Early Bird</td>
                @elseif ($guest->ticket_type == 2)
                  <td>Regular</td>
                  @else
                    <td>VIP</td>
                @endif
                <td>{{ $guest->quantity }}</td>
                <td><input type="checkbox"></td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>

</body>
<footer></footer>
</html>
