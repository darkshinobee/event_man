@extends('main')
@section('title', 'Pricing')
@section('content')
  <section class="section-page-header">
    <div class="container">
      <h1 class="entry-title">PRICING</h1>
    </div>
  </section>

<section id="plans" class="m-t-30">
    <div class="container">
        <div class="row">
            <div class="col-md-6 text-center">
                <div style="background-color:#052842" class="panel panel-pricing">
                    <div class="panel-heading">
                        <h3 style="color:#ffffff">Free Events</h3>
                    </div>
                    <ul style="height:170px" class="list-group text-center">
                        <li class="list-group-item">Free events are free. No charge at all.</li>
                        <li class="list-group-item">Feel free to create as many free events as you want.</li>
                        <li class="list-group-item">Your customers don't have to pay for anything either.</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6 text-center">
                <div style="background-color:#ff6600" class="panel panel-pricing">
                    <div class="panel-heading">
                        <h3 style="color:#ffffff">Paid Events</h3>
                    </div>
                    <ul class="list-group text-center">
                      <li class="list-group-item">If you will be selling your tickets, TicketRoom would charge the following:</li>
                        <li class="list-group-item">Ticket Fee: 10% per ticket sold + &#8358;1000 processing fee.</li>
                        <li class="list-group-item">TicketRoom would receive all transactions from the ticket sales then remit to the organizer in a timely fashion.</li>
                    </ul>
                </div>
            </div>
          </div>
    </div>
</section>
@stop
