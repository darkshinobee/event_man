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
            <li>
              <div class="date">
                <a href="#">
                  <span class="day">25</span>
                  <span class="month">August</span>
                  <span class="year">2016</span>
                </a>
              </div>
              <a href="#">
                <img src="/theme/publish/images/upcoming-event-1.jpg" alt="image">
              </a>
              <div class="info">
                <p>BMW Open Championship <span>San Francisco</span></p>
                <a href="#" class="get-ticket">Get Ticket</a>
              </div>
            </li>
            <li>
              <div class="date">
                <a href="#">
                  <span class="day">26</span>
                  <span class="month">August</span>
                  <span class="year">2016</span>
                </a>
              </div>
              <a href="#">
                <img src="/theme/publish/images/upcoming-event-2.jpg" alt="image">
              </a>
              <div class="info">
                <p>Kiai Kanjeng Orchestra <span>San Francisco</span></p>
                <a href="#" class="get-ticket">Get Ticket</a>
              </div>
            </li>
            <li>
              <div class="date">
                <a href="#">
                  <span class="day">27</span>
                  <span class="month">August</span>
                  <span class="year">2016</span>
                </a>
              </div>
              <a href="#">
                <img src="/theme/publish/images/upcoming-event-3.jpg" alt="image">
              </a>
              <div class="info">
                <p>Envato Author SF Meetup <span>San Francisco</span></p>
                <a href="#" class="get-ticket">Get Ticket</a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </section>

@endsection
