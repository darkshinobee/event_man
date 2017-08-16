@extends('main')
@section('title', 'Blog')
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

<div class="container">
  <div class="row" style="margin-top:30px;">
    <div class="col-md-8">
      @for ($i = 0; $i < 3; $i++)
      <img class="" src="/images/storyroom-blog.png" alt="Blog Photo: 680x360">
      <h2>I Can't Think of A Title So Here Goes</h2>
      <p>by Andrea Bocelli | Dec 18, 2017 | Miscellaneous</p>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.....</p><hr>
      @endfor
    </div>
    <div class="col-md-1"></div>
    <div class="col-md-3">
      <div class="">
        <h3 class="text-center">Popular Posts</h3>
        @for ($i = 0; $i < 6; $i++)
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
</div><br>
@endsection
