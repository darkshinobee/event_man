@extends('main')
@section('title', 'My Events')
@section('content')
  <section class="section-page-header">
    <div class="container">
      <h1 class="entry-title">MY EVENTS</h1>
    </div>
  </section>

  <section class="section-full-events-schedule">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h2 class="text-center m-t-15">UPCOMING EVENTS</h2>
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
                    <td><a href="{{ route('my_events_single', $u_event->slug) }}" class="btn btn-sm myBtn">View Details</a></td>
                  </tr>
                @endforeach
              </tbody>
            </table>
            <div class="text-center">
            {!! $u_events->links() !!}
          </div>
          @else
            <div class="img-responsive text-center">
              <img src="{{ asset('/images/logos/no_ticket.png') }}" alt="no ticket">
            </div>
          @endif
        </div>

        <div class="col-md-6">
          <h2 class="text-center m-t-15">PAST EVENTS</h2>
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
                    <td><a href="{{ route('my_events_single', $p_event->slug) }}" class="btn btn-sm myBtn">View Details</a></td>
                  </tr>
                @endforeach
              </tbody>
            </table>
            <div class="text-center">
            {!! $p_events->links() !!}
          </div>
          @else
            <div class="img-responsive text-center">
              <img src="{{ asset('/images/logos/no_ticket.png') }}" alt="no ticket">
            </div>
          @endif
        </div>

      </div>
    </div>
  </section>
@stop
