@extends('admin.master')
@section('title', 'Event Request')
@section('content')
  @if ($events->Count())
    <div class="row">


    @foreach ($events as $event)
      <div class="col-sm-6">
        <div class="card p-b-10" style="">
          <a href="{{ route('admin_single_event', $event->id) }}">
            <img class="card-img-top img-responsive" src="{{ $event->image_path }}" alt="Card image cap">
          </a>
          <div class="card-body p-t-10" style="height:120px; overflow-x: scroll;">
            <ul class="list-group list-group-flush">
              <li class="list-group-item">{{ $event->title }}</li>
              <li class="list-group-item">{{ $event->venue.', '.$event->state }}</li>
              <li class="list-group-item">Category - {{ $event->category }}</li>
              <li class="list-group-item">{{ $event->event_type == 0 ? 'Free Event' : 'Paid Event'}}</li>
              <li class="list-group-item">{{ date_format(new DateTime($event->event_start_date), "F jS, Y") }} | {{ date_format(new DateTime($event->event_start_time), "h:ia") }} </li>
            </ul>
          </div>
        </div>
      </div>
    @endforeach
    @else
    <div class="img-responsive text-center">
      <img src="/images/no_ticket.png" alt="no ticket">
    </div>
    </div>
  @endif
  <div class="text-center">
    {!! $events->links() !!}
  </div>

@stop
