<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async defer src="https://www.googletagmanager.com/gtag/js?id=UA-180264261-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-180264261-1');
    </script>

    <meta charset="UTF-8">
    <link href="//fonts.googleapis.com" rel="preconnect" crossorigin>
    <meta name="description" content="I am a full stack web developer. I do web design and web developent at efficient price and on time.">
    <meta name="keywords" content="Web Design, Web Development, Ecommerce, Application, Software">
    <meta name="author" content="Fahim Anzam Dip">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? config('app.name') }}</title>

    <!-- Google fonts for this template-->
    <link href="//fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!--Font Awesome CSS-->
    <link async defer rel="stylesheet" href="{{ asset('frontend/css/fontawesome.all.min.css') }}">

    <!--Animate CSS-->
    <link async defer rel="stylesheet" href="{{ asset('frontend/vendor/animate.css/animate.min.css') }}">

    <!-- Owl Carousel CSS -->
    <link async defer rel="stylesheet" href="{{ asset('frontend/vendor/owl/css/owl.carousel.min.css') }}">
    <link async defer rel="stylesheet" href="{{ asset('frontend/vendor/owl/css/owl.theme.default.min.css') }}">

    <!--Normalize CSS-->
    <link rel="stylesheet" href="{{ asset('frontend/css/normalize.css') }}">

    <!--Main CSS File-->
    <link rel="stylesheet" href="{{ asset('frontend/css/style.min.css') }}">

    <!--Fav Icon-->
    <link rel="shortcut icon" href="{{ asset('frontend/img/favicon.png') }}"/>
</head>

<body id="home" data-spy="scroll" data-target=".navbar" data-offset="80">

    <!--Preloader-->
    @include('frontend.sections.preloader')

    @yield('page-content')

    <!--Hire me Section-->
    @include('frontend.sections.hireme')

    <!--Contact Section-->
    @include('frontend.sections.contact')

    <!--Footer Start-->
    @include('frontend.sections.footer')

    @include('sweetalert::alert')

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('frontend/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('frontend/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('frontend/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Wow JS Scroll Animation-->
    <script async defer src="{{ asset('frontend/js/wow/wow.min.js') }}"></script>

    <!-- Waypoint JS -->
    <script src="{{ asset('frontend/vendor/waypoints/jquery.waypoints.min.js') }}"></script>

    <!-- Typed JS -->
    <script src="{{ asset('frontend/vendor/typedjs/typed.min.js') }}"></script>

    <!--Counter JS-->
    <script src="{{ asset('frontend/js/counter/counter.min.js') }}"></script>

    <!--Isotope JS-->
    <script async defer src="{{ asset('frontend/js/isotope/isotope.min.js') }}"></script>

    <!-- Owl Carousel JS -->
    <script src="{{ asset('frontend/vendor/owl/js/owl.carousel.min.js') }}"></script>

    <!-- Parallax JS -->
    <script src="{{ asset('frontend/vendor/parallax/parallax.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('frontend/js/main.js') }}"></script>
</body>

</html>
