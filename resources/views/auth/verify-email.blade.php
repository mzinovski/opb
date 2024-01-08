<x-guest-layout>
    <x-authentication-card>

        <h2 class="text-center font-bold color-maincolor text-2xl md:text-3xl mb-7 mb:md-10r">Потврда на е-маил</h2>

        <p class="mb-4 text-xs text-gray-600">
            Почитувани,<br> пристигнат Ви е е-емаил на адресата која предходно е внесена. Ве молиме кликнете на копчето <strong>ПОТВРДИ</strong> за да ја потврдите Вашата е-маил адреса, а со тоа и Вашата регистрација. Ви благодариме.
        </p>

        <p class="mb-4 text-xs text-gray-600 font-semibold">
            Доколку Веќе сте направиле потврда, Ве молиме освежете ја страницата за да продолжите кој Вашиот профил.
        </p>

        @if (session('status') == 'verification-link-sent')
            <div class="mt-4 font-medium text-sm text-green-600">
                Нов е-маил за верификација е пратен на вашата е-маил адреса.
            </div>
        @endif

        <div class="mt-4">
            <p class="font-medium text-sm mb-2">Не Ви пристигна е-емаил?</p>
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf

                <div>
                    <x-button type="submit">
                        Препрати е-маил
                    </x-button>
                </div>
            </form>
        </div>

        <div class="mt-8">
            

            {{--<div>
                <a href="{{ route('profile.show') }}" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Изменете профил</a>
            </div>--}}

            <div>
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf

                    <button type="submit" class="text-red-500 underline underline-offset-4">
                        Одјавете се
                    </button>
                </form>
            </div>
        </div>
    </x-authentication-card>
</x-guest-layout>
