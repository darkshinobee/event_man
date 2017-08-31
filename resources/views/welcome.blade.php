@extends('main')
@section('title', 'Homepage')
@section('content')
  <section class="hero-1">
    <div class="container">
      <div class="row">
        <div class="hero-content">
          <h1 class="hero-title">Make Your Dream Come True</h1>
          <p class="hero-caption">Meet your favorite artists, sport teams and parties</p>
          <div class="hero-search">
            <input type="text" placeholder="Seach Artist, Team, or Venue">
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="section-upcoming-events">
    <div class="container">
      <div class="row">
        <div class="section-header">
          <h2>Upcoming Events</h2>
          <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut.</p>
          <a href="#">See all upcoming events</a>
        </div>
        <div class="section-content">
          <ul class="clearfix">
            @for ($i = 0; $i < 6; $i++)
            <li>
              <div class="date">
                <a href="#">
                  <span class="day">27</span>
                  <span class="month">August</span>
                  <span class="year">2016</span>
                </a>
              </div>
              <a href="#">
                <img src="/images/zko.jpg" alt="image">
              </a>
              <div class="info">
                <p>Envato Author SF Meetup <span>San Francisco</span></p>
                <a href="#" class="get-ticket">Get Ticket</a>
              </div>
            </li>
            @endfor
          </ul>
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
              <a href="{{ route('events.category', 'sports') }}"><span>Sports</span></a>
            </li>
            <li class="category-3 col-sm-4">
              <img src="/theme/publish/images/event-category-3.jpg" alt="image">
              <a href="{{ route('events.category', 'conference') }}"><span>Conference</span></a>
            </li>
            <li class="category-4 col-sm-4">
              <img src="/theme/publish/images/event-category-4.jpg" alt="image">
              <a href="{{ route('events.category', 'parties') }}"><span>Parties</span></a>
            </li>
            <li class="category-5 col-sm-4">
              <img src="/theme/publish/images/event-category-5.jpg" alt="image">
              <a href="{{ route('events.category', 'religion') }}"><span>Religion</span></a>
            </li>
            <li class="category-6 col-sm-4">
              <img src="/theme/publish/images/event-category-6.jpg" alt="image">
              <a href="{{ route('events.category', 'classes') }}"><span>Classes</span></a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </section>
@endsection
