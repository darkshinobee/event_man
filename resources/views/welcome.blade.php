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
              <img class="img-responsive image_cat" src="{{ asset('/images/defaults/Concert.jpg') }}" alt="Converts image">
              <a class="m-t-50" style="color:#ff6600;" href="{{ route('events.category', 'Concert') }}">CONCERTS</a>
            </li>
            <li class="col-sm-4 cat_img">
              <img class="img-responsive image_cat" src="{{ asset('/images/defaults/Sports.jpg') }}" alt="Sports image">
              <a class="m-t-50" style="color:#ff6600;" href="{{ route('events.category', 'Sports') }}">Sports & Health</a>
            </li>
            <li class="col-sm-4 cat_img">
              <img class="img-responsive image_cat" src="{{ asset('/images/defaults/Conference.jpg') }}" alt="Conference image">
              <a class="m-t-50" style="color:#ff6600;" href="{{ route('events.category', 'Conference') }}">Conference</a>
            </li>
            <li class="col-sm-4 cat_img">
              <img class="img-responsive image_cat" src="{{ asset('/images/defaults/Food.jpg') }}" alt="Food image">
              <a class="m-t-50" style="color:#ff6600;" href="{{ route('events.category', 'Food') }}">Food & Drink</a>
            </li>
            <li class="col-sm-4 cat_img">
              <img class="img-responsive image_cat" src="{{ asset('/images/defaults/Networking.jpg') }}" alt="Networking image">
              <a class="m-t-50" style="color:#ff6600;" href="{{ route('events.category', 'Networking') }}">Networking</a>
            </li>
            <li class=" col-sm-4 cat_img">
              <img class="img-responsive image_cat" src="{{ asset('/images/defaults/Class.jpg') }}" alt="Class image">
              <a class="m-t-50" style="color:#ff6600;" href="{{ route('events.category', 'Class') }}">Classes</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </section>
@endsection
