<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<!-- Scripts -->
<script>
    window.Laravel = <?php echo json_encode([
        'csrfToken' => csrf_token(),
    ]); ?>
</script>
<title>TicketRoom - @yield('title')</title>
<link rel="stylesheet" href="/css/app.css">
<link rel="stylesheet" href="/css/admin_styles.css">
<link rel="stylesheet" href="/css/my_styles.css">
<link rel="icon" type="image/jpg" href="/images/logos/fav_icon_1.jpg">
