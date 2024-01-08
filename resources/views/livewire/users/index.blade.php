<div class="w-full">

    <div class="flex flex-col sm:flex-row items-start sm:items-center justify-start sm:justify-between mb-2">
        <div class="mb-2 sm:mb-0">
            <div class="w-auto relative">
                <img src="{{ Vite::asset('resources/images/icon-search.svg')}}" class="w-[20px] h-[20px] absolute left-3 top-1/2 -translate-y-1/2 z-10 inline-block">
                <input type="text"  id="search" name="" placeholder="Пребарувај..." wire:model.debounce.500ms="search" class="rounded-md w-full p-1 min-h-[40px] pl-[42px] border-solid border-gray-300 text-gray-800 placeholder-gray-500 focus:border-gray-400 ring-0 focus:ring-0">
                <div wire:loading class="absolute left-[105%] top-1/2 -translate-y-1/2">
                    Се процесира...
                </div>
            </div>
        </div>
        <div>
            <div class="flex flex-row -mx-2 items-center">
                <div class="px-2 order-last sm:order-first"><label for="per_page_selected" class="text-sm text-gray-500">Резултати</label></div>
                <div class="px-2 order-first sm:order-last">
                    <select id="per_page_selected" wire:model="per_page_selected" class="rounded-md w-20 p-2 min-h-[40px] border-solid border-gray-300 text-gray-800 placeholder-gray-500 focus:border-gray-400 ring-0 focus:ring-0">
                        @foreach ($per_page as $per)
                        <option value="{{ $per }}">{{ $per }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>



    <div class="w-fill overflow-x-auto mb-3 min-h-[calc(100vh_-_280px)]">
        <table class="min-w-full">
            <thead class="border-b bg-blue-500 text-white">
                <tr>
                    <th scope="col" class="text-sm sm:text-base px-2 py-2 text-left text-3.5 font-semibold">&nbsp;</th>
                    <th scope="col" class="text-sm sm:text-base px-2 py-2 text-center text-3.5 font-semibold">
                        ID 
                        <span class="cursor-pointer inline-block align-middle ml-1 -mt-0.5" wire:click="order_by('id')">
                            <svg class="fill-white" width="21" height="12" viewBox="0 0 21 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M5.29019 3.71C5.38315 3.80373 5.49375 3.87812 5.61561 3.92889C5.73747 3.97966 5.86817 4.0058 6.00019 4.0058C6.1322 4.0058 6.2629 3.97966 6.38476 3.92889C6.50662 3.87812 6.61722 3.80373 6.71019 3.71C6.80391 3.61704 6.87831 3.50644 6.92908 3.38458C6.97985 3.26272 7.00598 3.13201 7.00598 3C7.00598 2.86799 6.97985 2.73728 6.92908 2.61542C6.87831 2.49356 6.80391 2.38296 6.71019 2.29L4.71019 0.29C4.61508 0.198959 4.50294 0.127594 4.38019 0.0799999C4.13672 -0.0200181 3.86365 -0.0200181 3.62019 0.0799999C3.49743 0.127594 3.38529 0.198959 3.29019 0.29L1.29019 2.29C1.10188 2.4783 0.996094 2.7337 0.996094 3C0.996094 3.2663 1.10188 3.5217 1.29019 3.71C1.47849 3.8983 1.73388 4.00409 2.00019 4.00409C2.26649 4.00409 2.52188 3.8983 2.71019 3.71L3.00019 3.41V8.59L2.71019 8.29C2.52188 8.1017 2.26649 7.99591 2.00019 7.99591C1.73388 7.99591 1.47849 8.1017 1.29019 8.29C1.10188 8.4783 0.996094 8.7337 0.996094 9C0.996094 9.2663 1.10188 9.5217 1.29019 9.71L3.29019 11.71C3.38529 11.801 3.49743 11.8724 3.62019 11.92C3.73989 11.9729 3.86931 12.0002 4.00019 12.0002C4.13106 12.0002 4.26049 11.9729 4.38019 11.92C4.50294 11.8724 4.61508 11.801 4.71019 11.71L6.71019 9.71C6.80342 9.61676 6.87738 9.50607 6.92785 9.38425C6.97831 9.26243 7.00428 9.13186 7.00428 9C7.00428 8.86814 6.97831 8.73757 6.92785 8.61575C6.87738 8.49393 6.80342 8.38324 6.71019 8.29C6.61695 8.19676 6.50626 8.1228 6.38443 8.07234C6.26261 8.02188 6.13204 7.99591 6.00019 7.99591C5.86833 7.99591 5.73776 8.02188 5.61594 8.07234C5.49411 8.1228 5.38342 8.19676 5.29019 8.29L5.00019 8.59V3.41L5.29019 3.71ZM10.0002 2H20.0002C20.2654 2 20.5198 1.89464 20.7073 1.70711C20.8948 1.51957 21.0002 1.26522 21.0002 1C21.0002 0.734784 20.8948 0.48043 20.7073 0.292893C20.5198 0.105357 20.2654 0 20.0002 0H10.0002C9.73497 0 9.48061 0.105357 9.29308 0.292893C9.10554 0.48043 9.00019 0.734784 9.00019 1C9.00019 1.26522 9.10554 1.51957 9.29308 1.70711C9.48061 1.89464 9.73497 2 10.0002 2ZM20.0002 5H10.0002C9.73497 5 9.48061 5.10536 9.29308 5.29289C9.10554 5.48043 9.00019 5.73478 9.00019 6C9.00019 6.26522 9.10554 6.51957 9.29308 6.70711C9.48061 6.89464 9.73497 7 10.0002 7H20.0002C20.2654 7 20.5198 6.89464 20.7073 6.70711C20.8948 6.51957 21.0002 6.26522 21.0002 6C21.0002 5.73478 20.8948 5.48043 20.7073 5.29289C20.5198 5.10536 20.2654 5 20.0002 5ZM20.0002 10H10.0002C9.73497 10 9.48061 10.1054 9.29308 10.2929C9.10554 10.4804 9.00019 10.7348 9.00019 11C9.00019 11.2652 9.10554 11.5196 9.29308 11.7071C9.48061 11.8946 9.73497 12 10.0002 12H20.0002C20.2654 12 20.5198 11.8946 20.7073 11.7071C20.8948 11.5196 21.0002 11.2652 21.0002 11C21.0002 10.7348 20.8948 10.4804 20.7073 10.2929C20.5198 10.1054 20.2654 10 20.0002 10Z"/>
                            </svg>
                        </span>
                    </th>
                    <th scope="col" class="text-sm sm:text-base px-2 py-2 text-left text-3.5 font-semibold">
                        Име
                        <span class="cursor-pointer inline-block align-middle ml-1 -mt-0.5" wire:click="order_by('name')">
                            <svg class="fill-white" width="21" height="12" viewBox="0 0 21 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M5.29019 3.71C5.38315 3.80373 5.49375 3.87812 5.61561 3.92889C5.73747 3.97966 5.86817 4.0058 6.00019 4.0058C6.1322 4.0058 6.2629 3.97966 6.38476 3.92889C6.50662 3.87812 6.61722 3.80373 6.71019 3.71C6.80391 3.61704 6.87831 3.50644 6.92908 3.38458C6.97985 3.26272 7.00598 3.13201 7.00598 3C7.00598 2.86799 6.97985 2.73728 6.92908 2.61542C6.87831 2.49356 6.80391 2.38296 6.71019 2.29L4.71019 0.29C4.61508 0.198959 4.50294 0.127594 4.38019 0.0799999C4.13672 -0.0200181 3.86365 -0.0200181 3.62019 0.0799999C3.49743 0.127594 3.38529 0.198959 3.29019 0.29L1.29019 2.29C1.10188 2.4783 0.996094 2.7337 0.996094 3C0.996094 3.2663 1.10188 3.5217 1.29019 3.71C1.47849 3.8983 1.73388 4.00409 2.00019 4.00409C2.26649 4.00409 2.52188 3.8983 2.71019 3.71L3.00019 3.41V8.59L2.71019 8.29C2.52188 8.1017 2.26649 7.99591 2.00019 7.99591C1.73388 7.99591 1.47849 8.1017 1.29019 8.29C1.10188 8.4783 0.996094 8.7337 0.996094 9C0.996094 9.2663 1.10188 9.5217 1.29019 9.71L3.29019 11.71C3.38529 11.801 3.49743 11.8724 3.62019 11.92C3.73989 11.9729 3.86931 12.0002 4.00019 12.0002C4.13106 12.0002 4.26049 11.9729 4.38019 11.92C4.50294 11.8724 4.61508 11.801 4.71019 11.71L6.71019 9.71C6.80342 9.61676 6.87738 9.50607 6.92785 9.38425C6.97831 9.26243 7.00428 9.13186 7.00428 9C7.00428 8.86814 6.97831 8.73757 6.92785 8.61575C6.87738 8.49393 6.80342 8.38324 6.71019 8.29C6.61695 8.19676 6.50626 8.1228 6.38443 8.07234C6.26261 8.02188 6.13204 7.99591 6.00019 7.99591C5.86833 7.99591 5.73776 8.02188 5.61594 8.07234C5.49411 8.1228 5.38342 8.19676 5.29019 8.29L5.00019 8.59V3.41L5.29019 3.71ZM10.0002 2H20.0002C20.2654 2 20.5198 1.89464 20.7073 1.70711C20.8948 1.51957 21.0002 1.26522 21.0002 1C21.0002 0.734784 20.8948 0.48043 20.7073 0.292893C20.5198 0.105357 20.2654 0 20.0002 0H10.0002C9.73497 0 9.48061 0.105357 9.29308 0.292893C9.10554 0.48043 9.00019 0.734784 9.00019 1C9.00019 1.26522 9.10554 1.51957 9.29308 1.70711C9.48061 1.89464 9.73497 2 10.0002 2ZM20.0002 5H10.0002C9.73497 5 9.48061 5.10536 9.29308 5.29289C9.10554 5.48043 9.00019 5.73478 9.00019 6C9.00019 6.26522 9.10554 6.51957 9.29308 6.70711C9.48061 6.89464 9.73497 7 10.0002 7H20.0002C20.2654 7 20.5198 6.89464 20.7073 6.70711C20.8948 6.51957 21.0002 6.26522 21.0002 6C21.0002 5.73478 20.8948 5.48043 20.7073 5.29289C20.5198 5.10536 20.2654 5 20.0002 5ZM20.0002 10H10.0002C9.73497 10 9.48061 10.1054 9.29308 10.2929C9.10554 10.4804 9.00019 10.7348 9.00019 11C9.00019 11.2652 9.10554 11.5196 9.29308 11.7071C9.48061 11.8946 9.73497 12 10.0002 12H20.0002C20.2654 12 20.5198 11.8946 20.7073 11.7071C20.8948 11.5196 21.0002 11.2652 21.0002 11C21.0002 10.7348 20.8948 10.4804 20.7073 10.2929C20.5198 10.1054 20.2654 10 20.0002 10Z"/>
                            </svg>
                        </span>
                    </th>
                    <th scope="col" class="text-sm sm:text-base px-2 py-2 text-left text-3.5 font-semibold">
                        Епошта
                        <span class="cursor-pointer inline-block align-middle ml-1 -mt-0.5" wire:click="order_by('email')">
                            <svg class="fill-white" width="21" height="12" viewBox="0 0 21 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M5.29019 3.71C5.38315 3.80373 5.49375 3.87812 5.61561 3.92889C5.73747 3.97966 5.86817 4.0058 6.00019 4.0058C6.1322 4.0058 6.2629 3.97966 6.38476 3.92889C6.50662 3.87812 6.61722 3.80373 6.71019 3.71C6.80391 3.61704 6.87831 3.50644 6.92908 3.38458C6.97985 3.26272 7.00598 3.13201 7.00598 3C7.00598 2.86799 6.97985 2.73728 6.92908 2.61542C6.87831 2.49356 6.80391 2.38296 6.71019 2.29L4.71019 0.29C4.61508 0.198959 4.50294 0.127594 4.38019 0.0799999C4.13672 -0.0200181 3.86365 -0.0200181 3.62019 0.0799999C3.49743 0.127594 3.38529 0.198959 3.29019 0.29L1.29019 2.29C1.10188 2.4783 0.996094 2.7337 0.996094 3C0.996094 3.2663 1.10188 3.5217 1.29019 3.71C1.47849 3.8983 1.73388 4.00409 2.00019 4.00409C2.26649 4.00409 2.52188 3.8983 2.71019 3.71L3.00019 3.41V8.59L2.71019 8.29C2.52188 8.1017 2.26649 7.99591 2.00019 7.99591C1.73388 7.99591 1.47849 8.1017 1.29019 8.29C1.10188 8.4783 0.996094 8.7337 0.996094 9C0.996094 9.2663 1.10188 9.5217 1.29019 9.71L3.29019 11.71C3.38529 11.801 3.49743 11.8724 3.62019 11.92C3.73989 11.9729 3.86931 12.0002 4.00019 12.0002C4.13106 12.0002 4.26049 11.9729 4.38019 11.92C4.50294 11.8724 4.61508 11.801 4.71019 11.71L6.71019 9.71C6.80342 9.61676 6.87738 9.50607 6.92785 9.38425C6.97831 9.26243 7.00428 9.13186 7.00428 9C7.00428 8.86814 6.97831 8.73757 6.92785 8.61575C6.87738 8.49393 6.80342 8.38324 6.71019 8.29C6.61695 8.19676 6.50626 8.1228 6.38443 8.07234C6.26261 8.02188 6.13204 7.99591 6.00019 7.99591C5.86833 7.99591 5.73776 8.02188 5.61594 8.07234C5.49411 8.1228 5.38342 8.19676 5.29019 8.29L5.00019 8.59V3.41L5.29019 3.71ZM10.0002 2H20.0002C20.2654 2 20.5198 1.89464 20.7073 1.70711C20.8948 1.51957 21.0002 1.26522 21.0002 1C21.0002 0.734784 20.8948 0.48043 20.7073 0.292893C20.5198 0.105357 20.2654 0 20.0002 0H10.0002C9.73497 0 9.48061 0.105357 9.29308 0.292893C9.10554 0.48043 9.00019 0.734784 9.00019 1C9.00019 1.26522 9.10554 1.51957 9.29308 1.70711C9.48061 1.89464 9.73497 2 10.0002 2ZM20.0002 5H10.0002C9.73497 5 9.48061 5.10536 9.29308 5.29289C9.10554 5.48043 9.00019 5.73478 9.00019 6C9.00019 6.26522 9.10554 6.51957 9.29308 6.70711C9.48061 6.89464 9.73497 7 10.0002 7H20.0002C20.2654 7 20.5198 6.89464 20.7073 6.70711C20.8948 6.51957 21.0002 6.26522 21.0002 6C21.0002 5.73478 20.8948 5.48043 20.7073 5.29289C20.5198 5.10536 20.2654 5 20.0002 5ZM20.0002 10H10.0002C9.73497 10 9.48061 10.1054 9.29308 10.2929C9.10554 10.4804 9.00019 10.7348 9.00019 11C9.00019 11.2652 9.10554 11.5196 9.29308 11.7071C9.48061 11.8946 9.73497 12 10.0002 12H20.0002C20.2654 12 20.5198 11.8946 20.7073 11.7071C20.8948 11.5196 21.0002 11.2652 21.0002 11C21.0002 10.7348 20.8948 10.4804 20.7073 10.2929C20.5198 10.1054 20.2654 10 20.0002 10Z"/>
                            </svg>
                        </span>
                    </th>
                    <th scope="col" class="text-sm sm:text-base px-2 py-2 text-center text-3.5 font-semibold">Улога</th>
                    <th scope="col" class="text-sm sm:text-base px-2 py-2 text-center text-3.5 font-semibold">Опции</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr class="border-b">
                    <td class="px-2 py-2 whitespace-nowrap text-sm font-medium text-gray-900 align-middle text-center">
                        <div class="inline-block rounded-full w-9 h-9">
                            @if($user->profile_photo_path)
                                <img src="{{ asset("storage/" . $user->profile_photo_path) }}" alt="" class="object-fit object-center w-full h-full rounded-full">
                            @else 
                                <img src="{{ $user->profile_photo_url }}" alt="" class="object-fit object-center w-full h-full rounded-full">
                            @endif
                        </div>
                    </td>
                    <td class="text-sm md:text-base text-neutral-800 font-normal text-4 px-2 py-2 whitespace-nowrap align-middle text-center">{{ $user->id }}</td>
                    <td class="text-sm md:text-base text-neutral-800 font-medium text-4 px-2 py-2 whitespace-nowrap align-middle">{{ $user->name }}</td>
                    <td class="text-sm md:text-base text-neutral-800 font-normal text-4 px-2 py-2 whitespace-nowrap align-middle">{{ $user->email }}</td>
                    <td class="text-sm md:text-base text-neutral-800 font-normal text-4 px-2 py-2 whitespace-nowrap align-middle text-center">{{ ucfirst($user->getRoleNames()->implode(', ')) }}</td>
                    <td class="text-sm text-neutral-800 font-normal text-4 px-2 py-2 whitespace-nowrap text-center align-middle">
                        <div class="w-auto inline-block relative z-10" x-data="{open:false, active:false}" x-bind:class="{'z-[60]' : active}">
                            <a href="#" class="group block relative text-center bg-transparent rounded-md w-[24px] h-[24px] text-blue-500 text-base leading-tight hover:bg-gray-200 [&amp;.active]:bg-gray-200 transition ease-in-out duration-200" x-on:click="open = !open, active = !active" x-bind:class="{'active' : active}" @click.away="active = false">
                                <span class="absolute left-1/2 -translate-x-1/2 top-1/2 -translate-y-1/2 transition ease-in-out duration-300 z-10">
                                    <svg width="4" height="14" viewBox="0 0 4 14" fill="none" xmlns="http://www.w3.org/2000/svg" class="fill-blue-500">
                                        <path d="M0.666992 1.66659C0.666992 1.40288 0.745191 1.14509 0.891699 0.925825C1.03821 0.70656 1.24645 0.535663 1.49008 0.434746C1.73372 0.33383 2.0018 0.307425 2.26045 0.358872C2.51909 0.410319 2.75666 0.537307 2.94313 0.723777C3.1296 0.910247 3.25659 1.14782 3.30804 1.40647C3.35949 1.66511 3.33308 1.9332 3.23217 2.17683C3.13125 2.42047 2.96035 2.6287 2.74109 2.77521C2.52182 2.92172 2.26403 2.99992 2.00033 2.99992C1.6467 2.99992 1.30757 2.85944 1.05752 2.60939C0.807468 2.35935 0.666992 2.02021 0.666992 1.66659ZM2.00033 8.33325C2.26403 8.33325 2.52182 8.25505 2.74109 8.10854C2.96035 7.96204 3.13125 7.7538 3.23217 7.51016C3.33308 7.26653 3.35949 6.99844 3.30804 6.7398C3.25659 6.48116 3.1296 6.24358 2.94313 6.05711C2.75666 5.87064 2.51909 5.74365 2.26045 5.6922C2.0018 5.64076 1.73372 5.66716 1.49008 5.76808C1.24645 5.869 1.03821 6.03989 0.891699 6.25916C0.745191 6.47842 0.666992 6.73621 0.666992 6.99992C0.666992 7.35354 0.807468 7.69268 1.05752 7.94273C1.30757 8.19278 1.6467 8.33325 2.00033 8.33325ZM2.00033 13.6666C2.26403 13.6666 2.52182 13.5884 2.74109 13.4419C2.96035 13.2954 3.13125 13.0871 3.23217 12.8435C3.33308 12.5999 3.35949 12.3318 3.30804 12.0731C3.25659 11.8145 3.1296 11.5769 2.94313 11.3904C2.75666 11.204 2.51909 11.077 2.26045 11.0255C2.0018 10.9741 1.73372 11.0005 1.49008 11.1014C1.24645 11.2023 1.03821 11.3732 0.891699 11.5925C0.745191 11.8118 0.666992 12.0695 0.666992 12.3333C0.666992 12.6869 0.807468 13.026 1.05752 13.2761C1.30757 13.5261 1.6467 13.6666 2.00033 13.6666Z" fill="#6B7280"></path>
                                    </svg>
                                </span>
                            </a>
                            <div x-show="open" x-transition:enter="transition ease-out duration-100 bg-white" x-transition:enter-start="transform -translate-y-6 opacity-0" x-transition:enter-end="transform translate-y-0 opacity-100" x-transition:leave="transition ease-in duration-100 bg-transparent" x-transition:leave-start="transform translate-y-0 opacity-100" x-transition:leave-end="transform -translate-y-6 opacity-0" @click.away="open = false" class="absolute @if(count($users) >= 5 && $loop->iteration >= count($users) - 2) bottom-full @else top-full @endif right-0 bg-white shadow-lg min-w-full w-[110px] rounded-lg p-2" style="display: none;">
                               
                                <ul class="mb-0">
                                    <li class="pb-1">
                                        <a href="{{ route('user.show', $user) }}" class="text-sm text-gray-500 py-1 px-2 block text-left bg-transparent font-normal transition-all duration-300 rounded-md hover:bg-blue-50 hover:text-blue-500 hover:font-bold">Отвори</a>
                                    </li>
                                    <li class="pb-1">
                                        <a href="{{ route('user.edit', $user) }}" class="text-sm text-gray-500 py-1 px-2 block text-left bg-transparent font-normal transition-all duration-300 rounded-md hover:bg-blue-50 hover:text-blue-500 hover:font-bold">Едитирај корисник</a>
                                    </li>
                                    <li class="pb-0">
                                        <a href="" wire:click.prevent="delete_user({{ $user }})" class="text-sm text-gray-500 py-1 px-2 block text-left bg-transparent font-normal transition-all duration-300 rounded-md hover:bg-blue-50 hover:text-blue-500 hover:font-bold">Избриши корисник</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
       
    </div>
    <div>{{ $users->onEachSide(2)->links('custom-pagination-links-view') }}</div>
</div>