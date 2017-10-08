@extends('main')
@section('title', 'Create Event')
@section('content')

  <section class="section-page-header">
    <div class="container">
      <h1 class="entry-title">CREATE NEW EVENT</h1>
    </div>
  </section>

  <section class="section-page-content" id="create">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-md-offset-3">
          <form class="" action="{{ route('events.store') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
              <label for="title">Event Name *</label>
              <input name="title" type="text" value="" class="form-control" required="" placeholder="Enter event name">
            </div>
            <div class="form-group">
              <label for="venue">Venue *</label>
              <input name="venue" type="text" value="" class="form-control" required="" placeholder="Enter event venue">
            </div>
            <div class="form-group">
              <label for="state">State *</label>
              <input name="state" type="text" value="" class="form-control" required="" placeholder="Enter event state">
            </div>
            <div class="form-group">
              <label for="description">Description *</label>
              <textarea name="description" rows="8" cols="80" class="form-control" required="" placeholder="Tell us about your awesome event"></textarea>
            </div>
            <div class="row">
              <div class="form-group col-sm-6">
                <label for="category">Category *</label>
                <select class="form-control" name="category" required="">
                  <option>--</option>
                  <option value="concert">Concerts</option>
                  <option value="sport & wellness">Sports &amp; Wellness</option>
                  <option value="networking">Networking</option>
                  <option value="conference">Conference</option>
                  <option value="food & drink">Food &amp; Drink</option>
                  <option value="class">Classes</option>
                </select>
              </div>
              <div class="form-group col-sm-6">
                <label for="organizer">Organizer (optional)</label>
                <input name="organizer" type="text" value="" class="form-control" placeholder="Enter event organizer">
              </div>
            </div>
            <div class="row">
          <div class="col-sm-6">
            <label>Event Type</label><br>
            <div class="form-check form-check-inline m-t-10">
              <label class="form-check-label">
                <input name="event_type" type="radio" class="form-check-input" value={{ 1 }} required="" @click="paid"> Paid
              </label>
              <label class="form-check-label">
                <input name="event_type" type="radio" class="form-check-input" value={{ 0 }} required="" checked @click="free"> Free
              </label>
            </div>
          </div>

          <div class="form-group col-sm-6" :hidden="isFree">
            <label for="ticket_count">Max Number of Tickets *</label>
            <input name="ticket_count" type="number" value="" class="form-control" :required="isPaid">
          </div>
        </div>
        <div class="" id="" :hidden="isPaid">
          <div class="row">
            <div class="form-group col-sm-4">
              <label for="early_bird">Early bird (optional)</label>
              <input name="early_bird" type="number" class="form-control" placeholder="&#8358; 00.00">
            </div>
            <div class="form-group col-sm-4">
              <label for="vip_fee">VIP fee (optional)</label>
              <input name="vip_fee" type="number" class="form-control" placeholder="&#8358; 00.00">
            </div>
            <div class="form-group col-sm-4">
              <label for="regular_fee">Regular fee *</label>
              <input name="regular_fee" type="number" class="form-control" placeholder="&#8358; 00.00" :required="isFree">
            </div>
          </div>

          <div class="row">
            <div class="form-group col-sm-4">
              <label for="early_bird">Early bird Qty</label>
              <input name="early_max" type="number" class="form-control" >
            </div>
            <div class="form-group col-sm-4">
              <label for="vip_fee">VIP Qty</label>
              <input name="vip_max" type="number" class="form-control" >
            </div>
            <div class="form-group col-sm-4">
              <label for="regular_fee">Regular Qty *</label>
              <input name="regular_max" type="number" class="form-control" :required="isFree">
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="image_path">Upload Event Photo (optional)</label>
          <input type="file" name="image_path" value="" class="form-control">
        </div>
        <div class="row">
          <div class="form-group col-sm-4">
            <label for="event_start_date">Start Date</label>
            <input type="date" name="event_start_date" value="" min="{{ date("Y-m-d") }}" class="form-control" required="">
          </div>
          <div class="form-group col-sm-4">
            <label for="event_start_time">Start Time</label>
            <input type="time" name="event_start_time" value="" class="form-control" required="">
          </div>
          {{-- <div class="form-group col-sm-4 m-t-35">
          <a data-toggle="collapse" href="#endTime" aria-expanded="false" aria-controls="endTime">+ Add End Time</a>
        </div> --}}
      </div>
      {{-- <div class="collapse" id="endTime">
      <div class="row">
      <div class="form-group col-sm-4">
      <label for="event_end_date">End Date</label>
      <input type="date" name="event_end_date" value="" class="form-control">
    </div>
    <div class="form-group col-sm-4">
    <label for="event_end_time">End Time</label>
    <input type="time" name="event_end_time" value="" class="form-control">
  </div>
</div>
</div> --}}
<button type="submit" class="btn btn-lg btn-block myBtn m-t-20">Submit</button>
</form>
</div>
</div>
</div>
</section>
<script type="text/javascript" src="/js/vue.js"></script>
<script>
var v_create = new Vue({
  el: '#create',
  data: {
    isFree: false,
    isPaid: true
  },
  methods: {
    free: function() {
      this.isFree = false;
      this.isPaid = true
    },
    paid: function() {
      this.isFree = true;
      this.isPaid = false
    }
  }
});
</script>
@endsection
