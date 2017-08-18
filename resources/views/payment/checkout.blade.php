@extends('main')
@section('title', 'Checkout')
@section('content')

  <section class="section-page-header">
    <div class="container">
      <h1 class="entry-title">Checkout</h1>
    </div>
  </section>

  <section class="section-page-content">
    <div class="container">
      <div class="row">
        <div id="primary" class="col-md-6">
          <div class="section-order-details-event-title">
            <span class="event-caption">UEFA CHAMPIONS LEAGUE</span>
            <h2 class="event-title"><strong>FC BARCELONA</strong> VS <strong>AC MILAN</strong></h2>
            <img class="event-img" src="/theme/publish/images/order-details-img.jpg" alt="image">
          </div>
        </div>

        <div id="secondary" class="col-md-6">
          <div class="section-order-details-event-info">
            <div class="venue-details">
              <h3>Venue & Event Information</h3>
              <div class="venue-details-info">
                <p>Estadi Camp Nou - Barcelona</p>
                <p>Wednesday <span>10 August 2016 8:30 PM</span></p>
              </div>
            </div>

            <div class="seat-details">
              <h3>Order Information</h3>
              <div class="seat-details-info">
                <table class="table number-tickets">
                  <thead>
                    <tr>
                      <th>Delivery</th>
                      <th>Number of Tickets</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Instant Download</td>
                      <td>
                        <div class="qty-select">
                          <div class="qty-minus">
                            <a class="qty-btn" href="#">-</a>
                          </div>
                          <div class="qty-input">
                            <input type="text" class="quantity-input" value="1" />
                          </div>
                          <div class="qty-plus">
                            <a class="qty-btn" href="#">+</a>
                          </div>
                        </div>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div class="seat-details-info-price">
                <table class="table total-price">
                  <tbody>
                    <tr>
                      <td>Total Price</td>
                      <td class="price">N200</td>
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
                  <td class="total-price">N200</td>
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
@endsection
