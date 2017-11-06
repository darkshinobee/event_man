<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/my_styles.css">
    <link rel="icon" type="image/jpg" href="/images/logos/fav_icon_1.jpg">
    <title>TicketRoom - Page Not Found</title>
  </head>
  <body>
    <p class="m-t-20" style="text-align:center"><img src="{{ asset('images/logos/t_logo.png') }}" alt="TicketRoom Logo"></p>
    <h2 class="text-center">Looks Like You're Dwelling in Uncharted Territory</h2>
    <br>
    <div class="row">
      <div class="col-sm-8 col-sm-offset-2">
        <div class="col-sm-6">
          <a class="btn btn-block myBtn" href="{{ route('home') }}">Go Home</a>
        </div>
        <div class="col-sm-6">
          <a class="btn btn-block myBtn" href="{{ route('upcoming_events') }}">Check out these events</a>
        </div>
      </div>
    </div>
  </body>
</html>
