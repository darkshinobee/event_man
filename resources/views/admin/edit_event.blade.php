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

        </form>
      </div>
    </div>
  </div>
@stop
