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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Icon Font Css -->
    <link rel="stylesheet" href="/plugins/themify/css/themify-icons.css">
    <link rel="stylesheet" href="/plugins/fontawesome/css/all.css">
    <link rel="stylesheet" href="/plugins/magnific-popup/dist/magnific-popup.css">
 
    @livewireStyles
    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="/my_css/style.css">
    <link rel="stylesheet" href="/my_css/aos.css">

    <style type="text/css">
        .box-white {
    width: 100%;
    position: relative;
    padding: 3.500rem 3.000rem;
    padding-bottom: 7.000rem;
    /*background-color: #FFF;*/
    -moz-box-shadow: 7px 7px 4px rgba(3, 149, 65, 0.3);
    -webkit-box-shadow: 7px 7px 4px rgba(3, 149, 65, 0.3);
    box-shadow: 7px 7px 4px rgba(3, 149, 65, 0.3);
    height: 100%;
    color: #039541;
}

.btn-selected {
    background-color: rgba(3, 149, 65, 0.55)!important;
    color: white;
}

.box-white .update-color {
    color: #039541;
    font-weight: 700;
}

.update-color {
    color: #039541;
    font-weight: 700;
}

.box-white .description {
    color: #4D4D4D;
}

.description {
    color: #4D4D4D;
}

.box-white .text {
    display: block;
    height: 9.3rem;
    overflow: hidden;
    position: relative;
}

.box-white .bottom {
    position: absolute;

    bottom: 0;

    width: 100%;
    padding: 3.500rem 3.000rem;
}

.box-white.resources {
    padding: 3.5rem 3rem 2.5rem 3rem;
}

.box-white.resources .text {
    width: 100%;
    display: block;
    height: 85px;
    overflow: hidden;
}

.box-white.resources .text-update {
    width: 100%;
    display: block;
    height: 89px !important;
    overflow: hidden;
}


.box-white.resources .image-box {
    width: 100%;
    display: block;
    padding-top: 60%;
    position: relative;
    border: 1px solid #0085C9;
}

.box-white.resources .bottom {
    /*position: relative;
    bottom: auto;
    left: auto;
    right: auto;
    text-align: left;
    width: 100%;
    padding: 0;
    padding-top: 2rem;*/
    padding: 2.5rem 3rem;
    padding-top: 0;
}
.box-white.resources .update-center{
    display: block;
    padding: 0;
    /*text-align: center;*/
    margin-top: 2.5rem;
}
.box-white.resources .image-box .preview {
    position: absolute;
    left: 0;
    bottom: 0;
    right: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-repeat: no-repeat;
    background-position: center center;
    -webkit-background-size: cover;
       -moz-background-size: cover;
         -o-background-size: cover;
            background-size: cover;
    background-color: #039541;
}

@media (max-width: 1300px) {
    
    .box-white .text {
        height: 6.5rem;
    }
    
}

@media (max-width: 1199.98px) {
    .box-white {
        padding-left: 2rem;
        padding-right: 2rem;
    }
    
    .box-white .bottom {
        padding: 2.5rem 2rem;
    }
    .box-white .text {
        height: 7.5rem;
    }
    

    .blog-single-banner-new {
        height: 18rem;
    }

}

@media (max-width: 991.98px) {
    .box-white.resources .text {
        height: 60px;
    }

}

@media (max-width: 767px) {
    .box-white.resources .text {
        height: auto;
        overflow: visible;
    }
    .box-white.resources .bottom {
        position: relative;
        bottom: auto;
        left: auto;
    }
    .box-white.resources {
        padding: 2.5rem 2rem;
    }
    .box-white.resources .bottom {
        padding: 0;
        margin-top: 30px;
    }
    
    .box-white .bottom {
        padding: 0;
        position: relative;
        left: auto;
        bottom: auto;
    }
    .box-white .text {
        height: auto;
        margin-bottom: 1.5rem;
    }
    .box-white {
        padding: 2.5rem 2rem;
    }
    
}

@media (max-width: 575.98px) {
    .box-white {
        padding: 2.500rem 2.000rem;
    }
    .box-white .text {
        height: auto;
    }
    .box-white .bottom {
        padding: 0;
        position: relative;
        bottom: auto;
        left: auto;
    }
}
    </style>

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
    
    <script src="/my_js/script.js"></script>
    <script src="/my_js/aos.js"></script>

    <script>
      AOS.init();
    </script>

    @livewireScripts
        
    @stack('scripts')

  </body>
  </html>
   