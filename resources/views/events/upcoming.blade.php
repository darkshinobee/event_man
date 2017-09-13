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
                <h1>UPCOMING EVENTS</h1>
              </div>
            </div>
          </div>

          @foreach ($events as $event)
            <a style="text-decoration:none;" href="{{ route('single_event', $event->slug) }}">
          <div class="search-result-item">
            <div class="row">
              <div class="search-result-item-info col-sm-9">
                <h3>{{ $event->title }}</h3>
                <ul class="row">
                  <li class="col-sm-5 col-lg-6">
                    <span>Venue</span>
                    {{ $event->venue }}
                  </li>
                  <li class="col-sm-4 col-lg-3">
                    <span>{{ date_format(new DateTime($event->event_start_date), "l") }}</span>
                    {{ date_format(new DateTime($event->event_start_date), "F jS, Y") }}
                  </li>
                  <li class="col-sm-3">
                    <span>Time</span>
                    {{ date_format(new DateTime($event->event_start_time), "h:ia") }}
                  </li>
                </ul>
              </div></a>
              <div class="search-result-item-price col-sm-3">
                <span>Price</span>
                @if ($event->event_type == 0)
                  <strong>FREE</strong>
                @else
                  <strong>&#8358;{{ number_format($event->regular_fee,2) }}</strong>
                @endif
                <a href="{{ route('single_event', $event->slug) }}">View Details</a>
              </div>
            </div>
          </div>
          @endforeach
          <div class="text-center">
						{!! $events->links() !!}
					</div>
        </div>
      </div>
    </div>
  </section>
@endsection
