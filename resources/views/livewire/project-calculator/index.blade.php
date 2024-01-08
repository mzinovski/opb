<div class="w-full px-5 md:px-8 lg:px-10 xl:px-[60px] py-5 md:py-8 lg:py-10 xl:py-[60px] shadow-[0px_4px_24px_0px_rgba(0,0,0,0.15)] rounded-lg">
    <div class="flex flex-row flex-wrap items-start justify-start -mx-5">
        <!-- TEST -->
        @if(isset($selected_project))
            <!-- Steps for investing -->

            @if($invest_step == null || $invest_step == 1)
                <!-- stepper -->
                <div class="w-full px-5 py-5 mb-4">
                    <div class="flex items-center max-w-screen-lg mx-auto">
                      <div class="flex items-center w-full">
                        <div class="w-8 h-8 shrink-0 mx-[-1px] bg-colormain p-1.5 flex items-center justify-center rounded-full">
                          <span class="text-base text-white font-bold">1</span>
                        </div>
                        <div class="w-full h-1 mx-4 rounded-lg bg-gray-300"></div>
                      </div>
                      <div class="flex items-center w-full">
                        <div class="w-8 h-8 shrink-0 mx-[-1px] bg-gray-300 p-1.5 flex items-center justify-center rounded-full">
                          <span class="text-base text-white font-bold">2</span>
                        </div>
                        <div class="w-full h-1 mx-4 rounded-lg bg-gray-300"></div>
                      </div>
                      <div class="flex items-center w-full">
                        <div class="w-8 h-8 shrink-0 mx-[-1px] bg-gray-300 p-1.5 flex items-center justify-center rounded-full">
                          <span class="text-base text-white font-bold">3</span>
                        </div>
                        <div class="w-full h-1 mx-4 rounded-lg bg-gray-300"></div>
                      </div>
                      <div class="flex items-center">
                        <div class="w-8 h-8 shrink-0 mx-[-1px] bg-gray-300 p-1.5 flex items-center justify-center rounded-full">
                          <span class="text-base text-white font-bold">4</span>
                        </div>
                      </div>
                    </div>
                </div>
                <!--  -->


                <div class="w-full lg:w-1/2 px-5 py-5 lg:py-0">
                    <h2 class="block w-[490px] text-left max-w-full text-2xl md:text-[32px] leading-snug mb-7 md:mb-8 font-bold">Калкулатор за инвестиции</h2>
                    <form class="mb-0 text-left">
                        <div class="mb-4">
                            <label class="mb-2 font-bold text-base md:text-lg !leading-tight block">Проект за инвестицијта</label>
                            <select wire:model="selectProjectValue" class="font-normal text-lg md:text-xl text-colormain placeholder:text-gray-500 min-h-[52px] py-2 px-4 bg-white transition-all rounded-md border-gray-300 border-solid border focus:border-colormain w-[360px] max-w-full">
                                <option selected value="{{ $selected_project ->id }}">{{ $selected_project ->name }}</option>
                            </select>
                        </div>

                        <div class="block lg:hidden mb-10" {{ $is_hidden }}>
                            <div class="w-full h-[280px] md:h-[330px] rounded-lg mb-6 shadow-lg">
                                <img src="{{ $picture }}" class="object-cover object-center w-full h-full rounded-lg" alt="{{ $name }}">
                            </div>

                            <p class="text-xl md:text-2xl font-bold mb-2">{{ $name }}</p>

                            <p class="text-base font-normal text-neutral-500">{!! $description !!}</p>

                            <div class="w-full h-px bg-[#EBEEF4] my-4"></div>

                            <div class="flex flex-col min-[400px]:flex-row justify-between items-start min-[400px]:items-center mb-1">
                                <div class="text-base md:text-lg font-normal text-neutral-500">Почеток на проектот:</div>
                                <div class="text-base md:text-lg font-bold shrink">{{ $start_date }}</div>
                            </div>

                            <div class="flex flex-col min-[400px]:flex-row justify-between items-start min-[400px]:items-center mb-1">
                                <div class="text-base md:text-lg font-normal text-neutral-500">Завршување на проектот:</div>
                                <div class="text-base md:text-lg font-bold shrink">{{ $end_date }}</div>
                            </div>

                            <div class="flex flex-col min-[400px]:flex-row justify-between items-start min-[400px]:items-center">
                                <div class="text-base md:text-lg font-normal text-neutral-500">Рок на изградба: </div>
                                <div class="text-base md:text-lg font-bold shrink">{{ $return_of_investment }} месеци</div>
                            </div>
                        </div>

                        <div class="mb-4" >
                            <label class="mb-2 font-bold text-base md:text-lg !leading-tight block">Датум на вашето инвестирање</label>

                            <input id="investDate" autocomplete="off" wire:model="investDate" x-data="{minDate:@entangle('min_date_for_investing'), maxDate:@entangle('max_date_for_investing')}"
                                    x-init="$watch('minDate', (value) => instance.set('minDate', minDate)); $watch('maxDate', (value) => instance.set('maxDate', maxDate));  instance = flatpickr($refs.input, {enableTime: false, dateFormat: 'd/m/Y', minDate:minDate, maxDate:maxDate});"
                            class="font-normal text-lg md:text-xl text-colormain placeholder:text-gray-500 min-h-[52px] py-2 px-4 bg-white transition-all rounded-md border-gray-300 border-solid border focus:border-colormain w-[360px] max-w-full"
                            x-ref="input" type="text" placeholder="Date available to begin work"/>
                        </div>

                        <div class="w-full h-px bg-[#EBEEF4] my-4"></div>

                        <div class="mb-4">
                            <label class="mb-2 font-bold text-base md:text-lg !leading-tight block">Селектирај валута за пресметка</label>
                            <select wire:model="currencyValue" class="font-medium text-baseaw md:text-lg text-colormain placeholder:text-gray-500 min-h-[40px] py-1 px-4 pr-[30px] bg-[#EBEEF4] transition-all rounded-xl border-[#EBEEF4] border-solid border focus:border-[#EBEEF4] w-auto" >
                                <option value="eur" selected>EUR</option>
                                <option value="mkd">MKD</option>
                            </select>
                        </div>

                        <p class="mb-4 text-sm text-red-500">*All projected values are before any property costs and platform fees, and based on a 5-year holding period. We expect the asset value to grow 30% over the next 5 years.</p>

                        <div class="w-full h-px bg-[#EBEEF4] my-4"></div>

                        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-4">
                            <div class="text-base md:text-lg font-medium pb-1 sm:pb-0">Инвестиција</div>
                            <div class="text-base md:text-lg font-medium">
                                <div class="flex flex-row justify-between items-center">
                                    <span class="font-bold text-base md:text-lg pr-2">{!! $curency_symbol !!}</span>
                                    <input type="text" class="font-bold text-base md:text-lg text-colormain placeholder:text-gray-500 min-h-[37px] py-1 px-2 bg-transparent transition-all rounded-md border-gray-300 border-solid border focus:border-colormain w-[100px] max-w-full investment_slider_value" value="{{ $avg_slider_value }}" wire:model="rangeValue">
                                </div>
                            </div>
                        </div>

                        <div class="mb-0">
                            <label for="investment_range" class="block mb-0 text-sm font-medium text-gray-900">Повлечи или внеси рачно</label>
                            <input id="investment_range" type="range" value="{{ $avg_slider_value }}" min="{{ $min_investment_opportunity }}" max="{{ $investment_opportunity }}" class="w-full h-3 bg-[#EBEEF4] rounded-lg appearance-none cursor-pointer range-lg investment_range" wire:model="rangeValue">
                        </div>

                        <div class="flex flex-row justify-between items-center">
                            <div class="text-base md:text-lg font-normal">{!! $curency_symbol !!}{{ $min_investment_opportunity }}</div>
                            <div class="text-base md:text-lg font-normal">{!! $curency_symbol !!}{{ $investment_opportunity }} </div>
                        </div>

                        <div class="w-full h-px bg-[#EBEEF4] my-4"></div>

                        <div class="flex flex-col min-[400px]:flex-row justify-between items-start min-[400px]:items-center mb-2">
                            <div class="text-base md:text-lg font-normal">Вкупна заработка во проценти</div>
                            <div class="text-base md:text-lg font-bold shrink">{{ number_format($investor_procenton, 2, '.', ',') }}%</div>
                        </div>

                        @php
                            $early_invest_procenton = floatval($early_invest_procenton);
                        @endphp
                        @if($early_invest_procenton > 0)
                            <div class="flex flex-col min-[400px]:flex-row justify-between items-start min-[400px]:items-center mb-2">
                                <div class="text-base md:text-lg font-normal">Дополнителна заработка во проценти</div>
                                <div class="text-base md:text-lg font-bold shrink">{{ number_format($early_invest_procenton, 2, '.', ',') }}%</div>
                            </div>
                        @endif

                        <div class="flex flex-col min-[400px]:flex-row justify-between items-start min-[400px]:items-center">
                            <div class="text-base md:text-lg font-normal">Вкупна заработка во парична вредност </div>
                            <div class="text-base md:text-lg font-bold shrink">{!! $curency_symbol !!}{{ number_format($profit, 2, '.', ',') }}</div>
                        </div>
                    </form>

                    <p class="mb-0 text-right pt-10 lg:pt-14 pb-5 md:pb-0 lg:hidden">
                        <a href="#" wire:click="goToStepTwo" class="font-bold text-lg md:text-xl text-white min-h-[42px] lg:min-h-[52px] py-2 lg:py-3 px-5 bg-coloryellow transition-all hover:bg-coloryellow/80 rounded-md inline-block">Следно</a>
                    </p>

                </div>
                <div class="w-full lg:w-1/2 px-5 py-5 lg:py-0 text-left hidden lg:block" {{ $is_hidden }}>
                    <div class="w-full h-[280px] md:h-[330px] rounded-lg mb-6 shadow-lg">
                        <img src="{{ $picture }}" class="object-cover object-center w-full h-full rounded-lg" alt="{{ $name }}">
                    </div>

                    <p class="text-xl md:text-2xl font-bold mb-2">{{ $name }}</p>

                    <p class="text-base font-normal text-neutral-500">{!! $description !!}</p>

                    <div class="w-full h-px bg-[#EBEEF4] my-4"></div>

                    <div class="flex flex-row justify-between items-center mb-1">
                        <div class="text-base md:text-lg font-normal text-neutral-500">Почеток на проектот:</div>
                        <div class="text-base md:text-lg font-bold shrink">{{ $start_date }}</div>
                    </div>

                    <div class="flex flex-row justify-between items-center mb-1">
                        <div class="text-base md:text-lg font-normal text-neutral-500">Завршување на проектот:</div>
                        <div class="text-base md:text-lg font-bold shrink">{{ $end_date }}</div>
                    </div>

                    <div class="flex flex-row justify-between items-center">
                        <div class="text-base md:text-lg font-normal text-neutral-500">Рок на изградба: </div>
                        <div class="text-base md:text-lg font-bold shrink">{{ $return_of_investment }} месеци</div>
                    </div>

                    <p class="mb-0 text-right pt-10 lg:pt-14 pb-5 md:pb-0">
                        <a href="#" wire:click="goToStepTwo" class="font-bold text-lg md:text-xl text-white min-h-[42px] lg:min-h-[52px] py-2 lg:py-3 px-5 bg-coloryellow transition-all hover:bg-coloryellow/80 rounded-md inline-block">Следно</a>
                    </p>
                </div>  
            @endif

            @if($invest_step == 2)
                <!-- stepper -->
                <div class="w-full px-5 py-5 mb-4">
                    <div class="flex items-center max-w-screen-lg mx-auto">
                      <div class="flex items-center w-full">
                        <div class="w-8 h-8 shrink-0 mx-[-1px] bg-coloryellow p-1.5 flex items-center justify-center rounded-full">
                          <span class="text-base text-white font-bold">1</span>
                        </div>
                        <div class="w-full h-1 mx-4 rounded-lg bg-coloryellow"></div>
                      </div>
                      <div class="flex items-center w-full">
                        <div class="w-8 h-8 shrink-0 mx-[-1px] bg-colormain p-1.5 flex items-center justify-center rounded-full">
                          <span class="text-base text-white font-bold">2</span>
                        </div>
                        <div class="w-full h-1 mx-4 rounded-lg bg-gray-300"></div>
                      </div>
                      <div class="flex items-center w-full">
                        <div class="w-8 h-8 shrink-0 mx-[-1px] bg-gray-300 p-1.5 flex items-center justify-center rounded-full">
                          <span class="text-base text-white font-bold">3</span>
                        </div>
                        <div class="w-full h-1 mx-4 rounded-lg bg-gray-300"></div>
                      </div>
                      <div class="flex items-center">
                        <div class="w-8 h-8 shrink-0 mx-[-1px] bg-gray-300 p-1.5 flex items-center justify-center rounded-full">
                          <span class="text-base text-white font-bold">4</span>
                        </div>
                      </div>
                    </div>
                </div>
                <!--  -->

                <div class="w-full lg:w-1/2 px-5 py-5 lg:py-0">
                    <h2 class="block w-[490px] text-left max-w-full text-2xl md:text-[32px] leading-snug mb-7 md:mb-8 font-bold">Потврда на инвестиција</h2>
                    <form class="mb-0 text-left">
                        <div class="mb-4">
                            <!-- <label class="mb-2 font-bold text-base md:text-lg !leading-tight block">Проект за инвестицијта</label>
                            <select wire:model="selectProjectValue" class="font-normal text-lg md:text-xl text-colormain placeholder:text-gray-500 min-h-[52px] py-2 px-4 bg-white transition-all rounded-md border-gray-300 border-solid border focus:border-colormain w-[360px] max-w-full">
                                <option selected value="{{ $selected_project ->id }}">{{ $selected_project ->name }}</option>
                            </select> -->
                            <p class="mb-2 font-bold text-base md:text-lg !leading-tight block">Проект за инвестицијта: {{ $selected_project ->name }}</p>
                        </div>

                        <div class="block lg:hidden mb-10">
                            <div class="w-full h-[280px] md:h-[330px] rounded-lg mb-6 shadow-lg">
                                <img src="{{ $picture }}" class="object-cover object-center w-full h-full rounded-lg" alt="{{ $name }}">
                            </div>

                            <p class="text-xl md:text-2xl font-bold mb-2">{{ $name }}</p>

                            <p class="text-base font-normal text-neutral-500">{!! $description !!}</p>

                            <div class="w-full h-px bg-[#EBEEF4] my-4"></div>

                            <div class="flex flex-col min-[400px]:flex-row justify-between items-start min-[400px]:items-center mb-1">
                                <div class="text-base md:text-lg font-normal text-neutral-500">Почеток на проектот:</div>
                                <div class="text-base md:text-lg font-bold shrink">{{ $start_date }}</div>
                            </div>

                            <div class="flex flex-col min-[400px]:flex-row justify-between items-start min-[400px]:items-center mb-1">
                                <div class="text-base md:text-lg font-normal text-neutral-500">Завршување на проектот:</div>
                                <div class="text-base md:text-lg font-bold shrink">{{ $end_date }}</div>
                            </div>

                            <div class="flex flex-col min-[400px]:flex-row justify-between items-start min-[400px]:items-center">
                                <div class="text-base md:text-lg font-normal text-neutral-500">Рок на изградба: </div>
                                <div class="text-base md:text-lg font-bold shrink">{{ $return_of_investment }} месеци</div>
                            </div>
                        </div>

                        <div class="mb-4" >
                            <label class="mb-2 font-bold text-base md:text-lg !leading-tight block">Датум на вашето инвестирање: {{ $investDate }}</label>
                        </div>

                        <div class="w-full h-px bg-[#EBEEF4] my-4"></div>

                        <div class="mb-4">
                            <label class="mb-2 font-bold text-base md:text-lg !leading-tight block">Валута: {{ $curency_symbol }}</label>
            
                        </div>

                        <div class="w-full h-px bg-[#EBEEF4] my-4"></div>

                        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-4">
                            <div class="text-base md:text-lg font-medium pb-1 sm:pb-0">Инвестиција</div>
                            <div class="text-base md:text-lg font-medium">
                                <div class="flex flex-row justify-between items-center">
                                    <span class="font-bold text-base md:text-lg pr-2">{!! $curency_symbol !!} {{ $rangeValue }}</span>
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-row justify-between items-center">
                            <div class="text-base md:text-lg font-normal">Максимална можност за инвестирање:</div>
                            <div class="text-base md:text-lg font-normal">{!! $curency_symbol !!}{{ $investment_opportunity }} </div>
                        </div>

                        <div class="w-full h-px bg-[#EBEEF4] my-4"></div>

                        <div class="flex flex-col min-[400px]:flex-row justify-between items-start min-[400px]:items-center mb-2">
                            <div class="text-base md:text-lg font-normal">Вкупна заработка во проценти</div>
                            <div class="text-base md:text-lg font-bold shrink">{{ number_format($investor_procenton, 2, '.', ',') }}%</div>
                        </div>

                        @php
                            $early_invest_procenton = floatval($early_invest_procenton);
                        @endphp
                        @if($early_invest_procenton > 0)
                            <div class="flex flex-col min-[400px]:flex-row justify-between items-start min-[400px]:items-center mb-2">
                                <div class="text-base md:text-lg font-normal">Дополнителна заработка во проценти</div>
                                <div class="text-base md:text-lg font-bold shrink">{{ number_format($early_invest_procenton, 2, '.', ',') }}%</div>
                            </div>
                        @endif

                        <div class="flex flex-col min-[400px]:flex-row justify-between items-start min-[400px]:items-center">
                            <div class="text-base md:text-lg font-normal">Вкупна заработка во парична вредност </div>
                            <div class="text-base md:text-lg font-bold shrink">{!! $curency_symbol !!}{{ number_format($profit, 2, '.', ',') }}</div>
                        </div>
                    </form>

                    <p class="mb-0 text-left pt-10 lg:pt-14 pb-5 md:pb-0">
                        <a href="#" wire:click="goBackToStepOne" class="font-bold text-lg md:text-xl text-white min-h-[42px] lg:min-h-[52px] py-2 lg:py-3 px-5 bg-coloryellow transition-all hover:bg-coloryellow/80 rounded-md inline-block">Претходно</a>
                    </p>

                    <p class="mb-0 text-left pt-10 lg:pt-14 pb-5 md:pb-0 lg:hidden">
                        <a href="#" wire:click="goToStepThree" class="font-bold text-lg md:text-xl text-white min-h-[42px] lg:min-h-[52px] py-2 lg:py-3 px-5 bg-coloryellow transition-all hover:bg-coloryellow/80 rounded-md inline-block">Следно</a>
                    </p>

                </div>
                <div class="w-full lg:w-1/2 px-5 py-5 lg:py-0 text-left hidden lg:block">
                    <div class="w-full h-[280px] md:h-[330px] rounded-lg mb-6 shadow-lg">
                        <img src="{{ $picture }}" class="object-cover object-center w-full h-full rounded-lg" alt="{{ $name }}">
                    </div>

                    <p class="text-xl md:text-2xl font-bold mb-2">{{ $name }}</p>

                    <p class="text-base font-normal text-neutral-500">{!! $description !!}</p>

                    <div class="w-full h-px bg-[#EBEEF4] my-4"></div>

                    <div class="flex flex-row justify-between items-center mb-1">
                        <div class="text-base md:text-lg font-normal text-neutral-500">Почеток на проектот:</div>
                        <div class="text-base md:text-lg font-bold shrink">{{ $start_date }}</div>
                    </div>

                    <div class="flex flex-row justify-between items-center mb-1">
                        <div class="text-base md:text-lg font-normal text-neutral-500">Завршување на проектот:</div>
                        <div class="text-base md:text-lg font-bold shrink">{{ $end_date }}</div>
                    </div>

                    <div class="flex flex-row justify-between items-center">
                        <div class="text-base md:text-lg font-normal text-neutral-500">Рок на изградба: </div>
                        <div class="text-base md:text-lg font-bold shrink">{{ $return_of_investment }} месеци</div>
                    </div>

                    <p class="mb-0 text-right pt-10 lg:pt-14 pb-5 md:pb-0">
                        <a href="#" wire:click="goToStepThree" class="font-bold text-lg md:text-xl text-white min-h-[42px] lg:min-h-[52px] py-2 lg:py-3 px-5 bg-coloryellow transition-all hover:bg-coloryellow/80 rounded-md inline-block">Следно</a>
                    </p>
                </div>
            @endif

            @if($invest_step == 3)
                <!-- stepper -->
                <div class="w-full px-5 py-5 mb-4">
                    <div class="flex items-center max-w-screen-lg mx-auto">
                      <div class="flex items-center w-full">
                        <div class="w-8 h-8 shrink-0 mx-[-1px] bg-coloryellow p-1.5 flex items-center justify-center rounded-full">
                          <span class="text-base text-white font-bold">1</span>
                        </div>
                        <div class="w-full h-1 mx-4 rounded-lg bg-coloryellow"></div>
                      </div>
                      <div class="flex items-center w-full">
                        <div class="w-8 h-8 shrink-0 mx-[-1px] bg-coloryellow p-1.5 flex items-center justify-center rounded-full">
                          <span class="text-base text-white font-bold">2</span>
                        </div>
                        <div class="w-full h-1 mx-4 rounded-lg bg-coloryellow"></div>
                      </div>
                      <div class="flex items-center w-full">
                        <div class="w-8 h-8 shrink-0 mx-[-1px] bg-colormain p-1.5 flex items-center justify-center rounded-full">
                          <span class="text-base text-white font-bold">3</span>
                        </div>
                        <div class="w-full h-1 mx-4 rounded-lg bg-gray-300"></div>
                      </div>
                      <div class="flex items-center">
                        <div class="w-8 h-8 shrink-0 mx-[-1px] bg-gray-300 p-1.5 flex items-center justify-center rounded-full">
                          <span class="text-base text-white font-bold">4</span>
                        </div>
                      </div>
                    </div>
                </div>
                <!--  -->

                <div class="w-full lg:w-1/2 px-5 py-5 lg:py-0">
                    <h2 class="block w-[490px] text-left max-w-full text-2xl md:text-[32px] leading-snug mb-7 md:mb-8 font-bold">Договор за инвестиција</h2>
                    <form class="mb-0 text-left">
                        <div class="mb-4">
                            <p class="mb-2 font-bold text-base md:text-lg !leading-tight block">Проект за инвестицијта: {{ $selected_project ->name }}</p>
                        </div>

                        <div class="mb-4" >
                            <label class="mb-2 font-bold text-base md:text-lg !leading-tight block">Датум на вашето инвестирање: {{ $investDate }}</label>
                        </div>

                        <div class="w-full h-px bg-[#EBEEF4] my-4"></div>

                        <div class="mb-4">
                            <label class="mb-2 font-bold text-base md:text-lg !leading-tight block">Валута: {{ $curency_symbol }}</label>
            
                        </div>

                        <div class="w-full h-px bg-[#EBEEF4] my-4"></div>

                        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-4">
                            <div class="text-base md:text-lg font-medium pb-1 sm:pb-0">Инвестиција</div>
                            <div class="text-base md:text-lg font-medium">
                                <div class="flex flex-row justify-between items-center">
                                    <span class="font-bold text-base md:text-lg pr-2">{!! $curency_symbol !!} {{ $rangeValue }}</span>
                                </div>
                            </div>
                        </div>

                        <div class="w-full h-px bg-[#EBEEF4] my-4"></div>

                        <div class="flex flex-col min-[400px]:flex-row justify-between items-start min-[400px]:items-center mb-2">
                            <div class="text-base md:text-lg font-normal">Вкупна заработка во проценти</div>
                            <div class="text-base md:text-lg font-bold shrink">{{ number_format($investor_procenton, 2, '.', ',') }}%</div>
                        </div>

                        @php
                            $early_invest_procenton = floatval($early_invest_procenton);
                        @endphp
                        @if($early_invest_procenton > 0)
                            <div class="flex flex-col min-[400px]:flex-row justify-between items-start min-[400px]:items-center mb-2">
                                <div class="text-base md:text-lg font-normal">Дополнителна заработка во проценти</div>
                                <div class="text-base md:text-lg font-bold shrink">{{ number_format($early_invest_procenton, 2, '.', ',') }}%</div>
                            </div>
                        @endif

                        <div class="flex flex-col min-[400px]:flex-row justify-between items-start min-[400px]:items-center">
                            <div class="text-base md:text-lg font-normal">Вкупна заработка во парична вредност </div>
                            <div class="text-base md:text-lg font-bold shrink">{!! $curency_symbol !!}{{ number_format($profit, 2, '.', ',') }}</div>
                        </div>
                    </form>

                    <div {{ $agreement_hidden }}>
                        <div class="w-full">
                            <p class="text-xl md:text-2xl font-bold mb-2 lg:hidden">
                                <iframe src="{{ route('file_storage_contract_pdf', ['params' => auth()->user()->id, 'file' => $contract_name]) }}" style="width:300px; height:300px;" frameborder="0"></iframe>
                            </p>

                            <p class="text-xl md:text-2xl font-bold mb-2 lg:hidden">
                                <button wire:click="signSMS" wire:loading.attr="disabled" class="w-full font-bold text-lg md:text-xl text-white min-h-[42px] lg:min-h-[52px] py-2 lg:py-3 px-5 bg-colormain transition-all hover:bg-colormain/80  rounded-md inline-block">Потпиши договор</button>
                            </p>
                        </div>
                        
                    </div>

                    <!-- SMS code form -->
                    <div {{ $otp_code_hidden }}>
                        <div class="h-screen px-3 lg:hidden">
                            <div class="container mx-auto">
                                <div class="max-w-sm mx-auto md:max-w-lg">
                                    <div class="w-full">
                                        <div class="bg-white h-64 py-3 rounded text-center">
                                            <h1 class="text-2xl font-bold">Код за потпис</h1>
                                            <div class="flex flex-col mt-4">
                                                <span>Внесете го кодот кој е пратен на бројот</span>
                                                <span class="font-bold">+389 7****{{ $last_three_phone_digits }}</span>
                                            </div>
                                                <div id="otp" class="flex flex-row justify-center text-center px-2 mt-5">
                                                    <input wire:model="first" autocomplete="off" value="{{ $first }}" class="m-2 border h-10 w-10 text-center form-control rounded sms_number_inputs" type="number" id="first" maxlength="1" step="1" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" /> 
                                                    <input wire:model="second" autocomplete="off" value="{{ $second }}" class="m-2 border h-10 w-10 text-center form-control rounded sms_number_inputs" type="number" id="second" maxlength="1" step="1" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" /> 
                                                    <input wire:model="third" autocomplete="off" value="{{ $third }}" class="m-2 border h-10 w-10 text-center form-control rounded sms_number_inputs" type="number" id="third" maxlength="1" step="1" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" /> 
                                                    <input wire:model="fourth" autocomplete="off" value="{{ $fourth }}" class="m-2 border h-10 w-10 text-center form-control rounded sms_number_inputs" type="number" id="fourth" maxlength="1" step="1" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" />
                                                    <input wire:model="fifth" autocomplete="off" value="{{ $fifth }}" class="m-2 border h-10 w-10 text-center form-control rounded sms_number_inputs" type="number" id="fifth" maxlength="1" step="1" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" /> 
                                                    <input wire:model="sixth" autocomplete="off" value="{{ $sixth }}" class="m-2 border h-10 w-10 text-center form-control rounded sms_number_inputs" type="number" id="sixth" maxlength="1" step="1" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" />
                                                </div> 

                                                <div class="flex flex-col mt-2">
                                                    <button wire:click="submitSMScode" class="w-full font-bold text-lg md:text-xl text-white min-h-[42px] lg:min-h-[52px] py-2 lg:py-3 px-5 bg-colormain transition-all hover:bg-colormain/80  rounded-md inline-block">Внеси</button>
                                                </div>
                                            

                                            <div class="flex flex-col mt-5">
                                                <span>Не добивте порака?</span>
                                            </div>
                                            <div class="flex justify-center text-center">
                                                <button wire:click.prevent="signSMS" wire:loading.attr="disabled" class="flex items-center text-blue-700 hover:text-blue-900 cursor-pointer">
                                                    <span class="font-bold">Препрати код</span><i class='bx bx-caret-right ml-1'></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--  -->

                    <!-- <p class="mb-0 text-left pt-10 lg:pt-14 pb-5 md:pb-0 lg:hidden">
                        <a href="#" wire:click="goToStepThree" class="font-bold text-lg md:text-xl text-white min-h-[42px] lg:min-h-[52px] py-2 lg:py-3 px-5 bg-coloryellow transition-all hover:bg-coloryellow/80 rounded-md inline-block">Следно</a>
                    </p>

                    <p class="mb-0 text-left pt-10 lg:pt-14 pb-5 md:pb-0">
                        <a href="#" wire:click="goBackToStepTwo" class="font-bold text-lg md:text-xl text-white min-h-[42px] lg:min-h-[52px] py-2 lg:py-3 px-5 bg-coloryellow transition-all hover:bg-coloryellow/80 rounded-md inline-block">Претходно</a>
                    </p> -->
                </div>
                <div class="w-full lg:w-1/2 px-5 py-5 lg:py-0 text-left hidden lg:block">
                    <div {{ $agreement_hidden }}>
                        <p class="text-xl md:text-2xl font-bold mb-2">
                            <iframe src="{{ route('file_storage_contract_pdf', ['params' => auth()->user()->id, 'file' => $contract_name]) }}" style="width:615px; height:610px;" frameborder="0"></iframe>
                        </p>

                        <p class="text-xl md:text-2xl font-bold mb-2">
                            <button wire:click.prevent="signSMS" wire:loading.attr="disabled" class="w-full font-bold text-lg md:text-xl text-white min-h-[42px] lg:min-h-[52px] py-2 lg:py-3 px-5 bg-colormain transition-all hover:bg-colormain/80  rounded-md inline-block">Потпиши договор</button>
                        </p>
                    </div>

                    <!-- SMS code form -->
                    <div class="h-screen px-3" {{ $otp_code_hidden }}>
                        <div class="container mx-auto">
                            <div class="max-w-sm mx-auto md:max-w-lg">
                                <div class="w-full">
                                    <div class="bg-white h-64 py-3 rounded text-center">
                                        <h1 class="text-2xl font-bold">Код за потпис</h1>
                                        <div class="flex flex-col mt-4">
                                            <span>Внесете го кодот кој е пратен на бројот</span>
                                            <span class="font-bold">+389 7****{{ $last_three_phone_digits }}</span>
                                        </div>
                                            <div id="otp" class="flex flex-row justify-center text-center px-2 mt-5">
                                                <input wire:model="first" autocomplete="off" value="{{ $first }}" class="m-2 border h-10 w-10 text-center form-control rounded sms_number_inputs" type="number" id="first" maxlength="1" step="1" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" /> 
                                                <input wire:model="second" autocomplete="off" value="{{ $second }}" class="m-2 border h-10 w-10 text-center form-control rounded sms_number_inputs" type="number" id="second" maxlength="1" step="1" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" /> 
                                                <input wire:model="third" autocomplete="off" value="{{ $third }}" class="m-2 border h-10 w-10 text-center form-control rounded sms_number_inputs" type="number" id="third" maxlength="1" step="1" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" /> 
                                                <input wire:model="fourth" autocomplete="off" value="{{ $fourth }}" class="m-2 border h-10 w-10 text-center form-control rounded sms_number_inputs" type="number" id="fourth" maxlength="1" step="1" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" />
                                                <input wire:model="fifth" autocomplete="off" value="{{ $fifth }}" class="m-2 border h-10 w-10 text-center form-control rounded sms_number_inputs" type="number" id="fifth" maxlength="1" step="1" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" /> 
                                                <input wire:model="sixth" autocomplete="off" value="{{ $sixth }}" class="m-2 border h-10 w-10 text-center form-control rounded sms_number_inputs" type="number" id="sixth" maxlength="1" step="1" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" />
                                            </div> 

                                            <div class="flex flex-col mt-2">
                                                <button wire:click="submitSMScode" class="w-full font-bold text-lg md:text-xl text-white min-h-[42px] lg:min-h-[52px] py-2 lg:py-3 px-5 bg-colormain transition-all hover:bg-colormain/80  rounded-md inline-block">Внеси</button>
                                            </div>
                                        

                                        <div class="flex flex-col mt-5">
                                            <span>Не добивте порака?</span>
                                        </div>
                                        <div class="flex justify-center text-center">
                                            <button wire:click.prevent="signSMS" wire:loading.attr="disabled" class="flex items-center text-blue-700 hover:text-blue-900 cursor-pointer">
                                                <span class="font-bold">Препрати код</span><i class='bx bx-caret-right ml-1'></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--  -->


                    <!-- <p class="mb-0 text-right pt-10 lg:pt-14 pb-5 md:pb-0">
                        <a href="#" wire:click="goToStepThree" class="font-bold text-lg md:text-xl text-white min-h-[42px] lg:min-h-[52px] py-2 lg:py-3 px-5 bg-coloryellow transition-all hover:bg-coloryellow/80 rounded-md inline-block">Следно</a>
                    </p> -->
                </div>
            @endif

            @if($invest_step == 4)
                <!-- stepper -->
                <div class="w-full px-5 py-5 mb-4">
                    <div class="flex items-center max-w-screen-lg mx-auto">
                      <div class="flex items-center w-full">
                        <div class="w-8 h-8 shrink-0 mx-[-1px] bg-coloryellow p-1.5 flex items-center justify-center rounded-full">
                          <span class="text-base text-white font-bold">1</span>
                        </div>
                        <div class="w-full h-1 mx-4 rounded-lg bg-coloryellow"></div>
                      </div>
                      <div class="flex items-center w-full">
                        <div class="w-8 h-8 shrink-0 mx-[-1px] bg-coloryellow p-1.5 flex items-center justify-center rounded-full">
                          <span class="text-base text-white font-bold">2</span>
                        </div>
                        <div class="w-full h-1 mx-4 rounded-lg bg-coloryellow"></div>
                      </div>
                      <div class="flex items-center w-full">
                        <div class="w-8 h-8 shrink-0 mx-[-1px] bg-coloryellow p-1.5 flex items-center justify-center rounded-full">
                          <span class="text-base text-white font-bold">3</span>
                        </div>
                        <div class="w-full h-1 mx-4 rounded-lg bg-coloryellow"></div>
                      </div>
                      <div class="flex items-center">
                        <div class="w-8 h-8 shrink-0 mx-[-1px] bg-colormain p-1.5 flex items-center justify-center rounded-full">
                          <span class="text-base text-white font-bold">4</span>
                        </div>
                      </div>
                    </div>
                </div>
                <!--  -->

                <div class="w-full">
                    <!-- HTML za uplatnica -->
                    <table style="BORDER-RIGHT: purple 1pt solid; PADDING-RIGHT: 0px; BORDER-TOP: purple 1pt solid; PADDING-LEFT: 0px; PADDING-BOTTOM: 0px; BORDER-LEFT: purple 1pt solid; WIDTH: 570px; PADDING-TOP: 0px; BORDER-BOTTOM: purple 1pt solid; HEIGHT: 311px;" cellspacing="0" cellpadding="0" width="570" align="center" border="0">
                      <tbody>
                        <tr bgcolor="#fff2ff">
                          <td width="20" height="100%">&nbsp;</td>
                          <td width="250" valign="top">
                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                              <tbody>
                                <tr height="16">
                                  <td align="left" valign="top" colspan="2">
                                    <img alt="" src="../Images/logo_za_naloziNov.jpg">
                                  </td>
                                </tr>
                                <tr height="16">
                                  <td align="right" valign="top" colspan="2">
                                    <font face="Arial" color="darkred" size="2">
                                      <b style="COLOR: #eb73ff">
                                        <span id="virmanpp30_lblNalogodavac" title="Налогодавач">Налогодавач</span>
                                      </b>
                                    </font>
                                  </td>
                                </tr>
                                <tr height="32">
                                  <td align="left" valign="top">
                                    <font face="Arial" color="Black" size="1">
                                      <span id="virmanpp30_lblSmetkaNalogodavac" title="Сметка на налогодавач">СМЕТКА НА НАЛОГОДАВАЧ</span>
                                    </font>
                                  </td>
                                  <td align="right" valign="top">
                                    <div style="position: relative; width: 162px;">
                                      <select name="virmanpp30$cmbSmetkaNalogoDavac" onchange="javascript:setTimeout('__doPostBack(\'virmanpp30$cmbSmetkaNalogoDavac\',\'\')', 0)" id="virmanpp30_cmbSmetkaNalogoDavac" tabindex="1" title="Изберете сметка на налогодавач" style="font-size: small; height: 19px; width: 162px; text-decoration: none;">
                                        <option selected="selected" value="500600017033391">500600017033391-ЗОРАН ДРАГАН БАБИНКОСТОВ</option>
                                      </select>
                                      <select size="2" style="display: none; position: absolute; top: 19px; left: 0px; width: 333px; border: 1px solid rgb(51, 51, 51); font-weight: normal; padding: 0px; background-color: rgb(255, 255, 255); text-transform: none; z-index: 3;"></select>
                                      <input type="text" style="display: none; height: 17px; position: absolute; top: 0px; left: 0px; margin: 0px; padding: 2px 0px 0px 3px; outline-style: none; border-style: solid solid none; border-color: transparent; background-color: transparent; border-left-width: 1px; border-top-width: 1px; font-size: 13px; font-stretch: 100%; font-variant: normal; font-weight: 400; color: rgb(0, 0, 0); text-align: start; text-indent: 0px; text-shadow: none; text-transform: none; width: 137px; z-index: 2;">
                                      <div style="position: absolute; top: 0px; left: 0px; width: 162px; height: 19px; background-color: rgb(255, 255, 255); opacity: 0.01; z-index: 1;"></div>
                                    </div>
                                  </td>
                                </tr>
                                <tr height="16">
                                  <td colspan="2" align="left" valign="bottom">
                                    <font face="Arial" color="Black" size="1">
                                      <span id="virmanpp30_lblNazivNalogodavac" title="Име на налогодавач">НАЗИВ НА НАЛОГОДАВАЧ</span>
                                    </font>
                                  </td>
                                </tr>
                                <tr height="16">
                                  <td align="left" valign="top" colspan="2">
                                    <input name="virmanpp30$txtNazivN1" type="text" value="ЗОРАН ДРАГАН БАБИНКОСТОВ" maxlength="250" readonly="readonly" id="virmanpp30_txtNazivN1" tabindex="2" title="Назив и адреса на налогодавач" style="color:Black;background-color:#E0E0E0;border-color:Black;border-width:1px;border-style:solid;font-size:X-Small;height:16px;width:250px;">
                                  </td>
                                </tr>
                                <tr height="16">
                                  <td align="left" valign="top" colspan="2">
                                    <input name="virmanpp30$txtNazivN2" type="text" value="УЛ. БРАНКО РАДИЧЕВИЌ БР. 9 БИТОЛА" maxlength="50" readonly="readonly" id="virmanpp30_txtNazivN2" tabindex="3" title="Назив и адреса на налогодавач" style="color:Black;background-color:#E0E0E0;border-color:Black;border-width:1px;border-style:solid;font-size:X-Small;height:16px;width:250px;">
                                  </td>
                                </tr>
                                <tr height="16">
                                  <td colspan="2" align="left" valign="bottom" height="16">
                                    <font face="Arial" color="Black" size="1">
                                      <span id="virmanpp30_lblBankaNalogodavac" title="Банка на налогодавач">БАНКА НА НАЛОГОДАВАЧ</span>
                                    </font>
                                  </td>
                                </tr>
                                <tr height="16">
                                  <td align="left" valign="bottom" colspan="2">
                                    <input name="virmanpp30$txtBankaN" type="text" value="Стопанска Банка А.Д. Битола" maxlength="50" readonly="readonly" id="virmanpp30_txtBankaN" tabindex="4" title="Назив на банката на налогодавачот" style="color:Black;background-color:#E0E0E0;border-color:Black;border-width:1px;border-style:solid;font-size:X-Small;height:16px;width:250px;">
                                  </td>
                                </tr>
                                <tr height="16">
                                  <td colspan="2" align="left" valign="bottom">
                                    <font face="Arial" color="Black" size="1">
                                      <span id="virmanpp30_lblCelDoznaka" title="Цел на дознака за плаќањето">ЦЕЛ НА ДОЗНАКА</span>
                                    </font>
                                  </td>
                                </tr>
                                <tr height="16">
                                  <td align="left" valign="top" colspan="2">
                                    <input name="virmanpp30$txtCel_1" type="text" id="virmanpp30_txtCel_1" style="border: 1pt solid Black; FONT-SIZE: 11px; WIDTH: 250px; HEIGHT: 16px; margin-bottom: 0px;" tabindex="5" maxlength="250" width="240px" height="14px" onclick="txtCel_1_onclick()">
                                    <span id="virmanpp30_revCel1" title="Одредени специјални знаци не се дозволени" style="color:Red;font-size:10px;display:none;">*</span>
                                  </td>
                                </tr>
                                <tr height="16">
                                  <td align="left" colspan="2">
                                    <!--onkeypress="BezSpecZnaci()" -->
                                    <input name="virmanpp30$txtCel_2" type="text" id="virmanpp30_txtCel_2" style="BORDER-RIGHT: Black 1pt solid; BORDER-TOP: Black 1pt solid; FONT-SIZE: 11px; BORDER-LEFT: Black 1pt solid; WIDTH: 250px; BORDER-BOTTOM: Black 1pt solid; HEIGHT: 16px" tabindex="6" maxlength="250" width="250px" height="14px" onclick="return txtCel_2_onclick()">
                                    <span id="virmanpp30_revCel2" title="Одредени специјални знаци не се дозволени" style="color:Red;font-size:10px;display:none;">*</span>
                                  </td>
                                </tr>
                                <tr height="16">
                                  <td colspan="2" valign="bottom" height="16">
                                    <font face="Arial" color="Black" size="1">
                                      <span id="virmanpp30_lblPovikuvanjeBroj" title="Повикување на број на налогодавач">ПОВИКУВАЊЕ НА БРОЈ</span>
                                    </font>
                                  </td>
                                </tr>
                                <tr height="16">
                                  <td align="left" valign="top" colspan="2">
                                    <!--onkeypress="BezSpecZnaci()" -->
                                    <input name="virmanpp30$txtPovBrojN" type="text" id="virmanpp30_txtPovBrojN" style="BORDER-RIGHT: Black 1pt solid; BORDER-TOP: Black 1pt solid; FONT-SIZE: 11px; BORDER-LEFT: Black 1pt solid; WIDTH: 250px; BORDER-BOTTOM: Black 1pt solid; HEIGHT: 16px" tabindex="7" maxlength="24" width="250px" height="18px">
                                    <span id="virmanpp30_revPovBrN" title="Одредени специјални знаци не се дозволени" style="color:Red;font-size:10px;display:none;">*</span>
                                  </td>
                                </tr>
                                <tr height="16">
                                  <td colspan="2">
                                    <font face="Arial" color="Black" size="1"></font>
                                  </td>
                                </tr>
                                <tr height="16">
                                  <td colspan="2"></td>
                                </tr>
                                <tr height="16">
                                  <td colspan="2">&nbsp;</td>
                                </tr>
                                <tr height="16">
                                  <td align="left" valign="bottom" colspan="2">
                                    <font style="COLOR: #eb73ff" face="Arial" color="darkred" size="1">
                                      <span id="virmanpp30_lblObrazecPP30" title="Образец ПП30">Образец ПП30</span>
                                    </font>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                          </td>
                          <td width="20" height="100%">
                            <table cellpadding="0" cellspacing="0" border="0" height="100%">
                              <tbody>
                                <tr>
                                  <td width="49%">&nbsp;</td>
                                  <td width="1" bgcolor="white">&nbsp;</td>
                                  <td width="50%">&nbsp;</td>
                                </tr>
                              </tbody>
                            </table>
                          </td>
                          <td width="250" valign="top" align="center">
                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                              <tbody>
                                <tr height="16">
                                  <td align="right" valign="top" colspan="3">
                                    <div style="float:left; height:16px">
                                      <font face="Arial" color="Black" size="1">
                                        <span id="virmanpp30_Label1">ДАТУМ НА ВАЛУТА</span>
                                      </font>
                                      <input name="virmanpp30$txtDatumNaValuta" type="text" value="22.12.2023" maxlength="10" onchange="javascript:setTimeout('__doPostBack(\'virmanpp30$txtDatumNaValuta\',\'\')', 0)" onkeypress="if (WebForm_TextBoxKeyHandler(event) == false) return false;return JustNumbers(event)" id="virmanpp30_txtDatumNaValuta" tabindex="30" onkeydown="__PopCalValidateKey(this, event);" autocomplete="off" onkeyup="DateMask(this, event)" format="dd.mm.yyyy" onblur="__PopCalSetBlur(this, event);" onfocus="__PopCalSetFocus(this);" dir="ltr" invaliddatemessage="Погрешен формат на датум" calendar="virmanpp30_popDatumOd" style="BORDER-RIGHT: Black 1pt solid; BORDER-TOP: Black 1pt solid; FONT-SIZE: 11px; BORDER-LEFT: Black 1pt solid; WIDTH: 60px; BORDER-BOTTOM: Black 1pt solid; HEIGHT: 16px">
                                      <span id="virmanpp30_popDatumOd_MessageError" dir="ltr" style="position:absolute;top:0px;left:0px;z-index:+1000;display:none;Color:Red;"></span>
                                      <span id="virmanpp30_popDatumOd_Control" onclick="__PopCalShowCalendar(&quot;virmanpp30_txtDatumNaValuta&quot;,this)" style="cursor:hand;">
                                        <img src="/PopCalendar/Calendar.gif" border="0" align="absmiddle">
                                      </span>
                                    </div>
                                  </td>
                                </tr>
                                <tr height="16">
                                  <td align="right" valign="top" colspan="3">
                                    <font face="Arial" color="darkred" size="2">
                                      <b style="COLOR: #eb73ff">
                                        <span id="virmanpp30_lblPrimac" title="Примач">Примач</span>
                                      </b>
                                    </font>
                                  </td>
                                </tr>
                                <tr height="32">
                                  <td align="left" valign="middle" width="70">
                                    <font face="Arial" color="Black" size="1">
                                      <span id="virmanpp30_lblSmetkaPrimac" title="Сметка на примач">С-КА НА ПРИМАЧ</span>
                                    </font>
                                  </td>
                                  <td colspan="2" valign="middle" align="left">
                                    <div style="POSITION: relative;">
                                      <input name="virmanpp30$txtZiro1" type="text" id="virmanpp30_txtZiro1" onkeypress="return event.charCode >= 48 &amp;&amp; event.charCode <= 57" onkeyup="return autoTab(this, 3, event);" style="BORDER-RIGHT: Black 1pt solid; BORDER-TOP: Black 1pt solid; FONT-SIZE: 11px; BORDER-LEFT: Black 1pt solid; WIDTH: 28px; BORDER-BOTTOM: Black 1pt solid; HEIGHT: 16px" tabindex="8" maxlength="3" size="4">- <input name="virmanpp30$txtZiro2" type="text" id="virmanpp30_txtZiro2" onkeypress="return event.charCode >= 48 &amp;&amp; event.charCode <= 57" onkeyup="return autoTab(this, 10, event);" style="BORDER-RIGHT: Black 1pt solid; BORDER-TOP: Black 1pt solid; FONT-SIZE: 11px; BORDER-LEFT: Black 1pt solid; WIDTH: 80px; BORDER-BOTTOM: Black 1pt solid; HEIGHT: 16px" tabindex="9" maxlength="10" size="11">- <input name="virmanpp30$txtZiro3" type="text" id="virmanpp30_txtZiro3" onkeyup="return autoTab(this, 2, event);" maxlength="2" tabindex="10" onblur="clickButton();" onkeypress="return event.charCode >= 48 &amp;&amp; event.charCode <= 57" onfocus="virmanpp30_txtZiro2.value=DodajVodeckiNuli(virmanpp30_txtZiro2.value, 10);updateMod97('virmanpp30_txtZiro1', 'virmanpp30_txtZiro2', 'virmanpp30_txtZiro3');" style="BORDER-RIGHT: Black 1pt solid; BORDER-TOP: Black 1pt solid; FONT-SIZE: 11px; BORDER-LEFT: Black 1pt solid; WIDTH: 22px; BORDER-BOTTOM: Black 1pt solid; HEIGHT: 16px" size="3">
                                      <input type="submit" name="virmanpp30$btnPrebarajSmetkaValidating" value="..." onclick="javascript:WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions(&quot;virmanpp30$btnPrebarajSmetkaValidating&quot;, &quot;&quot;, true, &quot;&quot;, &quot;&quot;, false, false))" id="virmanpp30_btnPrebarajSmetkaValidating" tabindex="11" style="font-family:Tahoma;font-size:8pt;height:16px;width:20px;">
                                    </div>
                                  </td>
                                </tr>
                                <tr height="16">
                                  <td colspan="3">
                                    <font face="Arial" color="Black" size="1">
                                      <span id="virmanpp30_lblNazivPrimac" title="Име на примач">НАЗИВ НА ПРИМАЧ</span>
                                    </font>
                                  </td>
                                </tr>
                                <tr height="16">
                                  <td colspan="3" align="left" valign="top">
                                    <input name="virmanpp30$txtNazivP1" type="text" id="virmanpp30_txtNazivP1" onkeypress="BezSpecZnaci()" style="BORDER-RIGHT: Black 1pt solid; BORDER-TOP: Black 1pt solid; FONT-SIZE: 11px; BORDER-LEFT: Black 1pt solid; WIDTH: 250px; BORDER-BOTTOM: Black 1pt solid; HEIGHT: 16px" tabindex="12" maxlength="250" width="250px" height="14px">
                                    <span id="virmanpp30_RegularExpressionValidator1" title="Одредени специјални знаци не се дозволени" style="color:Red;font-size:10px;display:none;">*</span>
                                  </td>
                                </tr>
                                <tr height="16">
                                  <td colspan="3" align="left" valign="top">
                                    <input name="virmanpp30$txtNazivP2" type="text" id="virmanpp30_txtNazivP2" onkeypress="BezSpecZnaci()" style="BORDER-RIGHT: Black 1pt solid; BORDER-TOP: Black 1pt solid; FONT-SIZE: 11px; BORDER-LEFT: Black 1pt solid; WIDTH: 250px; BORDER-BOTTOM: Black 1pt solid; HEIGHT: 16px" tabindex="13" maxlength="250" width="250px" height="14px">
                                    <span id="virmanpp30_RegularExpressionValidator2" title="Одредени специјални знаци не се дозволени" style="color:Red;font-size:10px;display:none;">*</span>
                                  </td>
                                </tr>
                                <tr height="16">
                                  <td align="left" valign="bottom" height="16" colspan="3">
                                    <font face="Arial" color="Black" size="1">
                                      <span id="virmanpp30_lblBankaPrimac" title="Банка на примач">БАНКА НА ПРИМАЧ</span>
                                    </font>
                                  </td>
                                </tr>
                                <tr height="16">
                                  <td colspan="3" valign="top" align="left">
                                    <input name="virmanpp30$txtBankaP" type="text" id="virmanpp30_txtBankaP" onkeypress="BezSpecZnaci()" style="BORDER-RIGHT: Black 1pt solid; BORDER-TOP: Black 1pt solid; FONT-SIZE: 11px; BORDER-LEFT: Black 1pt solid; WIDTH: 250px; BORDER-BOTTOM: Black 1pt solid; HEIGHT: 16px" tabindex="14" maxlength="250" width="250px" height="14px">
                                  </td>
                                </tr>
                                <tr height="16">
                                  <td colspan="3" align="left" valign="bottom">
                                    <font face="Arial" color="Black" size="1">
                                      <span id="virmanpp30_lblIznos" title="Износ">ИЗНОС</span>
                                    </font>
                                  </td>
                                </tr>
                                <tr height="16">
                                  <td align="left" valign="top" colspan="3">
                                    <table cellpadding="0" cellspacing="0" border="0" width="240">
                                      <tbody>
                                        <tr>
                                          <td align="center" width="45">
                                            <span id="virmanpp30_lblMKD" title="МКД" style="display:inline-block;color:Black;border-color:Black;border-width:1px;border-style:Solid;font-family:Arial;font-size:X-Small;height:14px;width:40px;">МКД</span>
                                          </td>
                                          <td width="10">&nbsp;</td>
                                          <td align="right">
                                            <!--"FormatIznos(virmanpp30_txtIznos.value,'virmanpp30_txtIznos');"  sanja 16.06.2020-->
                                            <input name="virmanpp30$txtIznos" type="text" id="virmanpp30_txtIznos" value="0,00" maxlength="15" class="style1" tabindex="15" onkeypress="SamoBrojkiSoZapirka(event)" style="border: 1pt solid Black; FONT-SIZE: 11px; COLOR: Black; TEXT-ALIGN: right" size="21" onchange="FormatiranjeIznos();">
                                          </td>
                                        </tr>
                                      </tbody>
                                    </table>
                                  </td>
                                </tr>
                                <tr height="16">
                                  <td align="left" colspan="3">&nbsp;</td>
                                </tr>
                                <tr height="16">
                                  <td align="left" valign="bottom" height="16" colspan="3">
                                    <font face="Arial" color="Black" size="1">
                                      <span id="virmanpp30_lblPovikuvanjeBroj2" title="Повикување на број на примач">ПОВИКУВАЊЕ НА БРОЈ</span>
                                    </font>
                                  </td>
                                </tr>
                                <tr height="16">
                                  <td colspan="3" align="left" valign="top">
                                    <!-- onkeypress="BezSpecZnaci()" -->
                                    <input name="virmanpp30$txtPovBrojP" type="text" id="virmanpp30_txtPovBrojP" style="BORDER-RIGHT: Black 1pt solid; BORDER-TOP: Black 1pt solid; FONT-SIZE: 11px; BORDER-LEFT: Black 1pt solid; WIDTH: 250px; BORDER-BOTTOM: Black 1pt solid; HEIGHT: 16px;" tabindex="16" maxlength="24" width="250px" height="14px">
                                    <span id="virmanpp30_revPovBrP" title="Одредени специјални знаци не се дозволени" style="color:Red;font-size:10px;display:none;">*</span>
                                  </td>
                                </tr>
                                <tr height="64">
                                  <td colspan="3" align="left" valign="bottom">
                                    <table cellpadding="0" cellspacing="0" border="0" width="250">
                                      <tbody>
                                        <tr height="16">
                                          <td align="left" valign="bottom" width="100">
                                            <font face="Arial" color="Black" size="1">
                                              <span id="virmanpp30_lblSifra" title="Шифра на плаќање">ШИФРА</span>
                                            </font>
                                          </td>
                                          <td align="left" valign="bottom" width="100">
                                            <font face="Arial" color="Black" size="1">
                                              <span id="virmanpp30_lblPrioritet" title="Со внесување на степен на приоритет го одредувате редоследот на реализација на налозите. Одберете приоритет од 12 до 99. Стандарден приоритет на налог е 50.">ПРИОРИТЕТ</span>
                                            </font>
                                          </td>
                                          <td align="right" valign="bottom" width="70">
                                            <font face="Arial" color="Black" size="1">
                                              <span id="virmanpp30_lblNacin" title="Начин за реализација на налогот.">Начин</span>
                                            </font>
                                          </td>
                                        </tr>
                                        <tr height="16">
                                          <td align="left" width="100">
                                            <input name="virmanpp30$txtSifra" type="text" id="virmanpp30_txtSifra" width="38px" maxlength="3" height="16px" tabindex="17" onblur="getDescriptionFromCode()" onkeypress="return JustNumbers(event)" style="BORDER-RIGHT: Black 1pt solid; BORDER-TOP: Black 1pt solid; FONT-SIZE: 11px; BORDER-LEFT: Black 1pt solid; WIDTH: 38px; BORDER-BOTTOM: Black 1pt solid; HEIGHT: 16px">
                                            <input type="submit" name="virmanpp30$btnSifriPlakanje" value="..." onclick="javascript:WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions(&quot;virmanpp30$btnSifriPlakanje&quot;, &quot;&quot;, true, &quot;&quot;, &quot;&quot;, false, false))" id="virmanpp30_btnSifriPlakanje" tabindex="18" style="color:Black;font-family:Tahoma;font-size:8pt;height:16px;width:20px;">
                                          </td>
                                          <td align="left" width="100">
                                            <table cellpadding="0" cellspacing="0" border="0">
                                              <tbody>
                                                <tr>
                                                  <td align="center" valign="bottom" height="16">
                                                    <input name="virmanpp30$uscStatusPrioritet$txtStepenPrioritet" type="text" id="virmanpp30_uscStatusPrioritet_txtStepenPrioritet" align="bottom" value="50" maxlength="2" tabindex="19" onblur="CheckIfItsInLimits(12, 99, this.id)" onkeypress="return JustNumbersWithLimits(event, 12, 99, this.value)" style="border: 1pt solid Black; FONT-SIZE: 11px; COLOR: Black; TEXT-ALIGN: right; height:16; width:25;" size="21">
                                                    <font face="Arial" color="Black" size="1">
                                                      <span id="virmanpp30_uscStatusPrioritet_lblStepenPrioritet" title="Со внесување на степен на приоритет го одредувате редоследот на реализација на налозите. Одберете приоритет од 12 до 99. Стандарден приоритет на налог е 50." style="display:inline-block;color:Black;height:14px;">12-99</span>
                                                    </font>
                                                  </td>
                                                </tr>
                                              </tbody>
                                            </table>
                                          </td>
                                          <td align="right" width="70">
                                            <div style="position: relative; width: 36px;">
                                              <select name="virmanpp30$cmbNacin" id="virmanpp30_cmbNacin" tabindex="20" style="border-color: rgb(128, 128, 255); font-size: x-small; height: 19px; width: 36px; text-decoration: none;">
                                                <option value="0">0</option>
                                                <option value="1">1</option>
                                                <option selected="selected" value="2">2</option>
                                              </select>
                                              <select size="3" style="display: none; position: absolute; top: 19px; left: 0px; width: 36px; border: 1px solid rgb(51, 51, 51); font-weight: normal; padding: 0px; background-color: rgb(255, 255, 255); text-transform: none; z-index: 3;"></select>
                                              <input type="text" style="display: none; height: 17px; position: absolute; top: 0px; left: 0px; margin: 0px; padding: 2px 0px 0px 3px; outline-style: none; border-style: solid solid none; border-color: transparent; background-color: transparent; border-left-width: 1px; border-top-width: 1px; font-size: 10px; font-stretch: 100%; font-variant: normal; font-weight: 400; color: rgb(0, 0, 0); text-align: start; text-indent: 0px; text-shadow: none; text-transform: none; width: 11px; z-index: 2;">
                                              <div style="position: absolute; top: 0px; left: 0px; width: 36px; height: 19px; background-color: rgb(255, 255, 255); opacity: 0.01; z-index: 1;"></div>
                                            </div>
                                          </td>
                                        </tr>
                                        <tr height="16">
                                          <td align="left" width="200">
                                            <font face="Arial" color="Black" size="1">
                                              <span id="virmanpp30_lblDatumVnesuvanje" title="Датум на уплата">ДАТУМ</span>
                                            </font>
                                          </td>
                                          <td align="right" valign="bottom" colspan="2">
                                            <font face="Arial" color="Black" size="1">
                                              <span id="virmanpp30_lblMesto" title="Место на уплата">МЕСТО</span>
                                            </font>
                                          </td>
                                        </tr>
                                        <tr height="16">
                                          <td align="left" valign="bottom" width="200">
                                            <input name="virmanpp30$txtDatumNaPodnesuvanje" type="text" value="22.12.2023" maxlength="10" readonly="readonly" id="virmanpp30_txtDatumNaPodnesuvanje" disabled="disabled" tabindex="20" title="Овде се внесува датумот на уплата" style="font-size:X-Small;height:16px;width:70px;">
                                          </td>
                                          <td align="right" valign="bottom" colspan="2">
                                            <font style="BACKGROUND-COLOR: #e0e0e0" face="Arial" color="#000080" size="1">
                                              <span id="virmanpp30_lblElektronski" title="ЕЛЕКТРОНСКИ">ЕЛЕКТРОНСКИ</span>
                                            </font>
                                          </td>
                                        </tr>
                                      </tbody>
                                    </table>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                          </td>
                          <td width="20" height="100%">&nbsp;</td>
                        </tr>
                      </tbody>
                    </table>
                    <!--  -->
                </div>
                
            @endif
        @else
            <!-- Landing page calculator -->
            <div class="w-full lg:w-1/2 px-5 py-5 lg:py-0">
                <h2 class="block w-[490px] text-left max-w-full text-2xl md:text-[32px] leading-snug mb-7 md:mb-8 font-bold">Информативен калкулатор за инвестиции</h2>
                <form class="mb-0 text-left">
                    <div class="mb-4">
                        <label class="mb-2 font-bold text-base md:text-lg !leading-tight block">Селектирајте проект за инвестицијта</label>
                        <select wire:model="selectProjectValue" class="font-normal text-lg md:text-xl text-colormain placeholder:text-gray-500 min-h-[52px] py-2 px-4 bg-white transition-all rounded-md border-gray-300 border-solid border focus:border-colormain w-[360px] max-w-full">
                            <option disabled selected value="">-Избери проект-</option>
                            @foreach($projects as $project)
                                <option value="{{ $project->id }}">{{ $project->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="block lg:hidden mb-10" {{ $is_hidden }}>
                        <div class="w-full h-[280px] md:h-[330px] rounded-lg mb-6 shadow-lg">
                            <img src="{{ $picture }}" class="object-cover object-center w-full h-full rounded-lg" alt="{{ $name }}">
                        </div>

                        <p class="text-xl md:text-2xl font-bold mb-2">{{ $name }}</p>

                        <p class="text-base font-normal text-neutral-500">{!! $description !!}</p>

                        <div class="w-full h-px bg-[#EBEEF4] my-4"></div>

                        <div class="flex flex-col min-[400px]:flex-row justify-between items-start min-[400px]:items-center mb-1">
                            <div class="text-base md:text-lg font-normal text-neutral-500">Почеток на проектот:</div>
                            <div class="text-base md:text-lg font-bold shrink">{{ $start_date }}</div>
                        </div>

                        <div class="flex flex-col min-[400px]:flex-row justify-between items-start min-[400px]:items-center mb-1">
                            <div class="text-base md:text-lg font-normal text-neutral-500">Завршување на проектот:</div>
                            <div class="text-base md:text-lg font-bold shrink">{{ $end_date }}</div>
                        </div>

                        <div class="flex flex-col min-[400px]:flex-row justify-between items-start min-[400px]:items-center">
                            <div class="text-base md:text-lg font-normal text-neutral-500">Рок на изградба: </div>
                            <div class="text-base md:text-lg font-bold shrink">{{ $return_of_investment }} месеци</div>
                        </div>
                    </div>

                    <div class="mb-4" >
                        <label class="mb-2 font-bold text-base md:text-lg !leading-tight block">Датум на вашето инвестирање</label>

                        <input id="investDate" autocomplete="off" wire:model="investDate" x-data="{minDate:@entangle('min_date_for_investing'), maxDate:@entangle('max_date_for_investing')}"
                                x-init="$watch('minDate', (value) => instance.set('minDate', minDate)); $watch('maxDate', (value) => instance.set('maxDate', maxDate));  instance = flatpickr($refs.input, {enableTime: false, dateFormat: 'd/m/Y', minDate:minDate, maxDate:maxDate});"
                        class="font-normal text-lg md:text-xl text-colormain placeholder:text-gray-500 min-h-[52px] py-2 px-4 bg-white transition-all rounded-md border-gray-300 border-solid border focus:border-colormain w-[360px] max-w-full"
                        x-ref="input" type="text" placeholder="Date available to begin work"/>
                    </div>

                    <div class="w-full h-px bg-[#EBEEF4] my-4"></div>

                    <div class="mb-4">
                        <label class="mb-2 font-bold text-base md:text-lg !leading-tight block">Селектирај валута за пресметка</label>
                        <select wire:model="currencyValue" class="font-medium text-baseaw md:text-lg text-colormain placeholder:text-gray-500 min-h-[40px] py-1 px-4 pr-[30px] bg-[#EBEEF4] transition-all rounded-xl border-[#EBEEF4] border-solid border focus:border-[#EBEEF4] w-auto" >
                            <option value="eur" selected>EUR</option>
                            <option value="mkd">MKD</option>
                        </select>
                    </div>

                    <p class="mb-4 text-sm text-red-500">*All projected values are before any property costs and platform fees, and based on a 5-year holding period. We expect the asset value to grow 30% over the next 5 years.</p>

                    <div class="w-full h-px bg-[#EBEEF4] my-4"></div>

                    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-4">
                        <div class="text-base md:text-lg font-medium pb-1 sm:pb-0">Инвестиција</div>
                        <div class="text-base md:text-lg font-medium">
                            <div class="flex flex-row justify-between items-center">
                                <span class="font-bold text-base md:text-lg pr-2">{!! $curency_symbol !!}</span>
                                <input type="text" class="font-bold text-base md:text-lg text-colormain placeholder:text-gray-500 min-h-[37px] py-1 px-2 bg-transparent transition-all rounded-md border-gray-300 border-solid border focus:border-colormain w-[100px] max-w-full investment_slider_value" value="{{ $avg_slider_value }}" wire:model="rangeValue">
                            </div>
                        </div>
                    </div>

                    <div class="mb-0">
                        <label for="investment_range" class="block mb-0 text-sm font-medium text-gray-900">Повлечи или внеси рачно</label>
                        <input id="investment_range" type="range" value="{{ $avg_slider_value }}" min="{{ $min_investment_opportunity }}" max="{{ $investment_opportunity }}" class="w-full h-3 bg-[#EBEEF4] rounded-lg appearance-none cursor-pointer range-lg investment_range" wire:model="rangeValue">
                    </div>

                    <div class="flex flex-row justify-between items-center">
                        <div class="text-base md:text-lg font-normal">{!! $curency_symbol !!}{{ $min_investment_opportunity }}</div>
                        <div class="text-base md:text-lg font-normal">{!! $curency_symbol !!}{{ $investment_opportunity }} </div>
                    </div>

                    <div class="w-full h-px bg-[#EBEEF4] my-4"></div>

                    <div class="flex flex-col min-[400px]:flex-row justify-between items-start min-[400px]:items-center mb-2">
                        <div class="text-base md:text-lg font-normal">Вкупна заработка во проценти</div>
                        <div class="text-base md:text-lg font-bold shrink">{{ number_format($investor_procenton, 2, '.', ',') }}%</div>
                    </div>

                    @php
                            $early_invest_procenton = floatval($early_invest_procenton);
                        @endphp
                        @if($early_invest_procenton > 0)
                            <div class="flex flex-col min-[400px]:flex-row justify-between items-start min-[400px]:items-center mb-2">
                                <div class="text-base md:text-lg font-normal">Дополнителна заработка во проценти</div>
                                <div class="text-base md:text-lg font-bold shrink">{{ number_format($early_invest_procenton, 2, '.', ',') }}%</div>
                            </div>
                        @endif

                    <div class="flex flex-col min-[400px]:flex-row justify-between items-start min-[400px]:items-center">
                        <div class="text-base md:text-lg font-normal">Вкупна заработка во парична вредност </div>
                        <div class="text-base md:text-lg font-bold shrink">{!! $curency_symbol !!}{{ number_format($profit, 2, '.', ',') }}</div>
                    </div>
                </form>
            </div>
            <div class="w-full lg:w-1/2 px-5 py-5 lg:py-0 text-left hidden lg:block" {{ $is_hidden }}>
                <div class="w-full h-[280px] md:h-[330px] rounded-lg mb-6 shadow-lg">
                    <img src="{{ $picture }}" class="object-cover object-center w-full h-full rounded-lg" alt="{{ $name }}">
                </div>

                <p class="text-xl md:text-2xl font-bold mb-2">{{ $name }}</p>

                <p class="text-base font-normal text-neutral-500">{!! $description !!}</p>

                <div class="w-full h-px bg-[#EBEEF4] my-4"></div>

                <div class="flex flex-row justify-between items-center mb-1">
                    <div class="text-base md:text-lg font-normal text-neutral-500">Почеток на проектот:</div>
                    <div class="text-base md:text-lg font-bold shrink">{{ $start_date }}</div>
                </div>

                <div class="flex flex-row justify-between items-center mb-1">
                    <div class="text-base md:text-lg font-normal text-neutral-500">Завршување на проектот:</div>
                    <div class="text-base md:text-lg font-bold shrink">{{ $end_date }}</div>
                </div>

                <div class="flex flex-row justify-between items-center">
                    <div class="text-base md:text-lg font-normal text-neutral-500">Рок на изградба: </div>
                    <div class="text-base md:text-lg font-bold shrink">{{ $return_of_investment }} месеци</div>
                </div>
            </div>
        @endif 
        <!-- END TEST -->
    </div>
</div>
