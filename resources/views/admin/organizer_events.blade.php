@extends('admin.master')
@section('title', 'Organizer Events')
@section('content')
  <div class="container">
    <div class="row" style="height:753px; overflow-x: scroll;">
      <h1 class="text-center">{{ $organizer->first_name.' '.$organizer->last_name }}</h1>
      <p class="text-center"><a class="btn btn-sm btn-default" data-toggle="modal" data-target="#contactModal">Send Mail</a></p>
      <div class="clearfix">

      </div>
      <div class="col-sm-6">
        <h2 class="text-center m-t-15">Upcoming Events</h2>
        @if ($u_events->Count())
          <table class="table table-hover table-striped">
            <thead>
              <th>#</th>
              <th>Event</th>
              <th>Actions</th>
            </thead>
            <tbody>
              @php $i=0; @endphp
              @foreach ($u_events as $u_event)
                @php $i++; @endphp
                <tr>
                  <td>{{ $i }}</td>
                  <td>{{ $u_event->title }}</td>
                  <td><a href="{{ route('event_info', $u_event->id) }}" class="btn btn-sm myBtn">View Details</a></td>
                </tr>
              @endforeach
            </tbody>
          </table>
        @else
          <div class="img-responsive text-center">
            <img src="{{ asset('/images/no_ticket.png') }}" alt="no ticket">
          </div>
        @endif
      </div>
      <div class="col-sm-6">
        <h2 class="text-center m-t-15">Past Events</h2>
        @if ($p_events->Count())
          <table class="table table-hover table-striped">
            <thead>
              <th>#</th>
              <th>Event</th>
              <th>Actions</th>
            </thead>
            <tbody>
              @php $i=0; @endphp
              @foreach ($p_events as $p_event)
                @php $i++; @endphp
                <tr>
                  <td>{{ $i }}</td>
                  <td>{{ $p_event->title }}</td>
                  <td><a href="{{ route('event_info', $p_event->id) }}" class="btn btn-sm myBtn">View Details</a></td>
                </tr>
              @endforeach
            </tbody>
          </table>
        @else
          <div class="img-responsive text-center">
            <img src="{{ asset('/images/no_ticket.png') }}" alt="no ticket">
          </div>
        @endif
      </div>
    </div>
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
