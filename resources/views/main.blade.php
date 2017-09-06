<!DOCTYPE html>
<html>
  <head>
    @include('partials._meta')
  </head>
  <body>
    <div class="col-md-8 col-md-offset-2 text-center">
  		@include('partials._prompts')
  	</div>
    @include('partials._nav')
    @yield('content')
    <footer id="colophon" class="site-footer">
      @include('partials._footer')
    </footer>
    @include('partials._scripts')
  </body>
</html>
