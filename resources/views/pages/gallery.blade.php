@extends('main')
@section('title', 'Photo Gallery')
@section('content')
  <section class="section-gallery">
    <div class="container">
      <div class="row">
        <h1>A JOURNEY THROUGH TIME</h1>
        <div class="gallery-list row">
          @for ($i = 0; $i <= 8; $i++)
          <div class="gallery-img col-sm-4">
            <a href="#" data-featherlight="#content-1">
              <img src="/theme/publish/images/gallery-1.jpg" alt="image">
            </a>
            <div id="content-1" class="gallery-lightbox">
              <img src="/theme/publish/images/gallery-1.jpg" alt="image">
              <div class="gallery-lightbox-content">
                <h3>WORLD CUP 2014 FINAL: BRAZIL V CHILE</h3>
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
              </div>
            </div>
          </div>
          @endfor
        </div>
      </div>
    </div>
  </section>
@endsection
