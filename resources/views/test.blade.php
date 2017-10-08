@extends('admin.master')
@section('title', 'Event Info')
@section('content')
      <div class="row" style="height:753px; overflow-x: scroll;">
          {{-- <div class="card" style=""> --}}
              <img class="img-responsive" src="{{ $event->image_path }}" alt="Card image cap">
              <h3 class="text-center">{{ $event->title }}</h3><br>
              <div class="row">
                <div class="col-sm-7">
                  <span>{{ $event->venue.', '.$event->state }}</span><br>
                  <span>{{ date_format(new DateTime($event->event_start_date), "F jS, Y") }}</span><br>
                  <span>{{ date_format(new DateTime($event->event_start_time), "h:ia") }}</span>
                </div>
                <div class="col-sm-5">
                  <p><span class="">Organized by - {{ $event->organizer ?: $organizer->first_name.' '.$organizer->last_name }}</span></p>
                  <p><a style="cursor:pointer; color:#ff5700" data-toggle="modal" data-target="#contactModal">Contact Organizer</a></p>
                </div>
              </div><br>
              <div class="row">
                <div class="col-sm-12">
                  <p>{{ $event->description }}</p>
                </div>
              </div>
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
            </table><br>
          @endif
          <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-4">
              <a class="btn btn-block btn-md btn-success" href="#">Approve</a>
            </div>
            <div class="col-sm-2"></div>
            <div class="col-sm-4">
              <a class="btn btn-block btn-md btn-danger" href="#">Reject</a>
            </div>
            <div class="col-sm-1"></div>
          </div><br>
      </div>

@stop
