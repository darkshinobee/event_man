@extends('main')
@section('title', 'Homepage')
@section('content')
  <section class="hero-1">
    <div class="container">
      <div class="row">
        <div class="hero-content">
          <h1 class="hero-title">Discover Your City One Event At A Time</h1>
          <p class="hero-caption">Buy and Sell Your Event Tickets</p>
          <div id="app">
            <homesearch></homesearch>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="section-event-category">
    <div class="container">
      <div class="row">
        <div class="section-header">
          <h2>Event by Categories</h2>
        </div>
        <div class="section-content">
          <ul class="row clearfix">
            <li class="col-sm-4 cat_img">
              <img class="img-responsive image_cat" src="{{ asset('/images/defaults/Concert.jpg') }}" alt="image">
              <a href="{{ route('events.category', 'Concert') }}"><span><strong>Concerts</strong></span></a>
            </li>
            <li class="col-sm-4 cat_img">
              <img class="img-responsive image_cat" src="{{ asset('/images/defaults/Sport&Health.jpg') }}" alt="image">
              <a href="{{ route('events.category', 'Sports&Health') }}"><span><strong>Sports & Health</strong></span></a>
            </li>
            <li class="col-sm-4 cat_img">
              <img class="img-responsive image_cat" src="{{ asset('/images/defaults/Conference.jpg') }}" alt="image">
              <a href="{{ route('events.category', 'Conference') }}"><span><strong>Conference</strong></span></a>
            </li>
            <li class="col-sm-4 cat_img">
              <img class="img-responsive image_cat" src="{{ asset('/images/defaults/Food&Drink.jpg') }}" alt="image">
              <a href="{{ route('events.category', 'Food&Drink') }}"><span><strong>Food & Drink</strong></span></a>
            </li>
            <li class="col-sm-4 cat_img">
              <img class="img-responsive image_cat" src="{{ asset('/images/defaults/Networking.jpg') }}" alt="image">
              <a href="{{ route('events.category', 'Networking') }}"><span><strong>Networking</strong></span></a>
            </li>
            <li class=" col-sm-4 cat_img">
              <img class="img-responsive image_cat" src="{{ asset('/images/defaults/Class.jpg') }}" alt="image">
              <a href="{{ route('events.category', 'Class') }}"><span><strong>Classes</strong></span></a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </section>
@endsection
