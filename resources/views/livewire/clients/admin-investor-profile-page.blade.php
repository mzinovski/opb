{{-- profila info --}}
<x-form-section submit="updateProfileInformation">
    <x-slot name="title">
        Профил
    </x-slot>

    <x-slot name="description">
        Информации за клиентот/инвеститорот
    </x-slot>

    <x-slot name="form">
        <!-- Profile Photo -->
        <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">
            <!-- Profile Photo File Input -->
            <x-label for="photo" value="Слика" />
            <!-- Current Profile Photo -->
            <div class="mt-2" x-show="! photoPreview">
                <img src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}" class="rounded-full h-20 w-20 object-cover">
            </div>
        </div>
       
        <div class="col-span-3 sm:col-span-4">
            <x-label for="name" value="Име" />
            <x-input id="name" type="text" class="mt-1 block w-full" value="{{ $user->name }}" disabled/>
        </div>

        <div class="col-span-3 sm:col-span-4">
            <x-label for="surname" value="Презиме" />
            <x-input id="surname" type="text" class="mt-1 block w-full" value="{{ $user->surname }}" disabled/>
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-label for="email" value="Епошта" />
            <x-input id="email" type="email" class="mt-1 block w-full"  value="{{ $user->email }}" disabled/>
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-label for="address" value="Адреса" />
            <x-input id="address" type="text" class="mt-1 block w-full"  value="{{ $user->address }}" disabled/>
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-label for="phone" value="Телефон" />
            +3897<x-input id="phone" type="text" class="mt-1 block w-full"  value="{{ $user->phone }}" disabled/>
        </div>
    </x-slot>

</x-form-section>

{{-- payment info --}}
<x-form-section submit="updateProfileInformation">
    <x-slot name="title">
        Информации за наплата
    </x-slot>

    <x-slot name="description">
        Инфо за плаќање на клиентот/инвеститорот
    </x-slot>

    <x-slot name="form">
       
        <div class="col-span-3 sm:col-span-4">
            <x-label for="id_card_number" value="Број на лична карта" />
            <x-input id="id_card_number" type="text" class="mt-1 block w-full" value="{{ $user->id_card_number }}" disabled/>
        </div>

        <div class="col-span-3 sm:col-span-4">
            <x-label for="embg" value="ЕМБГ" />
            <x-input id="embg" type="text" class="mt-1 block w-full" value="{{ $user->embg }}" disabled/>
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-label for="bank_account" value="Трансакциска сметка" />
            <x-input id="bank_account" type="text" class="mt-1 block w-full"  value="{{ $user->bank_account }}" disabled/>
        </div>

        <div class="col-span-3 sm:col-span-4">
            <!-- Profile Photo File Input -->
            <x-label for="photo" value="Преден дел од идентификационен документ" />
            <!-- Current Profile Photo -->
            <div class="mt-2">
                <a class="spotlight" href="{{route('file_storage_serve', ['params' => 'images', 'file' => $user->id_card_picture_front])}}"
                    data-src-800="{{route('file_storage_serve', ['params' => 'images', 'file' => $user->id_card_picture_front])}}"
                    data-src-1200="{{route('file_storage_serve', ['params' => 'images', 'file' => $user->id_card_picture_front])}}"
                    data-src-2400="{{route('file_storage_serve', ['params' => 'images', 'file' => $user->id_card_picture_front])}}"
                    data-src-3800="{{route('file_storage_serve', ['params' => 'images', 'file' => $user->id_card_picture_front])}}">
                    <img src="{{route('file_storage_serve', ['params' => 'images', 'file' => $user->id_card_picture_front])}}">
                </a>
            </div>
        </div>

        <div class="col-span-3 sm:col-span-4">
            <!-- Profile Photo File Input -->
            <x-label for="photo" value="Заден дел од идентификационен документ" />
            <!-- Current Profile Photo -->
            <div class="mt-2">
                <a class="spotlight" href="{{route('file_storage_serve', ['params' => 'images', 'file' => $user->id_card_picture_back])}}"
                    data-src-800="{{route('file_storage_serve', ['params' => 'images', 'file' => $user->id_card_picture_back])}}"
                    data-src-1200="{{route('file_storage_serve', ['params' => 'images', 'file' => $user->id_card_picture_back])}}"
                    data-src-2400="{{route('file_storage_serve', ['params' => 'images', 'file' => $user->id_card_picture_back])}}"
                    data-src-3800="{{route('file_storage_serve', ['params' => 'images', 'file' => $user->id_card_picture_back])}}">
                    <img src="{{route('file_storage_serve', ['params' => 'images', 'file' => $user->id_card_picture_back])}}">
                </a>
            </div>
        </div>

    </x-slot>

</x-form-section>

{{-- projects info --}}
<x-form-section submit="updateProfileInformation">
    <x-slot name="title">
        Платени инвестиции
    </x-slot>

    <x-slot name="description">
        Информации за платени инвестици
    </x-slot>

    <x-slot name="form">
        <table class="min-w-full">
            <thead class="border-b bg-blue-500 text-white">
                <tr>
                    <th scope="col" class="text-sm sm:text-base px-2 py-2 text-left text-3.5 font-semibold">
                        Проект
                    </th>
                    
                    <th scope="col" class="text-sm sm:text-base px-2 py-2 text-left text-3.5 font-semibold">
                        Влог
                    </th>
                    <th scope="col" class="text-sm sm:text-base px-2 py-2 text-left text-3.5 font-semibold">
                        Почеток на градба
                    </th>

                    <th scope="col" class="text-sm sm:text-base px-2 py-2 text-left text-3.5 font-semibold">
                        Завршување на проектот
                    </th>

                    <th scope="col" class="text-sm sm:text-base px-2 py-2 text-left text-3.5 font-semibold">
                        Вкупна заработка
                    </th>

                    <th scope="col" class="text-sm sm:text-base px-2 py-2 text-left text-3.5 font-semibold">
                        Профит
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($user->payedInvestments() as $investor_user)
                    <tr class="border-b">
                        <td class="text-sm md:text-base text-neutral-800 font-normal text-4 px-2 py-2 whitespace-nowrap align-middle">{!! Str::words($investor_user->project->name, 5, '... ') !!}</td>
                         <td class="text-sm md:text-base text-neutral-800 font-normal text-4 px-2 py-2 whitespace-nowrap align-middle">
                            @if($investor_user->currencyValue == null) 
                                €
                            @else
                                @if($investor_user->currencyValue == 'eur')
                                    €
                                @endif
                                @if($investor_user->currencyValue == 'mkd')
                                    МКД
                                @endif 
                            @endif
                            {{ $investor_user->rangeValue }}
                        </td>
                        <td class="text-sm md:text-base text-neutral-800 font-normal text-4 px-2 py-2 whitespace-nowrap align-middle">{{ $investor_user->project->start_date }}</td>
                        <td class="text-sm md:text-base text-neutral-800 font-normal text-4 px-2 py-2 whitespace-nowrap align-middle">{{ $investor_user->project->end_date }}</td>
                        <td class="text-sm md:text-base text-neutral-800 font-normal text-4 px-2 py-2 whitespace-nowrap align-middle">{{ number_format($investor_user->investor_procenton, 2, '.', ',') }}%</td>
                        <td class="text-sm md:text-base text-neutral-800 font-normal text-4 px-2 py-2 whitespace-nowrap align-middle">
                            @if($investor_user->currencyValue == null) 
                                €
                            @else
                                @if($investor_user->currencyValue == 'eur')
                                    €
                                @endif
                                @if($investor_user->currencyValue == 'mkd')
                                    МКД
                                @endif 
                            @endif
                            {{ number_format($investor_user->profit, 2, '.', ',') }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </x-slot>

</x-form-section>

{{-- potpisani neplateni --}}
<x-form-section submit="updateProfileInformation">
    <x-slot name="title">
        Неуплатени инвестиции
    </x-slot>

    <x-slot name="description">
        Потпишани неуплатени инвестици
    </x-slot>

    <x-slot name="form">
        <table class="min-w-full">
            <thead class="border-b bg-blue-500 text-white">
                <tr>
                    <th scope="col" class="text-sm sm:text-base px-2 py-2 text-left text-3.5 font-semibold">
                        Проект
                    </th>
                    
                    <th scope="col" class="text-sm sm:text-base px-2 py-2 text-left text-3.5 font-semibold">
                        Влог
                    </th>
                    <th scope="col" class="text-sm sm:text-base px-2 py-2 text-left text-3.5 font-semibold">
                        Почеток на градба
                    </th>

                    <th scope="col" class="text-sm sm:text-base px-2 py-2 text-left text-3.5 font-semibold">
                        Завршување на проектот
                    </th>

                    <th scope="col" class="text-sm sm:text-base px-2 py-2 text-left text-3.5 font-semibold">
                        Вкупна заработка
                    </th>

                    <th scope="col" class="text-sm sm:text-base px-2 py-2 text-left text-3.5 font-semibold">
                        Профит
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($user->signedInvestments() as $investor_userr)
                    <tr class="border-b">
                        <td class="text-sm md:text-base text-neutral-800 font-normal text-4 px-2 py-2 whitespace-nowrap align-middle">{!! Str::words($investor_userr->project->name, 5, '... ') !!}</td>
                         <td class="text-sm md:text-base text-neutral-800 font-normal text-4 px-2 py-2 whitespace-nowrap align-middle">
                            @if($investor_userr->currencyValue == null) 
                                €
                            @else
                                @if($investor_userr->currencyValue == 'eur')
                                    €
                                @endif
                                @if($investor_userr->currencyValue == 'mkd')
                                    МКД
                                @endif 
                            @endif
                            {{ $investor_userr->rangeValue }}
                        </td>
                        <td class="text-sm md:text-base text-neutral-800 font-normal text-4 px-2 py-2 whitespace-nowrap align-middle">{{ $investor_userr->project->start_date }}</td>
                        <td class="text-sm md:text-base text-neutral-800 font-normal text-4 px-2 py-2 whitespace-nowrap align-middle">{{ $investor_userr->project->end_date }}</td>
                        <td class="text-sm md:text-base text-neutral-800 font-normal text-4 px-2 py-2 whitespace-nowrap align-middle">{{ number_format($investor_userr->investor_procenton, 2, '.', ',') }}%</td>
                        <td class="text-sm md:text-base text-neutral-800 font-normal text-4 px-2 py-2 whitespace-nowrap align-middle">
                            @if($investor_userr->currencyValue == null) 
                                €
                            @else
                                @if($investor_userr->currencyValue == 'eur')
                                    €
                                @endif
                                @if($investor_userr->currencyValue == 'mkd')
                                    МКД
                                @endif 
                            @endif
                            {{ number_format($investor_userr->profit, 2, '.', ',') }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </x-slot>
</x-form-section>
    {{--  --}}
