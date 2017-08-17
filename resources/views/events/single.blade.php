@extends('main')
@section('title', 'Single Event')
@section('content')

  <section class="section-refine-search">
    <div class="container">
      <div class="row">
        <form class="row">
          <div class="keyword col-md-8">
            <label>Search Event</label>
            <input type="text" class="form-control hasclear" placeholder="Search">
            <span class="clearer"><img src="/theme/publish/images/clear.png" alt="clear"></span>
          </div>
          <div class="col-md-4 p-t-10">
            <input type="submit" value="Search">
          </div>
        </form>
      </div>
    </div>
  </section>

  <section class="section-full-events-schedule">
    <div class="container">
      <div class="row">
        <div class="col-md-8">
        <div class="section-content">
          <div class="tab-content">
              <div role="tabpanel" class="tab-pane active" id="tab1">
                  <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="tab1-hr1">
                      <img src="/images/zko.jpg" alt="single_event 836x261">
                      <div class="full-event-info">
                        <div class="full-event-info-header">
                          <h2>Zurich Chamber Orchestra</h2>
                          <span class="ticket-left-info">18 Tickets Left</span>
                          <div class="clearfix"></div>
                          <span class="event-date-info">Saturday, August 22, 2016 | 08:00 AM</span>
                          <span class="event-venue-info">220 Morrissey Blvd. Zurich, SW 02125</span>
                        </div>
                        <div class="full-event-info-content">
                          <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</p>
                          <a class="book-ticket" href="#">Buy Now @ N200</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
          </div>
        </div>
        <div class="col-md-1"></div>
        <div class="col-md-3">
          <div class="">
            <h3 class="text-center">Related Events</h3>
            @for ($i = 0; $i < 3; $i++)
            <div class="">
              <img class="img-responsive m-t-20" src="/images/zko_violin.jpg" alt="Related photo">
              <p class="m-t-5">Some Cool Concert</p>
            </div>
            @endfor
          </div>
          <a class="btn btn-md myBtn pull-right" href="#">More...</a>
        </div>
      </div>
    </div>
  </section>

@endsection
