<!DOCTYPE html>
<html>
  <head>
    @include('partials._meta')
  </head>
  <body>
    @include('partials._nav')
    @yield('content')
    <footer id="colophon" class="site-footer">
      @include('partials._footer')
    </footer>
    @include('partials._scripts')
  </body>
</html>
