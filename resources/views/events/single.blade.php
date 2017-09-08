@extends('main')
@section('title', $event->title)
@section('content')

  <div id="app">
    <search></search>
  </div>

  <section class="section-full-events-schedule">
    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <div class="section-content">
            <div class="tab-content">
              <div role="tabpanel" class="tab-pane active" id="tab1">
                <div class="tab-content">
                  <div role="tabpanel" class="tab-pane active" id="tab1-hr1">
                    <img src="{{ $event->image_path }}" alt="single_event 836x261">
                    <div class="full-event-info">
                      <div class="full-event-info-header">
                        <h2>{{ $event->title }}</h2>
                        @if ($event->status == 0)
                          @if ($event->ticket_count > 0)
                          <span class="ticket-left-info">{{ $event->ticket_count }} Tickets Left</span>
                          @else
                            <span class="ticket-left-info">Sold Out</span>
                            @endif
                        @endif
                        <div class="clearfix"></div>
                        <span class="event-date-info">{{ date_format(new DateTime($event->event_start_date), "l F j, Y ") }} | {{ date_format(new DateTime($event->event_start_time), "h:ia") }}</span>
                        <span class="event-venue-info">{{ $event->venue }}</span>
                        <div class="clearfix"></div>
                        <span class="event-venue-info">Organized by - {{ $event->organizer }}</span>
                        <div class="">
                          <span class=""><i class="fa fa-2x fa-thumbs-up">{{ $event->hits }}</i></span>
                          <span class="m-l-50"><i class="fa fa-2x fa-thumbs-down">{{ $event->misses }}</i></span>
                        </div>
                      </div>
                      <div class="full-event-info-content">
                        <p>{{ $event->description }}</p>
                        <div class="clearfix"></div>
                        @if ($event->status == 0)
                        <div class="row">
                          @if ($event->event_type == 0)
                            <div class="col-sm-6"></div>
                            @else
                          <div class="col-sm-6">

                            <div class="form-check">
                              <label class="form-check-label">
                                @if ($event->early_bird_max == null)
                                  <input class="form-check-input" type="radio" name="fee_type" value="early_bird" disabled>
                                  <small>Early Bird</small> - Not Applicable
                                @elseif ($event->early_bird_max > 0)
                                <input class="form-check-input" type="radio" name="fee_type" value="early_bird">
                                <small>Early Bird</small> - &#8358;{{ $event->early_bird }}
                                @else
                                  <input class="form-check-input" type="radio" name="fee_type" value="early_bird">
                                  <small>Early Bird</small> - Sold Out
                                @endif
                              </label>
                            </div>

                            <div class="form-check">
                              <label class="form-check-label">
                                @if ($event->regular_fee_max == null)
                                  <input class="form-check-input" type="radio" name="fee_type" value="regular" disabled>
                                  <small>Regular</small> - Not Applicable
                                @elseif ($event->regular_fee_max > 0)
                                <input class="form-check-input" type="radio" name="fee_type" value="regular">
                                <small>Regular</small> - &#8358;{{ $event->regular_fee }}
                                @else
                                  <input class="form-check-input" type="radio" name="fee_type" value="regular">
                                  <small>Regular</small> - Sold Out
                                @endif
                              </label>
                            </div>

                            <div class="form-check">
                              <label class="form-check-label">
                                @if ($event->vip_fee_max == null)
                                  <input class="form-check-input" type="radio" name="fee_type" value="vip" disabled>
                                  <small>VIP</small> - Not Applicable
                                @elseif ($event->vip_fee_max > 0)
                                <input class="form-check-input" type="radio" name="fee_type" value="vip">
                                <small>VIP</small> - &#8358;{{ $event->vip_fee }}
                                @else
                                  <input class="form-check-input" type="radio" name="fee_type" value="vip">
                                  <small>VIP</small> - Sold Out
                                @endif
                              </label>
                            </div>

                            </div>
                          @endif
                          @if ($event->ticket_count > 0)
                            <div class="col-sm-6">
                                <a class="book-ticket" href="#">Get Ticket</a>
                            </div>
                            @else
                              <div class="col-sm-6"></div>
                              @endif
                          </div>
                          @endif
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-1"></div>
        <div class="col-md-3">
          <div class="">
            <h3 class="text-center">Related Events</h3>
            @foreach ($related_events as $related)
              <div class="">
                <a class="" href="{{ route('single_event', $related->slug) }}">
                  <img class="img-responsive m-t-20" src="{{ $related->image_path }}" alt="Related photo">
                </a>
                <p class="m-t-5">{{ $related->title }}</p>
              </div>
            @endforeach
          </div>
          <a class="btn btn-md myBtn pull-right" href="{{ route('events.category', $event->category) }}">More...</a>
        </div>
      </div>
    </div>
  </section>

@endsection
