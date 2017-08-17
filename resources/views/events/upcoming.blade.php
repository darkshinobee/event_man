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

  <section class="section-search-content">
    <div class="container">
      <div class="row">


        <div id="primary" class="col-md-10 col-md-offset-1">

          <div class="search-result-header">
            <div class="row">
              <div class="col-sm-7">
                <h2>All Upcoming Sports Events</h2>
                <span>Showing 1-10 of 32 Results</span>
              </div>
              <div class="col-sm-5">
                <label>Sort By</label>
                <select class="selectpicker dropdown">
                  <option>Price: Low-High</option>
                  <option>Price: High-Low</option>
                </select>
              </div>
            </div>
          </div>

          @for ($i = 0; $i < 5; $i++)
          <div class="search-result-item">
            <div class="row">
              <div class="search-result-item-info col-sm-9">
                <h3>UCI Road World Championships</h3>
                <ul class="row">
                  <li class="col-sm-5 col-lg-6">
                    <span>Venue</span>
                    Rose Bowl (Pasadena, CA)
                  </li>
                  <li class="col-sm-4 col-lg-3">
                    <span>Saturday</span>
                    August. 20th, 2016
                  </li>
                  <li class="col-sm-3">
                    <span>Time</span>
                    07:00 PM
                  </li>
                </ul>
              </div>
              <div class="search-result-item-price col-sm-3">
                <span>Price</span>
                <strong>N200</strong>
                <a href="#">Get Ticket</a>
              </div>
            </div>
          </div>
          @endfor

        </div>
      </div>
    </div>
  </section>
@endsection
