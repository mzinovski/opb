<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
  <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="{{ Vite::asset('resources/images/logos/favicon.ico')}}" type="image/ico" />

    <title>@yield('title')</title>

    <meta name="title" content="@yield('meta_title')">
    <meta name="description" content="@yield('description')">
    {{-- facebook meta tags --}}
    <meta name="og:title" content="@yield('fb_meta_title')">
    <meta name="og:description" content="@yield('fb_description')">
    <meta property="og:url" content="@yield('fb_route')" />
    <meta property="og:type" content="@yield('fb_type')" />
    <meta property="og:image" content="@yield('fb_image')" />
    <meta property="og:image:width" content="600"/>
    <meta property="og:image:height" content="315"/>

    {{-- twitter meta tags --}}
    <meta name="twitter:title" content="@yield('twitter_meta_title')">
    <meta name="twitter:description" content="@yield('twitter_description')">
    <meta property="twitter:card" content="summary_large_image" />
    <meta property="twitter:url" content="@yield('twitter_url')" />

    <!-- bootstrap.min css -->
    <link rel="stylesheet" href="/plugins/bootstrap/css/bootstrap.min.css">
    <!-- Icon Font Css -->
    <link rel="stylesheet" href="/plugins/themify/css/themify-icons.css">
    <link rel="stylesheet" href="/plugins/fontawesome/css/all.css">
    <link rel="stylesheet" href="/plugins/magnific-popup/dist/magnific-popup.css">
    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="/plugins/slick-carousel/slick/slick.css">
    <link rel="stylesheet" href="/plugins/slick-carousel/slick/slick-theme.css">

    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="/my_css/style.css">

</head>

<body>


@include('landing.partials.header')

<div class="main-wrapper ">

    @yield('content')


@include('landing.partials.footer')
   
    </div>

    <!-- 
    Essential Scripts
    =====================================-->

    
    <!-- Main jQuery -->
    <script src="/plugins/jquery/jquery.js"></script>
    <script src="/my_js/contact.js"></script>
    <!-- Bootstrap 4.3.1 -->
    <script src="/plugins/bootstrap/js/popper.js"></script>
    <script src="/plugins/bootstrap/js/bootstrap.min.js"></script>
   <!--  Magnific Popup-->
    <script src="/plugins/magnific-popup/dist/jquery.magnific-popup.min.js"></script>
    <!-- Slick Slider -->
    <script src="/plugins/slick-carousel/slick/slick.min.js"></script>
    <!-- Counterup -->
    <script src="/plugins/counterup/jquery.waypoints.min.js"></script>
    <script src="/plugins/counterup/jquery.counterup.min.js"></script>

    <!-- Google Map -->
    <script src="/plugins/google-map/map.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAkeLMlsiwzp6b3Gnaxd86lvakimwGA6UA&callback=initMap"></script>    
    
    <script src="/my_js/script.js"></script>

    @livewireScripts
        
    @stack('scripts')

  </body>
  </html>
   