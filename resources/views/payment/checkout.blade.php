@extends('main')
@section('title', 'Checkout')
@section('content')

  <section class="section-page-header">
    <div class="container">
      <h1 class="entry-title">Checkout</h1>
    </div>
  </section>

  <div id="checkout">

    <section class="section-page-content">
      <div class="container">
        <div class="row">
          <div id="primary" class="col-md-6">
            <div class="section-order-details-event-title">
              <h2 class="event-title text-center"><strong>{{ $event->title }}</strong></h2>
              <img class="event-img" src="{{ $event->image_path }}" alt="image">
            </div>
          </div>

          <div id="secondary" class="col-md-6">
            <div class="section-order-details-event-info">
              <div class="venue-details">
                <h3>Venue &amp; Event Information</h3>
                <div class="venue-details-info">
                  <p>{{ $event->venue }}</p>
                  <p>{{ date_format(new DateTime($event->event_start_date), "l F j, Y ") }} | {{ date_format(new DateTime($event->event_start_time), "h:ia") }}</p>
                </div>
              </div>

              <div class="seat-details">
                <h3>Order Information</h3>
                <div class="seat-details-info">
                  <table class="table number-tickets">
                    <thead>
                      <tr>
                        <th>Delivery</th>
                        <th>Instant Download</th>
                      </tr>
                    </thead>
                    @if($event->event_type == 0)
                      <tbody>
                        <tr>
                          <td>Number of Tickets</td>
                          <td>
                            <div class="qty-select">
                              <div class="qty-input">
                                <input type="text" class="quantity-input" :value="qty" v-model.number="qty" min="1" max="1" readonly/>
                              </div>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td><h4>FREE TICKET</h4></td>
                          <td><h4>&#8358;0.00</h4></td>
                        </tr>
                      </tbody>
                    @else
                      <tbody>
                        <tr>
                          <td>Number of Tickets</td>
                          <td>
                            <div class="qty-select">
                              <div class="qty-minus">
                                <a class="qty-btn" v-if="qty > 1" @click="minus">-</a>
                              </div>
                              <div class="qty-input">
                                @if ($tickets_left > 4)
                                  <input type="text" class="quantity-input" :value="qty" v-model.number="qty" min="1" max="5" readonly/>
                                </div>
                                <div class="qty-plus">
                                  <a class="qty-btn" v-if="qty < 5" @click="add">+</a>
                                </div>
                              @else
                                <input type="text" class="quantity-input" :value="qty" v-model.number="qty" min="1" max="{{ $tickets_left }}" readonly/>
                              </div>
                              <div class="qty-plus">
                                <a class="qty-btn" v-if="qty < {{$tickets_left}}" @click="add">+</a>
                              </div>
                            @endif
                          </div>
                        </td>
                      </tr>
                      @if ($radio_value == 'early')
                        <tr>
                          <td><h4>EARLY BIRD TICKET</h4></td>
                          <td><h4 v-model="v_price = {{ $event->early_bird }}">&#8358;{{ number_format($event->early_bird,2) }}</h4></td>
                        </tr>
                      @elseif ($radio_value == 'regular')
                        <tr>
                          <td><h4>REGULAR TICKET</h4></td>
                          <td><h4 v-model="v_price = {{ $event->regular_fee }}">&#8358;{{ number_format($event->regular_fee,2) }}</h4></td>
                        </tr>
                      @else
                        <tr>
                          <td><h4>VIP TICKET</h4></td>
                          <td><h4 v-model="v_price = {{ $event->vip_fee }}">&#8358;{{ number_format($event->vip_fee,2) }}</h4></td>
                        </tr>
                      @endif
                    </tbody>
                  @endif
                </table>
              </div>
              <div class="seat-details-info-price">
                <table class="table total-price">
                  <tbody>
                    <tr>
                      <td>Total Price</td>
                      <td class="price" v-if="qty == 1">&#8358;@{{ v_price }}</td>
                      <td class="price" v-else v-model="v_price">&#8358;@{{ v_total }}</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="section-order-details-event-action">
            <ul class="row">
              <li class="col-xs-6 col-sm-6">
                <a class="secondary-link" href="#">Back</a>
              </li>
              <li class="col-xs-6 col-sm-6">
                <a class="primary-link" href="#" data-toggle="modal" data-target="#paymentModal">Proceed</a>
              </li>
            </ul>
          </div>
        </div>
      </div>

  </section>

  <!-- Modal -->
  <div class="modal fade" id="paymentModal" tabindex="-1" role="dialog" aria-labelledby="paymentModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-center" id="paymentModalLabel">ORDER SUMMARY</h5>
        </div>
        <div class="modal-body">
          <div class="section-order-review-pricing">
            <div class="pricing-coupon">
                <table class="table pricing-review">
                  <tbody>
                    <tr>
                      <td>Ticket Price</td>
                      @if ($event->event_type == 0)
                        <td>FREE</td>
                      @else
                        <td>&#8358;@{{ v_price }}</td>
                      @endif
                    </tr>
                    <tr>
                      <td>Quantity</td>
                      <td>@{{ qty }}</td>
                    </tr>
                  </tbody>
                  <tfoot>
                    <tr>
                      <td>Total Price</td>
                      <td class="total-price" v-if="qty == 1">&#8358;@{{ v_price }}</td>
                      <td class="total-price" v-else>&#8358;@{{ v_total }}</td>
                    </tr>
                  </tfoot>
                </table>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>

          <form action="{{ route('pay') }}" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="event_id" value="{{ $event->id }}">
            <input type="hidden" name="email" value="{{ $attendee_email }}">
            @if ($radio_value == 'early')
              <input type="hidden" name="ticket_type" value="{{ 1 }}">
            @elseif ($radio_value == 'regular')
              <input type="hidden" name="ticket_type" value="{{ 2 }}">
            @else
              <input type="hidden" name="ticket_type" value="{{ 3 }}">
            @endif
            <input type="hidden" name="amount" v-if="qty == 1" :value="v_price * 100">
            <input type="hidden" name="amount" v-else :value="v_total * 100">

            <input type="hidden" name="quantity" :value="qty">
            <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}">
            <input type="hidden" name="key" value="{{ config('paystack.secretKey') }}">
            {{-- <input type="hidden" name="event_type" value="{{ $event->event_type }}"> --}}

          @if ($event->event_type == 0)
            <input type="hidden" name="ticket_type" value="{{ 0 }}">
            <button type="submit" class="btn myBtn">Download Ticket</button>
          @else
            <button type="submit" class="btn myBtn">Proceed To Payment</button>
          @endif
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</div>

{{-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.27/vue.js"></script> --}}
<script type="text/javascript" src="/js/vue.js"></script>
<script>
var v_checkout = new Vue({
  el: '#checkout',
  data: {
    qty: 1,
    v_price: 0,
    v_total: 0
  },
  methods: {
    add: function() {
      this.qty = +this.qty + +1;
      this.v_total = this.v_price * this.qty
    },
    minus: function() {
      this.qty = this.qty - 1;
      this.v_total = this.v_price * this.qty
    }
  }
});
</script>
@endsection
