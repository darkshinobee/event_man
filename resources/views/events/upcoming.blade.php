@extends('main')
@section('title', 'Upcoming Events')
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

  <section class="section-calendar-events">
    <div class="container">
      <div class="row">
        <div class="section-content">
          <div class="tab-content">
              <div role="tabpanel" class="tab-pane active" id="tab1">
              <ul class="clearfix">
                @for ($i = 0; $i < 6; $i++)      
                <li>
                  <div class="date">
                    <a href="#">
                      <span class="day">29</span>
                      <span class="month">May</span>
                      <span class="year">2016</span>
                    </a>
                  </div>
                  <a href="#">
                    <img src="/images/zko.jpg" alt="image">
                  </a>
                  <div class="info">
                    <p>UEFA Champions League <span>San Francisco</span></p>
                    <a href="#" class="get-ticket">Get Ticket</a>
                  </div>
                </li>
                @endfor
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
