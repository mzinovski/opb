<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="{{ Vite::asset('resources/images/logos/favicon.ico')}}" type="image/ico" />
        <!-- Font awesome font -->
        <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css"> -->
        <!-- main fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap" rel="stylesheet">
        
      

        @vite(['resources/css/app.css', 'resources/scss/theme-styles.scss', 'resources/js/app.js'])

        <style>
            [x-cloak] {
                display: none;  
            }
        </style>

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


        
    </head>
    <body id="body" class="!bg-white text-lg md:text-xl !leading-[160%] group/togglemenu scroll-smooth"  x-data="{togglemenu:false, active: false, atTop: false, toTop: false}" x-bind:class="{'overflow-hidden' : togglemenu}">
      

        @include('landing.partials.header')
        
        @yield('content')
    
        @include('landing.partials.footer')

        @livewireScripts
        
        @stack('scripts')
        <script type="module">
          
        </script>
    </body>
</html>
