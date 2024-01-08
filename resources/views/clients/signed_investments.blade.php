<x-app-layout>
    <section class="pl-0 lg:pl-[250px] pt-[50px] sm:pt-[60px] md:pt-[78px] relative h-screen overflow-y-auto z-30 lg:group-[&.mainmenu-collapsed]/maincollapse:pl-[80px] transition-all duration-300">
        <div class="p-5 lg:p-6">
            <div class="flex flex-row shrink items-center justify-between mb-3">
                <div>
                    <h2 class="text-2xl md:text-3xl font-bold mb-2">
                        Потпишани инвестиции
                    </h2>
                </div>
            </div>

            <livewire:clients.started-investments :is_signed="1">

        </div>
    </section>
</x-app-layout>