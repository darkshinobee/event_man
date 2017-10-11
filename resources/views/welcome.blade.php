@extends('main')
@section('title', 'Homepage')
@section('content')
  <section class="hero-1">
    <div class="container">
      <div class="row">
        <div class="hero-content">
          <h1 class="hero-title">Discover Your City One Event At A Time</h1>
          <p class="hero-caption">Meet your favorite artists, sport teams and parties</p>
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
              <img class="img-responsive image_cat" src="{{ asset('/images/defaults/concert.jpg') }}" alt="image">
              {{-- <a href="{{ route('events.category', 'concert') }}"></a> --}}
              <a href="{{ route('events.category', 'concert') }}"><span>Concerts</span></a>
            </li>
            <li class="col-sm-4 cat_img">
              <img class="img-responsive image_cat" src="{{ asset('/images/defaults/sport & wellness.jpg') }}" alt="image">
              <a href="{{ route('events.category', 'sport & wellness') }}"><span>Sport & Welness</span></a>
            </li>
            <li class="col-sm-4 cat_img">
              <img class="img-responsive image_cat" src="{{ asset('/images/defaults/conference.jpg') }}" alt="image">
              <a href="{{ route('events.category', 'conference') }}"><span>Conference</span></a>
            </li>
            <li class="col-sm-4 cat_img">
              <img class="img-responsive image_cat" src="{{ asset('/images/defaults/food & drink.jpg') }}" alt="image">
              <a href="{{ route('events.category', 'food & drink') }}"><span>Food & Drink</span></a>
            </li>
            <li class="col-sm-4 cat_img">
              <img class="img-responsive image_cat" src="{{ asset('/images/defaults/networking.jpg') }}" alt="image">
              <a href="{{ route('events.category', 'networking') }}"><span>Networking</span></a>
            </li>
            <li class=" col-sm-4 cat_img">
              <img class="img-responsive image_cat" src="{{ asset('/images/defaults/class.jpg') }}" alt="image">
              <a href="{{ route('events.category', 'class') }}"><span>Classes</span></a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </section>
@endsection
