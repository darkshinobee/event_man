@extends('main')
@section('title', 'Upcoming Events')
@section('content')
  <div id="app">
    <search></search>
  </div>

  <section class="section-search-content">
    <div class="container">
      <div class="row">


        <div id="primary" class="col-md-10 col-md-offset-1">

          <div class="search-result-header">
            <div class="row">
              <div class="text-center">
                <h1 class="event_title">UPCOMING EVENTS</h1>
              </div>
            </div>
          </div>
          @if ($events->Count())
            <div class="row">
              @foreach ($events as $event)
                <div class="col-sm-4 m-t-10">
                  <div class="card" style="">
                    <div class="cat_img" style="height:170px">
                      <a style="text-decoration:none;" href="{{ route('single_event', $event->slug) }}">
                        <img class="card-img-top image_cat" src="{{ asset($event->image_path) }}" alt="Card image cap">
                      </a>
                    </div>
                    <div class="card-body">
                      <div style="height:190px; overflow-x: scroll;">
                        <h3 class="event_title text-center card-title">{{ $event->title }}</h3>
                        <p class="card-text">Venue - {{ $event->venue.', '.$event->state }}</p>
                        <p class="card-text">Date - {{ date_format(new DateTime($event->event_start_date), "l, F jS, Y") }}</p>
                        <p class="card-text">Time - {{ date_format(new DateTime($event->event_start_time), "h:ia") }}</p>
                      </div>
                      <a href="{{ route('single_event', $event->slug) }}" class="btn btn-block myBtn">View Event</a>
                    </div>
                  </div>
                </div>
              @endforeach
            </div>
          @else
            <div class="img-responsive text-center">
              <img src="{{ asset('/images/logos/no_ticket.png') }}" alt="no ticket">
            </div>
          @endif
          <div class="text-center">
            {!! $events->links() !!}
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
