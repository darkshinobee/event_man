@extends('admin.master')
@section('title', 'Edit Event')
@section('content')
  <div class="container" id="admin_event">
    <div class="row" style="height:753px; overflow-x: scroll;">
      <div class="col-sm-10 col-sm-offset-1">
        <h2 class="text-center">EDIT EVENT</h2><br>
        <form action="{{ route('update_event_details', $event->id) }}" method="post">
          {{ csrf_field() }}
          <div class="form-group">
            <label for="title">Event Name *</label>
            <input name="title" type="text" value="{{ $event->title }}" class="form-control" required="">
          </div>
          <div class="form-group">
            <label for="venue">Venue *</label>
            <input name="venue" type="text" value="{{ $event->venue }}" class="form-control" required="">
          </div>
          <div class="form-group">
            <label for="state">State *</label>
            <select class="form-control" name="state" required="">
              <option value="{{ $event->state }}">{{ $event->state }}</option>
              <option value="Abia">Abia</option>
              <option value="Adamawa">Adamawa</option>
              <option value="Akwa Ibom">Akwa Ibom</option>
              <option value="Anambra">Anambra</option>
              <option value="Bauchi">Bauchi</option>
              <option value="Bayelsa">Bayelsa</option>
              <option value="Benue">Benue</option>
              <option value="Borno">Borno</option>
              <option value="Cross River">Cross River</option>
              <option value="Delta">Delta</option>
              <option value="Ebonyi">Ebonyi</option>
              <option value="Edo">Edo</option>
              <option value="Ekiti">Ekiti</option>
              <option value="Enugu">Enugu</option>
              <option value="Abuja">FCT-Abuja</option>
              <option value="Gombe">Gombe</option>
              <option value="Imo">Imo</option>
              <option value="Jigawa">Jigawa</option>
              <option value="Kaduna">Kaduna</option>
              <option value="Kano">Kano</option>
              <option value="Katsina">Katsina</option>
              <option value="Kebbi">Kebbi</option>
              <option value="Kogi">Kogi</option>
              <option value="Kwara">Kwara</option>
              <option value="Lagos">Lagos</option>
              <option value="Nasarawa">Nasarawa</option>
              <option value="Niger">Niger</option>
              <option value="Ogun">Ogun</option>
              <option value="Ondo">Ondo</option>
              <option value="Osun">Osun</option>
              <option value="Oyo">Oyo</option>
              <option value="Plateau">Plateau</option>
              <option value="Rivers">Rivers</option>
              <option value="Sokoto">Sokoto</option>
              <option value="Taraba">Taraba</option>
              <option value="Yobe">Yobe</option>
              <option value="Zamafara">Zamafara</option>
            </select>
          </div>
          <div class="form-group">
            <label for="description">Description *</label>
            <textarea name="description" rows="8" cols="80" class="form-control" required="">{{ $event->description }}</textarea>
          </div>
          <div class="form-group">
            <label for="category">Category *</label>
            <select class="form-control" name="category" required="">
              <option value="{{ $event->category }}">{{ $event->category }}</option>
              <option value="Concert">Concerts</option>
              <option value="Sports">Sports &amp; Health</option>
              <option value="Networking">Networking</option>
              <option value="Conference">Conference</option>
              <option value="Food">Food &amp; Drink</option>
              <option value="Class">Classes</option>
              <option value="Arts">Arts &amp; Culture</option>
              <option value="Other">Other</option>
            </select>
          </div>
          {{-- @if ($event->event_type == 0)
            <div class="form-group">
              <label for="ticket_count">Max Number of Tickets *</label>
              <input name="ticket_count" type="number" value="{{ $event->ticket_count }}" class="form-control" required>
            </div>
            @else
              <div>
                <div class="row">
                  <div class="form-group col-sm-4">
                    <label for="early_bird">Early bird</label>
                    <input name="early_bird" type="number" class="form-control" value="{{ $event->early_bird }}">
                  </div>
                  <div class="form-group col-sm-4">
                    <label for="vip_fee">VIP fee</label>
                    <input name="vip_fee" type="number" class="form-control" value="{{ $event->vip_fee }}">
                  </div>
                  <div class="form-group col-sm-4">
                    <label for="regular_fee">Regular fee *</label>
                    <input name="regular_fee" type="number" class="form-control" value="{{ $event->regular_fee }}" required>
                  </div>
                </div>

                <div class="row">
                  <div class="form-group col-sm-4">
                    <label for="early_max">Early bird Qty</label>
                    <input name="early_max" type="number" class="form-control" value="{{ $event->early_max }}">
                  </div>
                  <div class="form-group col-sm-4">
                    <label for="vip_max">VIP Qty</label>
                    <input name="vip_max" type="number" class="form-control" value="{{ $event->vip_max }}">
                  </div>
                  <div class="form-group col-sm-4">
                    <label for="regular_max">Regular Qty *</label>
                    <input name="regular_max" type="number" class="form-control" value="{{ $event->regular_max }}" required>
                  </div>
                </div>
              </div>
          @endif --}}
          <div class="row">
            <div class="form-group col-sm-4">
              <label for="event_start_date">Start Date</label>
              <input type="date" name="event_start_date" value="{{ $event->event_start_date }}" min="{{ date("Y-m-d") }}" class="form-control" required>
            </div>
            <div class="form-group col-sm-4">
              <label for="event_start_time">Start Time</label>
              <input type="time" name="event_start_time" value="{{ $event->event_start_time }}" class="form-control" required>
            </div>
            <div class="col-sm-4">
              Suitable for
              <div class="row form-check">
                <div class="col-sm-6 m-t-10">
                  Adults<input class="m-l-5 form-check-input" type="radio" name="event_over_18" value="{{ 0 }}" required>
                </div>
                <div class="col-sm-6 m-t-10">
                  All<input class="m-l-5 form-check-input" type="radio" name="event_over_18" value="{{ 1 }}" required>
                </div>
              </div>
            </div>
          </div><br>
          <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
              <button type="submit" class="btn btn-block btn-success">Submit</button>
            </div>
          </div><br>
        </form>
      </div>
    </div>
  </div>
@stop
