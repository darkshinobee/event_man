<!DOCTYPE html>
<html>
<head>
  @include('admin.a_partials._meta')
</head>
<body>
  <div class="col-md-8 col-md-offset-2 text-center">
    @include('admin.a_partials._prompts')
  </div>
  <div class="admin-panel clearfix">
    @include('admin.a_partials._sidebar')
    <div class="main">
      @include('admin.a_partials._nav')
      <div class="mainContent clearfix" style="margin: 25px 50px;">
        @yield('content')
      </div>
    </div>
  </div>
  @include('admin.a_partials._scripts')
</body>
</html>
