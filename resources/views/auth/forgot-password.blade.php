<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <h2 class="text-left font-bold color-maincolor text-2xl md:text-3xl mb-2">Заборавена лозинка?</h2>
        <div class="mb-6 mb:mb-8 text-sm text-gray-500">
            Ве молиме внесете го вашиот e-маил со кој сте регистрирани
        </div>

        

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="block">
                <x-label for="email" value="E-маил" class="mb-1 text-sm font-semibold !leading-tight block" />
                <x-input id="email" class="font-medium text-sm sm:text-base text-colormain placeholder:text-gray-500 min-h-[46px] sm:min-h-[50px] py-2 px-2.5 bg-white transition-all rounded-md border-gray-300 border-solid border focus:!border-colormain focus:!ring-colormain w-full" placeholder="Вашиот е-маил" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            @if (session('status'))
                <div class="mt-4 font-medium text-sm text-green-600">
                    {{ session('status') }}
                </div>
            @endif

            <x-validation-errors class="mt-4" />

            <div class="flex items-center justify-end mt-4">
                <x-button class="w-full">
                    Ресетирај лозинка
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
