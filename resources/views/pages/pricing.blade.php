@extends('main')
@section('title', 'Pricing')
@section('content')
  <section class="section-page-header">
    <div class="container">
      <h1 class="entry-title">PRICING</h1>
    </div>
  </section>
  <section class="section-page-content">
  <div class="container">
      <div class="row">
        <div class="col-sm-8 col-sm-offset-2">
          <div class="col-sm-6">
            <img class="img-responsive" src="{{ asset('images/free.jpg') }}" alt="Free Events Image">
            <br>
            <p>Free events are free. No charge at all.</p>
            <p>Feel free to create as many free events as you want.</p>
            <p>Your customers don't have to pay for anything either.</p>
          </div>
          <div class="col-sm-6">
            <img class="img-responsive" src="{{ asset('images/naira.png') }}" alt="Paid Events Image">
            <br>
            <p>If you will be selling your tickets, TicketRoom would charge the following:</p>
            <p>Ticket Fee: 10% per ticket sold + N50 processing fee.</p>
            <p>Please note: TicketRoom would receive all transactions from the ticket sales then remit to the organizer in a timely fashion.</p>
          </div>
          <div>
            <h3 class="text-center"><a style="color:red" href="{{ route('contact') }}">Contact us</a> for a customized quotation.</h3>
          </div>
        </div>
      </div>
  </div>
</section>
@stop
