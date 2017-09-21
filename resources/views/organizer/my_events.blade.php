@extends('main')
@section('title', 'My Events')
@section('content')
  <section class="section-page-header">
    <div class="container">
      <h1 class="entry-title">MY EVENTS</h1>
    </div>
  </section>

  <section class="section-full-events-schedule">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          @if ($events->Count())
          @foreach ($events as $event)
            <div class="row">
              <div class="col-md-2 m-t-10">
                <a href="{{ route('single_event', $event->slug) }}">
                <img class="img-responsive" src="{{ $event->image_path }}" width="100%" height="100px" alt="Event Photo">
              </a><br>
                <a class="btn btn-sm myBtn btn-block" href="{{ route('view_list', $event->event_id) }}">Guest List</a>
                {{-- <a class="btn btn-sm myBtn btn-block" href="{{ route('download_list', $event->event_id) }}">Download List</a> --}}
              </div>
              <div class="col-md-6">
                <ul class="list-group">
                  <li class="list-group-item">Event Name - {{ $event->title }}</li>
                  <li class="list-group-item">Venue - {{ $event->venue.', '.$event->state }}</li>
                  <li class="list-group-item">Category - {{ $event->category }}</li>
                  {{-- <li class="list-group-item">Hits - {{ $event->hits }} | Misses - {{ $event->misses }}</li> --}}
                  @if ($event->status == 0)
                    <li class="list-group-item">Due {{ date_format(new DateTime($event->event_start_date), "F jS, Y") }} | {{ date_format(new DateTime($event->event_start_time), "h:ia") }} </li>
                    @else
                    <li class="list-group-item">Held on {{ date_format(new DateTime($event->event_start_date), "F jS, Y") }} | {{ date_format(new DateTime($event->event_start_time), "h:ia") }} </li>
                  @endif
                </ul>
              </div>
              <div class="col-md-4">
                <ul class="list-group">
                  @if ($event->event_type == 0)
                    <li class="list-group-item">Event Type - Free</li>
                    <li class="list-group-item">Tickets Unbooked - {{ $event->ticket_count }}</li>
                    @else
                      @if ($event->early_max != null)
                        <li class="list-group-item">Early Bird - &#8358;{{ number_format($event->early_bird, 2) }} | {{ $event->early_max }} Unbooked</li>@endif
                      @if ($event->regular_max != null)
                        <li class="list-group-item">Regular - &#8358;{{ number_format($event->regular_fee, 2) }} | {{ $event->regular_max }} Unbooked</li>@endif
                      @if ($event->vip_max != null)
                        <li class="list-group-item">VIP - &#8358;{{ number_format($event->vip_fee, 2) }} | {{ $event->vip_max }} Unbooked</li>@endif
                  @endif
                </ul>
              </div>
              </div>
            @endforeach
            {{-- <div class="text-center">
  						{!! $events->links() !!}
  					</div> --}}
          @else
            <div class="img-responsive text-center">
              <img src="/images/no_ticket.png" alt="no ticket">
            </div>
          @endif
          </div>
        </div>
      </div>
    </section>
  @stop
