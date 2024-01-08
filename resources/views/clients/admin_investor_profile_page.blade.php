<x-app-layout>

    <section class="pl-0 lg:pl-[250px] pt-[50px] sm:pt-[60px] md:pt-[78px] relative h-screen overflow-y-auto z-30 lg:group-[&.mainmenu-collapsed]/maincollapse:pl-[80px] transition-all duration-300">
        <div class="p-5 lg:p-6">
            <x-slot name="header">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Профил
                </h2>
            </x-slot>

            <div>
                <div class="max-w-7xl">
                    @livewire('clients.admin-investor-profile-page', ['user' => $user])

                    <x-section-border />
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
