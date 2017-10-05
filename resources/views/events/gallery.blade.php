@extends('main')
@section('title', 'Past Events')
@section('content')
  <div id="app">
    <pastsearch></pastsearch>
  </div>

  <section class="section-search-content">
    <div class="container">
      <div class="row">


        <div id="primary" class="col-md-10 col-md-offset-1">

          <div class="search-result-header">
            <div class="row">
              <div class="text-center">
                <h1>PAST EVENTS</h1>
              </div>
            </div>
          </div>
          @if ($events->Count())
          @foreach ($events as $event)
            <div class="col-sm-4 m-t-10">
              <div class="card" style="">
                <div style="height:200px">
                  <a style="text-decoration:none;" href="{{ route('single_event', $event->slug) }}">
                    <img class="card-img-top" src="{{ $event->image_path }}" alt="Card image cap">
                  </a>
                </div>
                <div class="card-body">
                  <h4 class="card-title">{{ $event->title }}</h4>
                  <p style="height:35px; overflow-x: scroll;" class="card-text">Venue - {{ $event->venue.', '.$event->state }}</p>
                  <p class="card-text">Date - {{ date_format(new DateTime($event->event_start_date), "l, F jS, Y") }}</p>
                  <p class="card-text">Time - {{ date_format(new DateTime($event->event_start_time), "h:ia") }}</p>
                  <a href="{{ route('single_event', $event->slug) }}" class="btn btn-block myBtn">View Event</a>
                </div>
              </div>
            </div>
          @endforeach
        @else
          <div class="img-responsive text-center">
            <img src="/images/no_ticket.png" alt="no ticket">
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
