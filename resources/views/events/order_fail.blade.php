@extends('main')
@section('title', 'Order Failed')
@section('content')
  <section class="section-page-header">
    <div class="container">
      <h1 class="entry-title">ORDER FAILED</h1>
    </div>
  </section>
  <section class="section-page-content">
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <div class="text-center">
            <h1>Sorry.</h1>
            <h3>Your order could not be processed.</h3>
            <h4>ORDER NUMBER: {{ $book->reference }}</h4><br>
            <p class="lead">Please try again.</p>
            <a href="{{ route('single_event', $event->slug) }}" class="btn btn-lg myBtn">Go Back</a>
          </div>
        </div>
      </div>
    </div>
  </section>
@stop
