@extends('main')
@section('title', 'My Events')
@section('content')
  <section class="section-page-header">
    <div class="container">
      <h1 class="entry-title">{{ $event->title }}</h1>
    </div>
  </section>

  <section class="section-full-events-schedule">
    <div class="container">
      <div class="row">
        <div class="col-sm-5">
          <div class="card" style="">
            <a href="{{ route('single_event', $event->slug) }}">
              <img class="card-img-top" src="{{ $event->image_path }}" alt="Card image cap">
            </a>
            <div class="card-body p-t-10">
              <ul class="list-group list-group-flush">
                <li class="list-group-item">Event Name - {{ $event->title }}</li>
                <li class="list-group-item">Date - {{ date_format(new DateTime($event->event_start_date), "F jS, Y") }} | {{ date_format(new DateTime($event->event_start_time), "h:ia") }} </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-sm-7">
          @if ($event->event_type == 0)
            <h2 class="text-center">Free Event</h2>
            <table class="table table-hover table-striped">
              <thead>
                <th>Tickets Bought</th>
                <th>Earnings</th>
              </thead>
              <tbody>
                <tr>
                  <td>{{ $event->ticket_bought.' / '.$event->ticket_count }}</td>
                  <td>&#8358;{{ number_format(0,2) }}</td>
                </tr>
              </tbody>
            </table>
          @else
            <h2 class="text-center">Paid Event</h2>
            <table class="table table-hover table-striped">
              <thead>
                <th></th>
                <th>Tickets Bought</th>
                <th>Earnings</th>
              </thead>
              <tbody>
                @if ($event->early_bird > 0)
                  <tr>
                    <td>Early Bird - &#8358;{{ number_format($event->early_bird,2) }}</td>
                    <td>{{ $event->early_bought.' / '.$event->early_max }}</td>
                    <td>&#8358;{{ number_format($event->early_bird * $event->early_bought,2) }}</td>
                  </tr>
                @endif
                <tr>
                  <td>Regular - &#8358;{{ number_format($event->regular_fee,2) }}</td>
                  <td>{{ $event->regular_bought.' / '.$event->regular_max }}</td>
                  <td>&#8358;{{ number_format($event->regular_fee * $event->regular_bought,2) }}</td>
                </tr>
                @if ($event->vip_fee > 0)
                  <tr>
                    <td>VIP - &#8358;{{ number_format($event->vip_fee,2) }}</td>
                    <td>{{ $event->vip_bought.' / '.$event->vip_max }}</td>
                    <td>&#8358;{{ number_format($event->vip_fee * $event->vip_bought,2) }}</td>
                  </tr>
                @endif
                <tr>
                  <td>Total</td>
                  <td>{{ $event->ticket_bought.' / '.$event->ticket_count }}</td>
                  <td>&#8358;{{ number_format(($event->early_bird * $event->early_bought)+($event->regular_fee * $event->regular_bought)+($event->vip_fee * $event->vip_bought),2) }}</td>
                </tr>
              </tbody>
            </table>
          @endif
        </div>
      </div>
    </div>
  </section>
@stop
