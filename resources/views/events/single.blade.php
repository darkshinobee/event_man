@extends('main')
@section('title', $event->title)
@section('content')

  <div id="app">
    <search></search>
  </div>
  <div id="single">


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
                          {{-- <div class="">
                            <a style="cursor:pointer; text-decoration:none;" @click="hit" class="fa fa-2x fa-thumbs-up" v-model="hits">@{{ hits }}</a>
                            <a style="cursor:pointer; text-decoration:none;" @click="miss" class="fa fa-2x fa-thumbs-down m-l-50">@{{ misses }}</a>
                          </div> --}}
                        </div>
                        <div class="full-event-info-content">
                          <p>{{ $event->description }}</p>
                          <div class="clearfix"></div>
                          @if ($event->status == 0)
                            <div class="row">
                              @if ($event->event_type == 0)
                                <div class="col-sm-6">
                                  <h1> FREE TICKET</h1>
                                </div>

                                @if ($event->ticket_count > 0)
                                  <div class="col-sm-6">
                                    <form action="{{ route('checkout', $event->slug) }}" method="post">
                                      {{ csrf_field() }}
                                      <button type="submit" class="book-ticket">Get Ticket</button>
                                    </form>
                                    <h1></h1>
                                  </div>
                                @else
                                  <div class="col-sm-6">
                                    <a class="book-ticket" disabled>Sold Out</a>
                                  </div>
                                @endif

                              @else
                                <div class="col-sm-6">
                                  <form action="{{ route('checkout', $event->slug) }}" method="post" id="checkout_form">
                                    {{ csrf_field() }}
                                    <div class="form-check">
                                      <label class="form-check-label">
                                        @if ($event->early_max == null)
                                          <input class="form-check-input" type="radio" name="fee_type" value="early" disabled>
                                          <small>Early Bird</small> - Not Applicable
                                        @elseif ($event->early_max > 0)
                                          <input class="form-check-input" type="radio" name="fee_type" value="early" v-model="radio">
                                          <small>Early Bird</small> - &#8358;{{ number_format($event->early_bird,2) }}
                                        @else
                                          <input class="form-check-input" type="radio" name="fee_type" value="early" disabled>
                                          <small>Early Bird</small> - Sold Out
                                        @endif
                                      </label>
                                    </div>

                                    <div class="form-check">
                                      <label class="form-check-label">
                                        @if ($event->regular_max == null)
                                          <input class="form-check-input" type="radio" name="fee_type" value="regular" disabled>
                                          <small>Regular</small> - Not Applicable
                                        @elseif ($event->regular_max > 0)
                                          <input class="form-check-input" type="radio" name="fee_type" value="regular" v-model="radio">
                                          <small>Regular</small> - &#8358;{{ number_format($event->regular_fee,2) }}
                                        @else
                                          <input class="form-check-input" type="radio" name="fee_type" value="regular" disabled>
                                          <small>Regular</small> - Sold Out
                                        @endif
                                      </label>
                                    </div>

                                    <div class="form-check">
                                      <label class="form-check-label">
                                        @if ($event->vip_max == null)
                                          <input class="form-check-input" type="radio" name="fee_type" value="vip" disabled>
                                          <small>VIP</small> - Not Applicable
                                        @elseif ($event->vip_max > 0)
                                          <input class="form-check-input" type="radio" name="fee_type" value="vip" v-model="radio">
                                          <small>VIP</small> - &#8358;{{ number_format($event->vip_fee,2) }}
                                        @else
                                          <input class="form-check-input" type="radio" name="fee_type" value="vip" disabled>
                                          <small>VIP</small> - Sold Out
                                        @endif
                                      </label>
                                    </div>
                                  </form>
                                </div>

                                @if ($event->ticket_count > 0)
                                  <div class="col-sm-6">
                                    <button v-if="radio" type="submit" class="book-ticket" form="checkout_form">Get Ticket</button>
                                    <h1></h1>
                                  </div>
                                @else
                                  <div class="col-sm-6">
                                    <a class="book-ticket" disabled>Sold Out</a>
                                  </div>
                                @endif
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
  </div>
  <script type="text/javascript" src="/js/vue.js"></script>
  <script>
  new Vue({
    el: '#single',
    data: {
      radio: '',
      hits: {!! json_encode($event->hits) !!},
      misses: {!! json_encode($event->misses) !!},
      v_event_id: {!! json_encode($event->id) !!},
      @if (Auth::guard('customer')->check())
        v_customer_id: {!! json_encode($customer_id) !!}
      @endif
    },
    methods: {
      hit: function() {
        axios.post('/event/hit/'+this.v_event_id+'/'+this.v_customer_id)
        .then(function (response) {
          this.hits = response.data
        });
      },
      miss: function() {
        axios.post('/event/miss/'+this.v_event_id+'/'+this.v_customer_id)
        .then(function (response) {
          this.misses = response.data
        });
      }
    }
  });
  </script>

@endsection
