<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        

        <h2 class="text-center font-bold color-maincolor text-2xl md:text-3xl mb-7 mb:md-10r">Најава</h2>

        <x-validation-errors class="my-4" />


            @if (session('message'))
                <div class="mt-4 font-medium text-sm text-green-600">
                    {{ session('message') }}
                </div>
            @endif

            @if (session('error'))
                <div class="mt-4 font-medium text-sm text-red-600">
                    {{ session('error') }}
                </div>
            @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-label for="email" value="E-маил" class="mb-1 text-sm font-semibold !leading-tight block" />
                <x-input id="email" class="font-medium text-sm sm:text-base text-colormain placeholder:text-gray-500 min-h-[46px] sm:min-h-[50px] py-2 px-2.5 bg-white transition-all rounded-md border-gray-300 border-solid border focus:!border-colormain focus:!ring-colormain w-full" type="email" name="email" placeholder="Вашиот е-маил" :value="old('email')" autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="Лозинка"  class="mb-1 text-sm font-semibold !leading-tight block" />
                <x-input id="password" class="font-medium text-sm sm:text-base text-colormain placeholder:text-gray-500 min-h-[46px] sm:min-h-[50px] py-2 px-2.5 bg-white transition-all rounded-md border-gray-300 border-solid border focus:!border-colormain focus:!ring-colormain w-full" type="password" name="password" placeholder="Вашата лозинка" autocomplete="current-password" />
            </div>

            <div class="flex flex-row flex-wrap items-start justify-between -mx-2 mt-2">
                <div class="px-2 py-1">
                    <label for="remember_me" class="flex items-center">
                        <x-checkbox id="remember_me" name="remember" />
                        <span class="ml-2 text-sm text-colormain font-medium">Запамти ме</span>
                    </label>
                </div>
                <div class="px-2 py-1">
                    @if (Route::has('password.request'))
                        <a class="underline underline-offset-2 font-medium text-sm transition-all hover:text-blue-800" href="{{ route('password.request') }}">
                            Заборавена лозинка?
                        </a>
                    @endif
                </div>
            </div>

            

            <div class="block mt-7 md:mt-10 text-center">
                <x-button class="w-[240px] max-w-full">
                    Најави се
                </x-button>
            </div>
            
            <div class="block mt-5">
                @if (Route::has('register'))
                    <p class="text-center font-medium text-sm mb-0">Немате креирано свој профил?<br>
                        <a class="underline underline-offset-2 text-colorred" href="{{ route('register') }}">
                            Регистрирајте се.
                        </a>
                    </p>
                @endif
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
