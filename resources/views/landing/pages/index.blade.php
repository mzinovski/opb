@extends('landing.master')

@section('title', 'Smart Invest Group – Заедно е попаметно. #СегаМожеме')
@section('meta_title', 'Smart Invest Group – Заедно е попаметно. #СегаМожеме')
@section('keywords', 'заработка, инвестирање, безбеден')
@section('description', 'Паметен, лесен и безбеден начин за инвестирање - Инвестирајте дигитално и добијте загарантирана заработка')
{{-- facebook meta tags --}}
@section('fb_meta_title', 'Smart Invest Group – Заедно е попаметно. #СегаМожеме')
@section('fb_description',  'Паметен, лесен и безбеден начин за инвестирање - Инвестирајте дигитално и добијте загарантирана заработка')
@section('fb_route', URL::current()) 
@section('fb_type', 'website')
@section('fb_image', Vite::asset('resources/images/homepage/si-group-social.jpg'))

{{--twitter meta tags --}}
@section('twitter_meta_title',  'Smart Invest Group – Заедно е попаметно. #СегаМожеме')
@section('twitter_description', 'Паметен, лесен и безбеден начин за инвестирање - Инвестирајте дигитално и добијте загарантирана заработка')
@section('twitter_url',  URL::current())

@section('content')

<div class="w-full overflow-hidden relative block text-center lg:text-start">
    <section class="w-full block relative pt-[100px] lg:pt-[110px] pb-[0px]">
        <div class="px-5 xl:px-6 w-[1440px] max-w-full block relative mx-auto">
            <div class="flex flex-row flex-wrap items-center -mx-6  pt-8 md:pt-0 ">
                <div class="w-full lg:w-1/2 px-6">
                    <h1 class="text-4xl md:text-5xl xl:text-6xl !leading-[140%] font-bold mb-9 md:mb-12"><span class="text-colorred">Паметен,</span> лесен и безбеден начин за <span class="text-colorred">инвестирање</span></h1>

                    <p class="w-[620px] mx-auto lg:mx-0 max-w-full mb-10 md:mb-16">Инвестирајте дигитално и добијте загарантирана заработка</p>

                    <p><a href="#" class="font-bold text-lg md:text-xl text-white min-h-[42px] lg:min-h-[52px] py-2 lg:py-3 px-5 bg-colormain transition-all hover:bg-colormain/70 rounded-md inline-block" @click='$refs.theAbout.scrollIntoView({ behavior: "smooth", block: "nearest", inline: "nearest" });'>Дознајте Повеќе</a></p>
                    
                </div>

                <div class="w-full lg:w-1/2 px-6 pt-9 lg:pt-0">
                    <picture>
                        <source srcset="{{ Vite::asset('resources/images/homepage/smart-invest-top-bg.webp')}}" type="image/webp">
                        <img src="images/homepage/smart-invest-top-bg.jpg" alt="Apple Store" width="835" height="822" class="lg:max-w-none lg:-ml-10 inline-block -mr-[10%] lg:-mr-0">
                    </picture>
                    
                </div>
            </div>
        </div>
    </section>

    <section x-ref="theAbout" class="w-full block relative py-[60px] md:py-[80px] lg:py-[100px] bg-bglight">
        <div class="px-5 xl:px-6 w-[1440px] max-w-full block relative mx-auto text-center">
            <h2 class="text-3xl md:text-4xl xl:text-5xl !leading-[140%] font-bold mb-8 md:mb-10 text-center pt-5 lg:pt-6">SMART INVEST GROUP ВО КРАТКИ ЦРТИ</h2>
            <p class="mb-4">Алтернативен и паметен начин на инвестирање за првпат кај нас!</p>
            <div class="xl:px-20">
                <ul class="pl-5 text-left list-disc mb-10">
                    <li class="py-1">Платформата е наменета за поедноставно и транспарентно поврзување на инвеститори кои се заинтересирани за пласман на своите слободни средства, со оние кои имаат модерни бизнис-идеи со голем потенцијал.</li>
                    <li class="py-1">Одлична можност за физички лица да инвестираат во приватен капитал заедно со веќе етаблирани успешни компании.</li>
                    <li class="py-1">Инвестициите се наменети за реализирање на проекти во областа на недвижен имот, инфраструктурни објекти, старт ап бизниси и слично.</li>
                    <li class="py-1">Smart Invest Group е еквивалент на светски развиени и функционални платформи од овој тип на работење.</li>
                    <li class="py-1">Smart Invest Group нуди дополнителна можност за изнајмување на платформата на заинтересирани страни, при посредување за обезбедувањето на потенцијални инвестиции и инвеститори.</li>
                </ul>
            </div>
    
            <h2 class="text-3xl md:text-4xl xl:text-5xl !leading-[140%] font-bold mb-8 md:mb-10 text-center pt-5 lg:pt-6">КОИ СМЕ НИЕ?</h2>
            <p class="mb-4">SMART INVEST GROUP е просперитетна и влијателна инвестициска групација која делува во разнообразни сегменти на македонскиот бизнис и општество. Нејзината уникатност произлегува од вклучувањето на искусни и реномирани македонски претприемачи со повеќе од две децении искуство во области како: градежништво, ИТ-технологија, финансии и банкарство, трговија и угостителство, медиуми, маркетинг, печатарска индустрија и многу други. Мрежата на компаниите кои се дел од SMART INVEST GROUP е јасен индикатор за нивната сериозност и потенцијал за постигнување на долгорочни цели.</p>
            <p class="mb-4">Оваа мрежа ги вклучува следниве компании:</p>
            <p class="mb-10">БВ Бизнис Груп, Unlimited coders, Винарија Чифлик, EPS, Марио Матео, Графо пром, Коинг ДООЕЛ и Охо продукција,</p>
            
            <div class="flex flex-row flex-wrap items-center justify-center -mx-5">
                <div class="px-5 py-2.5">
                    <img src="{{ Vite::asset('resources/images/homepage/business-group-logo.png')}}" alt="БВ Бизнис Груп">
                </div>
                <div class="px-5 py-2.5">
                    <img src="{{ Vite::asset('resources/images/homepage/unlimited-coders-logo.svg')}}" alt="Анлимитед Кодерс">
                </div>
                <div class="px-5 py-2.5">
                    <img src="{{ Vite::asset('resources/images/homepage/ciflik-winery-logo.svg')}}" alt="Чифлик винарија">
                </div>
                <div class="px-5 py-2.5">
                    <img src="{{ Vite::asset('resources/images/homepage/eps-doors-and-metal.png')}}" alt="EPS Doors & metal">
                </div>
                <div class="px-5 py-2.5">
                    <img src="{{ Vite::asset('resources/images/homepage/pop-food-de-niro-logo.png')}}" alt="POP FOOD - DeNiro">
                </div>
                <div class="px-5 py-2.5">
                    <img src="{{ Vite::asset('resources/images/homepage/grafoprom-logo.png')}}" alt="ГрафоПром">
                </div>
                <div class="px-5 py-2.5">
                    <img src="{{ Vite::asset('resources/images/homepage/koing-dooel-logo.png')}}" alt="Коинг ДООЕЛ">
                </div>
                <div class="px-5 py-2.5">
                    <img src="{{ Vite::asset('resources/images/homepage/oxo-logo.png')}}" alt="ОХО Продукција">
                </div>
                
            </div>

        </div>
    </section>

    <section x-ref="theSteps" class="w-full block relative py-[60px] md:py-[80px] lg:py-[100px]">
        <div class="px-5 xl:px-6 w-[1440px] max-w-full block relative mx-auto">
            <h2 class="text-4xl md:text-5xl xl:text-6xl !leading-[140%] font-bold mb-8 text-center">Како <span class="text-colorred">работи</span> Smart Invest</h2>
            <p class="text-center mb-8 md:mb-10">Три брзи и лесни чекори до заработка</p>

            <div class="flex flex-row flex-wrap justify-center lg:justify-around -mx-8">
                <div class="px-8 py-4 w-full md:w-1/2 lg:w-auto">
                    <div class="inline-block w-[295px] max-w-full text-center">
                        <div class="w-full mb-7 text-center md:text-left">
                            <div class="inline-block">
                                <div class="text-white font-bold text-2xl w-[50px] h-[50px] flex justify-center items-center bg-coloryellow rounded-md">01</div>
                            </div>
                        </div>
                        <div class="w-full min-h-[205px]">
                            <img src="{{ Vite::asset('resources/images/homepage/icon-search.svg')}}" alt="Пребарувај, пронајдете го најсоодветниот имот за вас" width="221" height="160" class="max-h-[160px] w-auto inline-block">
                        </div>
                        <p class="font-bold text-2xl text-center mb-2">Пребарувај</p>
                        <p class="font-normal text-lg text-center">Пронајдете го најсоодветниот проект за вас</p>
                    </div>
                </div>

                <div class="px-8 py-4 w-full md:w-1/2 lg:w-auto">
                    <div class="inline-block w-[295px] max-w-full text-center">
                        <div class="w-full mb-7 text-center md:text-left">
                            <div class="inline-block">
                                <div class="text-white font-bold text-2xl w-[50px] h-[50px] flex justify-center items-center bg-coloryellow rounded-md">02</div>
                            </div>
                        </div>
                        <div class="w-full min-h-[205px]">
                            <img src="{{ Vite::asset('resources/images/homepage/icon-invest.svg')}}" alt="Инвестирај, вложете ја вашата планирана сума" width="221" height="160" class="max-h-[160px] w-auto inline-block">
                        </div>
                        <p class="font-bold text-2xl text-center mb-2">Инвестирај</p>
                        <p class="font-normal text-lg text-center">Безбедно вложете го Вашиот планиран износ</p>
                    </div>
                </div>

                <div class="px-8 py-4 w-full md:w-1/2 lg:w-auto">
                    <div class="inline-block w-[295px] max-w-full text-center">
                        <div class="w-full mb-7 text-center md:text-left">
                            <div class="inline-block">
                                <div class="text-white font-bold text-2xl w-[50px] h-[50px] flex justify-center items-center bg-coloryellow rounded-md">03</div>
                            </div>
                        </div>
                        <div class="w-full min-h-[205px]">
                            <img src="{{ Vite::asset('resources/images/homepage/icon-earn.svg')}}" alt="Заработи, очекувај одлична и загарантирана заработка" width="221" height="160" class="max-h-[160px] w-auto inline-block">
                        </div>
                        <p class="font-bold text-2xl text-center mb-2">Заработи</p>
                        <p class="font-normal text-lg text-center">Очекувајте одлична и загарантирана заработка.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section x-ref="theProjects" class="w-full block relative py-[60px] md:py-[80px] lg:py-[100px] !pb-0 bg-bglight">
        <div class="px-5 xl:px-6 w-[1440px] max-w-full block relative mx-auto">
            <h2 class="text-4xl md:text-5xl xl:text-6xl !leading-[140%] font-bold mb-8 md:mb-10 text-center">Проекти</h2>

            @foreach($projects as $project)
                @if ($loop->iteration % 2 == 0)
                    <div class="flex flex-row flex-wrap justify-center lg:justify-around -mx-8 items-center text-lg py-8 lg:pt-14">
                        <div class="px-8 py-4 w-full lg:w-[45%]">
                            <h2 class="text-3xl mb-4 font-bold">{!! $project->name !!}</h2>
                            <div class="mb-0">
                                {!! $project->description !!}
                            </div>
                            <div class="flex flex-col mb-4">
                                <div>Почеток на проектот: {!! $project->start_date !!}</div>
                                <div>Завршување на проектот: {!! $project->end_date !!}</div>
                                <div>Рок на изградба: {{ $project->return_of_investment }} месеци.</div>
                            </div>
                            <p class="mb-0"><strong>МОЖНОСТ ЗА ИНВЕСТИРАЊЕ ДО {!! $project->investment_opportunity !!} ЕВРА</strong></p>
                            <!-- INVEST BTN -->
                            <p class="mb-0 text-center pt-10 lg:pt-14 pb-5 md:pb-0"><a href="{{ route('invest.page.index', ['project_slug' => $project->slug]) }}" target="_blank" class="font-bold text-lg md:text-xl text-white min-h-[42px] lg:min-h-[52px] py-2 lg:py-3 px-5 bg-coloryellow transition-all hover:bg-coloryellow/80 rounded-md inline-block">Инвестирај</a></p>

                        </div>
                        <div class="px-8 py-4 w-full lg:w-[55%]">
                            <div class="text-center">
                                <div class="inline-block relative">
                                    <picture>
                                        <source srcset="{!! $project->picture !!}" type="image/webp">
                                        <img src="{!! $project->picture !!}" class="max-w-full h-auto shadow-lg inline-block" width="600" height="600">
                                    </picture>
                                    <div class="absolute left-auto -right-[40px] -bottom-[60px] lg:right-auto lg:-left-[40px]">
                                        <div class="absolute left-1/2 top-1/2 -translate-y-1/2 pr-4 pb-2 -translate-x-1/2 font-semibold text-red-800 text-[11px] !leading-tight flex h-full w-full items-center justify-center"><span>Вкупна<br>заработка<br><span class="text-[20px]">{!! $project->procenton !!}%</span></span></div>
                                        <img src="{{ Vite::asset('resources/images/homepage/price-box.png')}}" alt="Заработка">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="flex flex-row flex-wrap justify-center lg:justify-around -mx-8 items-center text-lg py-8 lg:pt-14">
                        <div class="px-8 py-4 w-full lg:w-[55%] order-last lg:order-first">
                            <div class="text-center ">
                                <div class="inline-block relative">
                                    <picture>
                                        <source srcset="{{ $project->picture }}">
                                        <img src="{{ $project->picture }}" class="max-w-full h-auto shadow-lg inline-block" width="600" height="600">
                                    </picture>
                                    <div class="absolute -right-[40px] -bottom-[60px]">
                                        <div class="absolute left-1/2 top-1/2 -translate-y-1/2 pr-4 pb-2 -translate-x-1/2 font-semibold text-red-800 text-[11px] !leading-tight flex h-full w-full items-center justify-center"><span>Вкупна<br>заработка<br><span class="text-[20px]">{{ $project->procenton }}%</span></span></div>
                                        <img src="{{ Vite::asset('resources/images/homepage/price-box.png')}}" alt="Заработка">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="px-8 py-4 w-full lg:w-[45%] order-first lg:order-last">
                            <h2 class="text-3xl mb-4 font-bold">{{ $project->name }}</h2>
                            <div class="mb-0">
                                {!! $project->description !!}
                            </div>
                            <div class="flex flex-col mb-4">
                                <div>Почеток на градба: {{ $project->start_date }}</div>
                                <div>Завршување на проектот: {{ $project->end_date }}</div>
                                <div>Рок на изградба: {{ $project->return_of_investment }} месеци.</div>
                            </div>
                            <p class="mb-0"><strong>МОЖНОСТ ЗА ИНВЕСТИРАЊЕ ДО {{ $project->investment_opportunity }} евра</strong></p>
                            <!-- INVEST BTN -->
                            <p class="mb-0 text-center pt-10 lg:pt-14 pb-5 md:pb-0"><a href="{{ route('invest.page.index', ['project_slug' => $project->slug]) }}" target="_blank" class="font-bold text-lg md:text-xl text-white min-h-[42px] lg:min-h-[52px] py-2 lg:py-3 px-5 bg-coloryellow transition-all hover:bg-coloryellow/80 rounded-md inline-block">Инвестирај</a></p>
                        </div>
                    </div>
                @endif
                
            @endforeach
            
            <p class="mb-0 text-center pt-10 lg:pt-14 pb-5 md:pb-0"><a href="{{ Vite::asset('resources/images/homepage/si-group-catalogue.pdf')}}" target="_blank" class="font-bold text-lg md:text-xl text-white min-h-[42px] lg:min-h-[52px] py-2 lg:py-3 px-5 bg-colormain transition-all hover:bg-colormain/80 rounded-md inline-block">Симнете каталог</a></p>
        </div>
    </section>

    <section x-ref="theCalc" class="w-full block relative py-[60px] md:py-[80px] lg:py-[100px] bg-bglight">
        <div class="px-5 xl:px-6 w-[1440px] max-w-full block relative mx-auto">
            <livewire:project-calculator.index />
        </div>
    </section>

    <section x-ref="theEl" class="w-full block relative pt-10 md:pt-[80px] pb-[80px] lg:py-[100px] bg-bglight before:absolute before:bottom-0 before:w-full before:h-[195px] before:conten-[''] before:block before:z-[10] before:bg-colormain">
        <div class="px-5 xl:px-6 w-[1440px] max-w-full block mx-auto text-center relative z-20">
            <livewire:subscribers.subscribe />
        </div>
    </section>
</div>

@endsection

{{-- @push('modals') --}}

{{-- @endpush --}}
@push('scripts')
   <script type="text/javascript">
        const sliderEl = document.querySelector(".investment_range")
        const sliderValue = document.querySelector(".investment_slider_value")

        sliderEl.addEventListener("input", (event) => {
          const tempSliderValue = event.target.value; 
          sliderValue.value = tempSliderValue;
          const progress = (tempSliderValue / sliderEl.max) * 100;
         
          sliderEl.style.background = `linear-gradient(to right, #FEC20E ${progress}%, #ccc ${progress}%)`;
          //console.log(progress);
        })
   </script>
@endpush
