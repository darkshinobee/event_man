@extends('main')
@section('title', 'Single Article')
@section('content')

  <section class="section-refine-search">
    <div class="container">
      <div class="row">
        <form class="row">
          <div class="keyword col-md-8">
            <label>Search Article</label>
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
                      <img src="/images/storyroom-blog.png" alt="single_event 836x261">
                      <div class="full-event-info">
                        <div class="full-event-info-header">
                          <h2>The Title Goes Here</h2>
                          <div class="clearfix"></div>
                          <span class="event-date-info">by Luciano Pavarotti | Aug 22, 2016</span>
                        </div>
                        <div class="full-event-info-content">
                          <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</p>
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
            <h3 class="text-center">Related Articles</h3>
            @for ($i = 0; $i < 2; $i++)
            <div class="">
              <img class="img-responsive m-t-20" src="/images/trailer.png" alt="Popular photo">
              <p class="m-t-5">The Blog Title</p>
            </div>
            @endfor
          </div>
          <a class="btn btn-md myBtn pull-right" href="#">More...</a>
          <div class="p-t-30">
            <h3 class="text-center">Categories</h3>
            <ul style="list-style:none;">
              <li>Travel</li>
              <li>Conference</li>
              <li>Party</li>
              <li>Sports</li>
              <li>Concert</li>
              <li>Entertainment</li>
              <li>Kids</li>
              <li>Technology</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection
