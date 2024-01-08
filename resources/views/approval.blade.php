<x-guest-layout>

    <x-authentication-card>

        <h2 class="text-center font-bold color-maincolor text-2xl md:text-3xl mb-7 mb:md-10r">Одобрување / Верификација</h2>
        <p class="text-base text-gray-600 mb-7 md:mb-9">Почитувани<br>Вашиот профил чека на одобрување од страна на нашите администратори. После успешно одобрување, ќе добиете е-емаил за потврда.</p>
        <div class="flex flex-row flex-wrap -mx-3 items-center">
            <div class="px-3 py-1.5">
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf

                    <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 ml-2">
                        Одјавете се
                    </button>
                </form>
            </div>
            <div class="px-3 py-1.5">
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf

                    <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 ml-2">
                        Одјавете се
                    </button>
                </form>
            </div>

            <div class="px-3 py-1.5">
                <a href="{{ route('index') }}" class="font-bold text-lg md:text-xl text-white min-h-[42px] lg:min-h-[52px] py-2 lg:py-3 px-5 bg-colormain transition-all hover:bg-colormain/80 rounded-md inline-block">Почетна страна</a>
            </div>
        </div>


    </x-authentication-card>
</x-guest-layout>