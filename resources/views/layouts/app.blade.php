<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="icon" href="{{ Vite::asset('resources/images/logos/favicon.ico')}}" type="image/ico" />

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://rawcdn.githack.com/nextapps-de/spotlight/0.7.8/dist/css/spotlight.min.css">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/scss/theme-styles.scss', 'resources/js/app.js'])

        <style>
            [x-cloak] {
                display: none;
            }
        </style>

        <!-- Styles -->
        @livewireStyles
    </head>
    <body x-data="{ active:false, @if(Route::is('chat'))bodyclass:true @else bodyclass:false @endif , isactive:false, togglemenu:false, notificationtoggle:false, open:false}" x-bind:class="{'mainmenu-collapsed' : bodyclass, 'togglemenu':togglemenu, 'notificationtoggle':notificationtoggle}" class="group/maincollapse group/togglemenu font-sans antialiased bg-white">

        <livewire:modal />

        <div class="fixed top-0 left-0 z-[1050] w-screen h-screen bg-black/50 hidden"></div>

        <x-banner />

        <x-header-main />

        <x-sidebar />

        {{ $slot }}

        @stack('modals')

        @livewireScripts
        @stack('scripts')

        <!-- Required popper.js -->
        <script src="https://unpkg.com/@popperjs/core@2.9.1/dist/umd/popper.min.js" charset="utf-8"></script>
        <script src="https://rawcdn.githack.com/nextapps-de/spotlight/0.7.8/dist/js/spotlight.min.js"></script>
        <script type="text/javascript">
       
        </script>
    </body>
</html>
