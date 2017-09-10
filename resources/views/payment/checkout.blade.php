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
                        <td><h4 v-model="v_price = {{ $event->early_bird }}">&#8358;{{ $event->early_bird }}</h4></td>
                      </tr>
                    @elseif ($radio_value == 'regular')
                      <tr>
                        <td><h4>REGULAR TICKET</h4></td>
                        <td><h4 v-model="v_price = {{ $event->regular_fee }}">&#8358;{{ $event->regular_fee }}</h4></td>
                      </tr>
                    @else
                      <tr>
                        <td><h4>VIP TICKET</h4></td>
                        <td><h4 v-model="v_price = {{ $event->vip_fee }}">&#8358;{{ $event->vip_fee }}</h4></td>
                      </tr>
                      @endif
                    </tbody>
                  </table>
                </div>
                <div class="seat-details-info-price">
                  <table class="table total-price">
                    <tbody>
                      <tr>
                        <td>Total Price</td>
                        <td class="price" v-model="v_total = v_price">&#8358;@{{ v_total }}</td>
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
                <div class="pricing">
                  <table class="table pricing-review">
                    <tbody>
                      <tr>
                        <td>Ticket Price</td>
                        <td>N100.00</td>
                      </tr>
                      <tr>
                        <td>Quantity</td>
                        <td>x2</td>
                      </tr>
                    </tbody>
                    <tfoot>
                      <tr>
                        <td>Total Price</td>
                        <td class="total-price">55</td>
                      </tr>
                    </tfoot>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            <button type="button" class="btn myBtn">Proceed To Payment</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.27/vue.js"></script>
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
