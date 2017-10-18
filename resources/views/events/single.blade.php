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
                      <img src="{{ asset($event->image_path) }}" alt="single_event 836x261">
                      <div class="full-event-info">
                        <div class="full-event-info-header">
                          <h2>{{ $event->title }}</h2>
                          @if ($event->status == 0)
                            @if ($event->ticket_bought < $event->ticket_count)
                              <span class="ticket-left-info">{{ $event->ticket_count - $event->ticket_bought }} Tickets Left</span>
                            @else
                              <span class="ticket-left-info">Sold Out</span>
                            @endif
                          @endif
                          <div class="clearfix"></div>
                          <div class="row">
                            <div class="col-sm-8">
                              <p><span class="">{{ $event->venue.', '.$event->state }}</span></p>
                              <p><span class="">{{ date_format(new DateTime($event->event_start_date), "l F j, Y ") }} | {{ date_format(new DateTime($event->event_start_time), "h:ia") }}</span></p>
                              @if ($event->event_over_18 == 0)
                                <p><span>18+</span></p>
                                @else
                                  <p><span>For All Ages</span></p>
                              @endif
                            </div>
                            <div class="col-sm-4">
                              <p><span class="">Organized by - {{ $event->organizer ?: $organizer->first_name.' '.$organizer->last_name }}</span></p>
                              <p><a style="cursor:pointer; color:#ff5700" data-toggle="modal" data-target="#contactModal">Contact Organizer</a></p>
                            </div>
                          </div>
                          <div class="clearfix"></div>
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
                                {{-- <h1> FREE TICKET</h1> --}}
                              </div>

                              @if ($event->ticket_bought < $event->ticket_count)
                                <div class="col-sm-6">
                                  <form action="{{ route('free_checkout', $event->slug) }}" method="post">
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-lg btn-block myBtn">Get Free Ticket</button>
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
                                <h5 style="color:#ff5700">Select Ticket <span><i class="fa fa-arrow-down" aria-hidden="true"></i></span></h5>
                                <form action="{{ route('checkout', $event->slug) }}" method="post" id="checkout_form">
                                  {{ csrf_field() }}
                                  @if ($event->early_bought < $event->early_max)
                                    <div class="form-check">
                                      <label class="form-check-label">
                                        <input style="cursor:pointer" class="form-check-input m-l-5" type="radio" name="fee_type" value="early" v-model="radio">
                                        <small>Early Bird</small> - &#8358;{{ number_format($event->early_bird,2) }}
                                      </label>
                                    </div>
                                  @endif

                                  @if ($event->regular_bought < $event->regular_max)
                                    <div class="form-check">
                                      <label class="form-check-label">
                                        <input style="cursor:pointer" class="form-check-input m-l-5" type="radio" name="fee_type" value="regular" v-model="radio">
                                        <small>Regular</small> - &#8358;{{ number_format($event->regular_fee,2) }}
                                      </label>
                                    </div>
                                  @endif

                                  @if ($event->vip_bought < $event->vip_max)
                                    <div class="form-check">
                                      <label class="form-check-label">
                                        <input style="cursor:pointer" class="form-check-input m-l-5" type="radio" name="fee_type" value="vip" v-model="radio">
                                        <small>VIP</small> - &#8358;{{ number_format($event->vip_fee,2) }}
                                      </label>
                                    </div>
                                  @endif

                                </form>
                              </div>

                              @if ($event->ticket_bought < $event->ticket_count)
                                <div class="col-sm-6">
                                  <button v-if="radio" type="submit" class="btn btn-block btn-lg myBtn m-t-30" form="checkout_form">Get Ticket</button>
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
                  <img class="img-responsive m-t-20" src="{{ asset($related->image_path) }}" alt="Related photo">
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

  <!-- Contact Modal -->
  <div class="modal fade" id="contactModal" tabindex="-1" role="dialog" aria-labelledby="contactModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-center" id="contactModalLabel">Contact Organizer</h5>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-sm-8 col-sm-offset-2">
              <form class="" action="{{ route('contact_organizer') }}" method="post" id="contact">
                {{ csrf_field() }}
                @if (!Auth::guard('customer')->check())
                  <div class="row">
                    <div class="col-sm-6">
                      <input class="form-control" type="text" name="first_name" placeholder="First Name" required>
                    </div>
                    <div class="col-sm-6">
                      <input class="form-control" type="text" name="last_name" placeholder="Last Name" required>
                    </div>
                  </div><br>
                  <div class="row">
                    <div class="col-sm-12">
                      <input class="form-control" type="email" name="attendee_email" placeholder="Email" required>
                    </div>
                  </div><br>
                @else
                  <input type="hidden" name="first_name" value="{{ Auth::guard('customer')->user()->first_name }}">
                  <input type="hidden" name="last_name" value="{{ Auth::guard('customer')->user()->last_name }}">
                  <input type="hidden" name="attendee_email" value="{{ Auth::guard('customer')->user()->email }}">
                @endif
                <input type="hidden" name="event_id" value="{{ $event->id }}">
                <div class="row">
                  <div class="col-sm-12">
                    <input class="form-control" type="text" name="subject" placeholder="Subject" required>
                  </div>
                </div><br>
                <div class="row">
                  <div class="col-sm-12">
                    <textarea class="form-control" name="message" rows="8" cols="80" placeholder="Message" required></textarea>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <div v-if="isDormant">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn myBtn" form="contact" @click="">Send</button>
          </div>
          <button v-else class="loader"></button>
        </div>
      </div>
    </div>
  </div>

</div>
<script type="text/javascript" src="/js/vue.js"></script>
<script>
new Vue({
  el: '#single',
  data: {
    radio: '',
    isDormant: true
  },
  methods: {
    load: function() {
      this.isDormant = false
    }
    // hit: function() {
    //   axios.post('/event/hit/'+this.v_event_id+'/'+this.v_customer_id)
    //   .then(function (response) {
    //     this.hits = response.data
    //   });
    // },
    // miss: function() {
    //   axios.post('/event/miss/'+this.v_event_id+'/'+this.v_customer_id)
    //   .then(function (response) {
    //     this.misses = response.data
    //   });
    // }
  }
});
</script>

@endsection
