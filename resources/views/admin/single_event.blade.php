@extends('admin.master')
@section('title', 'Event Info')
@section('content')
      <div class="row" style="height:753px; overflow-x: scroll;">
          {{-- <div class="card" style=""> --}}
              <img class="img-responsive" src="{{ asset($event->image_path) }}" alt="Card image cap">
              <h3 class="text-center">{{ $event->title }}</h3><br>
              <div class="row">
                <div class="col-sm-7">
                  <span>{{ $event->venue.', '.$event->state }}</span><br>
                  <span>{{ date_format(new DateTime($event->event_start_date), "F jS, Y") }}</span><br>
                  <span>{{ date_format(new DateTime($event->event_start_time), "h:ia") }}</span><br>
                  @if ($event->event_over_18 == 0)
                    <span>18+</span>
                    @else
                      <span>For All Ages</span>
                  @endif
                </div>
                <div class="col-sm-5">
                  <p><a href="{{ route('organizer_events', $organizer->id) }}" style="cursor:pointer; color:#ff5700">Organized by - {{ $event->organizer ?: $organizer->first_name.' '.$organizer->last_name }}</a></p>
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
            <table class="table table-hover table-striped text-center">
              <thead>
                <th class="text-center">No of Tickets</th>
              </thead>
              <tbody>
                <tr>
                  <td>{{ $event->ticket_count }}</td>
                </tr>
              </tbody>
            </table>
          @else
            <h2 class="text-center">Paid Event</h2>
            <table class="table table-hover table-striped">
              <thead>
                <th></th>
                <th>Quantity</th>
              </thead>
              <tbody>
                @if ($event->early_bird > 0)
                  <tr>
                    <td>Early Bird - &#8358;{{ number_format($event->early_bird,2) }}</td>
                    <td>{{ $event->early_max }}</td>
                  </tr>
                @endif
                <tr>
                  <td>Regular - &#8358;{{ number_format($event->regular_fee,2) }}</td>
                  <td>{{ $event->regular_max }}</td>
                </tr>
                @if ($event->vip_fee > 0)
                  <tr>
                    <td>VIP - &#8358;{{ number_format($event->vip_fee,2) }}</td>
                    <td>{{ $event->vip_max }}</td>
                  </tr>
                @endif
                <tr>
                  <td>Total</td>
                  <td>{{ $event->ticket_count }}</td>
                </tr>
              </tbody>
            </table><br>
          @endif
          <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-4">
              <a class="btn btn-block btn-md btn-success" href="{{ route('approve', $event->id) }}">Approve</a>
            </div>
            <div class="col-sm-2"></div>
            <div class="col-sm-4">
              <a class="btn btn-block btn-md btn-danger" href="{{ route('reject', $event->id) }}">Reject</a>
            </div>
            <div class="col-sm-1"></div>
          </div><br>
      </div>

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
                  <form class="" action="{{ route('admin_contact_organizer') }}" method="post" id="contact">
                    {{ csrf_field() }}
                    <input type="hidden" name="organizer_id" value="{{ $organizer->id }}">
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
              <div>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn myBtn" form="contact">Send</button>
              </div>
            </div>
          </div>
        </div>
      </div>

@stop
