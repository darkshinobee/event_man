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
            <li class="category-1 col-sm-4">
              <img src="/theme/publish/images/event-category-1.jpg" alt="image">
              <a href="{{ route('events.category', 'concert') }}"><span>Concerts</span></a>
            </li>
            <li class="category-2 col-sm-4">
              <img src="/theme/publish/images/event-category-2.jpg" alt="image">
              <a href="{{ route('events.category', 'sport') }}"><span>Sports</span></a>
            </li>
            <li class="category-3 col-sm-4">
              <img src="/theme/publish/images/event-category-3.jpg" alt="image">
              <a href="{{ route('events.category', 'conference') }}"><span>Conference</span></a>
            </li>
            <li class="category-4 col-sm-4">
              <img src="/theme/publish/images/event-category-4.jpg" alt="image">
              <a href="{{ route('events.category', 'party') }}"><span>Parties</span></a>
            </li>
            <li class="category-5 col-sm-4">
              <img src="/theme/publish/images/event-category-5.jpg" alt="image">
              <a href="{{ route('events.category', 'religion') }}"><span>Religion</span></a>
            </li>
            <li class="category-6 col-sm-4">
              <img src="/theme/publish/images/event-category-6.jpg" alt="image">
              <a href="{{ route('events.category', 'class') }}"><span>Classes</span></a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </section>
@endsection
