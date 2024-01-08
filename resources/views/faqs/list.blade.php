<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @if ($settings->global_keywords != null)
        <meta name="keywords" content="{{ $settings->global_keywords }}">
        @endif
        @if ($settings->global_description != null)
        <meta name="description" content="{{ $settings->global_description }}">
        @endif
        <meta name="author" content="{{ $settings->global_author }}">
        <meta property="og:title" content="{{ config('app.name', 'Laravel') . ' FAQs' }}">
        @if ($settings->global_description != null)
        <meta property="og:description" content="{{ $settings->global_description }}">
        @endif
        @if ($settings->image != null)
        <meta property="og:image" content="{{ $settings->image }}">
        @endif
        <meta property="og:url" content="{{ url()->full() }}">
        <meta name="twitter:card" content="summary_large_image">

        <title>{{ config('app.name', 'Laravel') . ' FAQs' }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
    </head>
    <body class="antialiased">
        <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
            <div class="max-w-7xl mx-auto p-6 lg:p-8">
                <div class="mt-16">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8">
                        @foreach ($faqs as $faq)
                            <div>
                                <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">{{ $faq->question }}</h2>
                                <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                                    {!! $faq->answer !!}
                                </p>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="flex justify-center mt-16 px-0 sm:items-center sm:justify-between">
                    <div class="text-center text-sm text-gray-500 dark:text-gray-400 sm:text-left">
                        <div class="flex items-center gap-4">
                            <a href="https://github.com/sponsors/taylorotwell" class="group inline-flex items-center hover:text-gray-700 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="-mt-px mr-1 w-5 h-5 stroke-gray-400 dark:stroke-gray-600 group-hover:stroke-gray-600 dark:group-hover:stroke-gray-400">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                                </svg>
                                Sponsor
                            </a>
                        </div>
                    </div>

                    <div class="ml-4 text-center text-sm text-gray-500 dark:text-gray-400 sm:text-right sm:ml-0">
                        Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
