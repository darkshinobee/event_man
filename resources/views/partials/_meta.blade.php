<meta charset="utf-8">
<meta name="viewport" content="width=device-width">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="">
<meta name="IB DeV" content="">

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<!-- Scripts -->
<script>
    window.Laravel = <?php echo json_encode([
        'csrfToken' => csrf_token(),
    ]); ?>
</script>

<title>TicketRoom - @yield('title')</title>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
{{-- <link rel="stylesheet" href="/theme/publish/css/bootstrap.min.css"> --}}
<link rel="stylesheet" href="/theme/publish/css/bootstrap-select.min.css">
<link rel="stylesheet" href="/theme/publish/css/bootstrap-slider.min.css">
<link rel="stylesheet" href="/theme/publish/css/jquery.scrolling-tabs.min.css">
<link rel="stylesheet" href="/theme/publish/css/bootstrap-checkbox.css">
<link rel="stylesheet" href="/theme/publish/css/flexslider.css">
<link rel="stylesheet" href="/theme/publish/css/featherlight.min.css">
<link rel="stylesheet" href="/theme/publish/css/font-awesome.min.css">
<link rel="stylesheet" href="/theme/publish/css/bootstrap.offcanvas.min.css">
<link rel="stylesheet" href="/theme/publish/css/core.css">

<link rel="stylesheet" href="/css/app.css">
<link rel="stylesheet" href="/css/my_styles.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<!-- Custom styles for this template -->
<link rel="stylesheet" href="/theme/publish/css/style.css" >
<link rel="stylesheet" href="/theme/publish/css/responsive.css" >
<link rel="icon" type="image/png" href="/images/logos/favicon2.png">
{{-- <link rel="icon" type="image/png" href="/favicon.ico"> --}}
