<header class="fixed w-full left-0 top-0 z-[500] h-[60px] md:h-[75px] lg:h-[90px] xl:h-[120px] transition-all duration-500 bg-white group-[&.overflow-hidden]/togglemenu:shadow-[0px_4px_10px_1px_rgba(0,0,0,0.1)]" @scroll.window="atTop = (window.pageYOffset < 70) ? false: true" :class="{'shadow-[0px_4px_10px_1px_rgba(0,0,0,0.1)]': atTop }">
    <div class="px-5 sm:px-6 w-[1440px] max-w-full h-full block relative mx-auto">
        <div class="flex flex-row justify-between items-center h-full pr-16 lg:pr-0">
            <div>
                <a>
                    <img src="{{ Vite::asset('resources/images/logos/logo-smart-invest-thumb.svg')}}" alt="#" width="59" height="54" class="max-h-[40px] md:max-h-[50px] lg:max-h-[70px] w-auto">
                </a>
            </div>
            <div class="inline-block lg:hidden absolute right-5 sm:right-6 top-[42%] -translate-y-1/2 ">
                <button class="text-white focus:outline-none w-[35px] h-[27px] group" x-on:click="togglemenu = !togglemenu; active = !active" x-bind:class="{'active' : active}">
                    <span class="sr-only">Главно мени</span>
                    <div class="block w-[35px]">
                        <span aria-hidden="true" class="block absolute h-[3.5px] rotate-0 -translate-y-2.5 rounded-md w-[35px] bg-colormain transform transition duration-500 ease-in-out group-[&.active]:rotate-45 group-[&.active]:translate-y-0" ></span>
                        <span aria-hidden="true" class="block absolute  h-[3.5px] opacity-100 rounded-md w-[35px] bg-colormain   transform transition duration-500 ease-in-out group-[&.active]:opacity-0"></span>
                        <span aria-hidden="true" class="block absolute  h-[3.5px] rotate-0 translate-y-2.5 rounded-md w-[35px] bg-colormain transform  transition duration-500 ease-in-out group-[&.active]:-rotate-45 group-[&.active]:translate-y-0"></span>
                    </div>
                </button>
            </div>
            <div class="inline-block">
                <div class="flex flex-row flex-wrap items-center -mx-5 lg:-mx-2.5 xl:-mx-7">
                    <div class="px-5 lg:px-2.5 xl:px-7 hidden lg:inline-block">
                        @if(Route::is('invest.page.index', 'started_investments_page'))
                            <a href="/" class="group/nav text-lg md:text-xl text-colormain font-bold transition-all hover:text-colorred [&.active]:text-colorred"
                            x-data @click="window.scrollTo({top: 0, behavior: 'smooth'})">
                                <span class="relative">
                                    Почетна
                                    <img class="absolute h-auto w-[67px] left-1/2 -translate-x-1/2 top-[110%] opacity-0 invisible group-hover/nav:opacity-100 group-hover/nav:visible group-[&.active]/nav:opacity-100 group-[&.active]/nav:visible transition-all inline-block max-w-none" src="{{ Vite::asset('resources/images/homepage/nav-link-shape.svg')}}" width="88" height="14">
                                </span>
                            </a>
                        @else
                            <button class="group/nav text-lg md:text-xl text-colormain font-bold transition-all hover:text-colorred [&.active]:text-colorred"
                            x-data @click="window.scrollTo({top: 0, behavior: 'smooth'})">
                                <span class="relative">
                                    Почетна
                                    <img class="absolute h-auto w-[67px] left-1/2 -translate-x-1/2 top-[110%] opacity-0 invisible group-hover/nav:opacity-100 group-hover/nav:visible group-[&.active]/nav:opacity-100 group-[&.active]/nav:visible transition-all inline-block max-w-none" src="{{ Vite::asset('resources/images/homepage/nav-link-shape.svg')}}" width="88" height="14">
                                </span>
                            </button>
                        @endif
                    </div>

                    @if(Route::is('invest.page.index', 'started_investments_page'))
                        <!-- ??? -->
                    @else
                        <div class="px-5 lg:px-2.5 xl:px-7 hidden lg:inline-block">
                            <button class="group/nav text-lg md:text-xl text-colormain font-bold transition-all hover:text-colorred [&.active]:text-colorred"
                            @click='$refs.theAbout.scrollIntoView({ behavior: "smooth", block: "nearest", inline: "nearest" });'
                            >
                                <span class="relative">
                                   За Нас
                                    <img class="absolute h-auto w-[67px] left-1/2 -translate-x-1/2 top-[110%] opacity-0 invisible group-hover/nav:opacity-100 group-hover/nav:visible group-[&.active]/nav:opacity-100 group-[&.active]/nav:visible transition-all inline-block max-w-none" src="{{ Vite::asset('resources/images/homepage/nav-link-shape.svg')}}" width="88" height="14">
                                </span>
                            </button>
                        </div>

                        <div class="px-5 lg:px-2.5 xl:px-7 hidden lg:inline-block">
                            <button class="group/nav text-lg md:text-xl text-colormain font-bold transition-all hover:text-colorred [&.active]:text-colorred"
                            @click='$refs.theSteps.scrollIntoView({ behavior: "smooth", block: "nearest", inline: "nearest" });'
                            >
                                <span class="relative">
                                   Како работи
                                    <img class="absolute h-auto w-[67px] left-1/2 -translate-x-1/2 top-[110%] opacity-0 invisible group-hover/nav:opacity-100 group-hover/nav:visible group-[&.active]/nav:opacity-100 group-[&.active]/nav:visible transition-all inline-block max-w-none" src="{{ Vite::asset('resources/images/homepage/nav-link-shape.svg')}}" width="88" height="14">
                                </span>
                            </button>
                        </div>

                        <div class="px-5 lg:px-2.5 xl:px-7 hidden lg:inline-block">
                            <button class="group/nav text-lg md:text-xl text-colormain font-bold transition-all hover:text-colorred [&.active]:text-colorred"
                            @click='$refs.theProjects.scrollIntoView({ behavior: "smooth", block: "nearest", inline: "nearest" });'
                            >
                                <span class="relative">
                                   Проекти
                                    <img class="absolute h-auto w-[67px] left-1/2 -translate-x-1/2 top-[110%] opacity-0 invisible group-hover/nav:opacity-100 group-hover/nav:visible group-[&.active]/nav:opacity-100 group-[&.active]/nav:visible transition-all inline-block max-w-none" src="{{ Vite::asset('resources/images/homepage/nav-link-shape.svg')}}" width="88" height="14">
                                </span>
                            </button>
                        </div>

                        <div class="px-5 lg:px-2.5 xl:px-7 hidden lg:inline-block">
                            <button class="group/nav text-lg md:text-xl text-colormain font-bold transition-all hover:text-colorred [&.active]:text-colorred"
                            @click='$refs.theCalc.scrollIntoView({ behavior: "smooth", block: "nearest", inline: "nearest" });'
                            >
                                <span class="relative">
                                   Калкулатор
                                    <img class="absolute h-auto w-[67px] left-1/2 -translate-x-1/2 top-[110%] opacity-0 invisible group-hover/nav:opacity-100 group-hover/nav:visible group-[&.active]/nav:opacity-100 group-[&.active]/nav:visible transition-all inline-block max-w-none" src="{{ Vite::asset('resources/images/homepage/nav-link-shape.svg')}}" width="88" height="14">
                                </span>
                            </button>
                        </div>

                        <div class="px-5 lg:px-2.5 xl:px-7 hidden lg:inline-block">
                            <button class="group/nav text-lg md:text-xl text-colormain font-bold transition-all hover:text-colorred [&.active]:text-colorred"
                            @click='$refs.theFooter.scrollIntoView({ behavior: "smooth", block: "nearest", inline: "nearest" });'
                            >
                                <span class="relative">
                                    Контакт
                                    <img class="absolute h-auto w-[67px] left-1/2 -translate-x-1/2 top-[110%] opacity-0 invisible group-hover/nav:opacity-100 group-hover/nav:visible group-[&.active]/nav:opacity-100 group-[&.active]/nav:visible transition-all inline-block max-w-none" src="{{ Vite::asset('resources/images/homepage/nav-link-shape.svg')}}" width="88" height="14">
                                </span>
                            </button>
                        </div>
                    @endif

                    

                    {{--<div class="px-5 xl:px-7 hidden min-[370px]:inline-block">
                        <button class="w-full font-bold text-lg md:text-xl text-white min-h-[42px] lg:min-h-[52px] py-2 lg:py-3 px-5 bg-colormain transition-all hover:bg-colormain/80  rounded-md inline-block"  x-data
                        @click='$refs.theEl.scrollIntoView({ behavior: "smooth", block: "nearest", inline: "start" });'
                        >Зачленете се</button>
                    </div>--}}

                    @guest
                        <div class="px-5 lg:px-2.5 xl:px-7 hidden min-[370px]:inline-block">
                            <a href="{{ route('projects') }}" class="w-full font-bold text-lg md:text-xl text-white min-h-[42px] lg:min-h-[52px] py-2 lg:py-3 px-5 bg-colormain transition-all hover:bg-colormain/80  rounded-md inline-block"
                            >Најавете се</a>
                        </div>
                    @endguest

                    @auth
                        @if(auth()->user()->getRoleNames()->implode(', ') == "" || auth()->user()->getRoleNames()->implode(', ') == null)
                            <!-- ako e klient ovde -->
                            {{--<div class="px-5 lg:px-2.5 xl:px-7 hidden min-[370px]:inline-block">
                                <a href="{{ route('dashboard') }}" class="w-full font-bold text-lg md:text-xl text-white min-h-[42px] lg:min-h-[52px] py-2 lg:py-3 px-5 bg-colormain transition-all hover:bg-colormain/80  rounded-md inline-block"
                                >Дашборд</a>
                            </div>--}}
                            {{--@if(auth()->user()->hasStartedInvestments())
                                <div class="px-5 lg:px-2.5 xl:px-7 hidden min-[370px]:inline-block">
                                    <a href="{{ route('started_investments_page') }}" class="w-full font-bold text-lg md:text-xl text-white min-h-[42px] lg:min-h-[52px] py-2 lg:py-3 px-5 bg-colormain transition-all hover:bg-colormain/80  rounded-md inline-block"
                                    >Започнати инвестиции</a>
                                </div>
                            @endif--}}

                            <div class="relative z-10" x-data={openn:false}  x-bind:class="{'z-[60]' : active}"  @click.away="active = false"   >
                                <a href="#" class="group flex group items-center pr-2 sm:pr-6" title="User Profile"  x-on:click="openn = !openn, active = !active" x-bind:class="{'active' : active}" >

                                    @if(Auth::user()->profile_photo_path)
                                                   
                                    <img src="{{asset("storage/".Auth::user()->profile_photo_path)}}" alt="" class="mr-2 md:mr-3 transition-all rounded-full group-hover:ring-1 ring-slate-500 ring-offset-2 h-[30px] sm:h-[38px] md:h-[54px] w-[30px] sm:w-[38px] md:w-[54px] ">
                                    @else 
                                    <img src="{{asset(Auth::user()->profile_photo_url)}}" alt="" class="mr-2 md:mr-3 transition-all rounded-full group-hover:ring-1 ring-slate-500 ring-offset-2 h-[30px] sm:h-[38px] md:h-[54px] w-[30px] sm:w-[38px] md:w-[54px]">
                                    @endif
                                        

                                    <span class="font-medium text-gray-500 text-xs md:text-base text-left leading-none hidden sm:inline-block"><strong class="text-[15px] md:text-[18px] block text-neutral-800 font-medium">{{Auth::user()->name}}</strong>{{Auth::user()->getRoleNames()->first()}}</span>
                                    
                                    <svg width="8" height="6" viewBox="0 0 8 6" fill="none" xmlns="http://www.w3.org/2000/svg" class="absolute right-0 top-1/2 -translate-y-1/2 transition-all duration-150 rotate-0 group-[&.show]:rotate-180">
                                        <path d="M7.74978 0.877274C7.60926 0.737586 7.41917 0.65918 7.22103 0.65918C7.02289 0.65918 6.8328 0.737586 6.69228 0.877274L3.99978 3.53227L1.34478 0.877274C1.20426 0.737586 1.01417 0.65918 0.816028 0.65918C0.617889 0.65918 0.4278 0.737586 0.287278 0.877274C0.216982 0.946996 0.161186 1.02995 0.12311 1.12134C0.0850332 1.21274 0.0654297 1.31077 0.0654297 1.40977C0.0654297 1.50878 0.0850332 1.60681 0.12311 1.69821C0.161186 1.7896 0.216982 1.87255 0.287278 1.94227L3.46728 5.12227C3.537 5.19257 3.61995 5.24837 3.71135 5.28644C3.80274 5.32452 3.90077 5.34412 3.99978 5.34412C4.09879 5.34412 4.19682 5.32452 4.28821 5.28644C4.37961 5.24837 4.46256 5.19257 4.53228 5.12227L7.74978 1.94227C7.82007 1.87255 7.87587 1.7896 7.91395 1.69821C7.95202 1.60681 7.97163 1.50878 7.97163 1.40977C7.97163 1.31077 7.95202 1.21274 7.91395 1.12134C7.87587 1.02995 7.82007 0.946996 7.74978 0.877274Z" fill="#262626"/>
                                    </svg>
                                </a>
                                
                                <div 
                                    x-show="openn"
                                    x-transition:enter="transition ease-out duration-100 bg-white"
                                    x-transition:enter-start="transform -translate-y-6 opacity-0"
                                    x-transition:enter-end="transform translate-y-0 opacity-100"
                                    x-transition:leave="transition ease-in duration-100 bg-transparent"
                                    x-transition:leave-start="transform translate-y-0 opacity-100"
                                    x-transition:leave-end="transform -translate-y-6 opacity-0"
                                    @click.away="openn = false"
                                    
                                    class="absolute top-full right-0 bg-white shadow-lg min-w-full w-[150px] sm:w-[200px] rounded-lg p-3">

                                    <ul class="m-0">

                                        <!--  -->
                                        <li class="pb-2.5">
                                            <a href="{{ route('dashboard') }}" class="@if(Route::is('dashboard')) active @endif block group py-2 pr-2 pl-10 sm:pl-12 text-base md:text-lg relative text-gray-500 leading-tight rounded-lg bg-transparent font-normal transition-all duration-300  hover:bg-blue-50 hover:text-blue-500  focus:bg-blue-50 focus:text-blue-500 hover:font-bold [&.active]:text-blue-500 [&.active]:font-bold [&.active]:bg-blue-50">
                                                <svg width="20" height="22" viewBox="0 0 20 22" fill="none" xmlns="http://www.w3.org/2000/svg" class="fill-[#6B7280] group-hover:fill-blue-500 transition-all duration-300 absolute left-3 top-1/2 -translate-y-1/2 z-10 inline-block group-[&.active]:fill-blue-500 w-4 sm:w-5">
                                                    <path d="M13.7105 11.7101C14.6909 10.9388 15.4065 9.88105 15.7577 8.68407C16.109 7.48709 16.0784 6.21039 15.6703 5.03159C15.2621 3.85279 14.4967 2.83052 13.4806 2.10698C12.4644 1.38344 11.2479 0.994629 10.0005 0.994629C8.75303 0.994629 7.5366 1.38344 6.52041 2.10698C5.50423 2.83052 4.73883 3.85279 4.3307 5.03159C3.92257 6.21039 3.892 7.48709 4.24325 8.68407C4.59449 9.88105 5.31009 10.9388 6.29048 11.7101C4.61056 12.3832 3.14477 13.4995 2.04938 14.94C0.953983 16.3806 0.270048 18.0914 0.070485 19.8901C0.0560396 20.0214 0.0676015 20.1543 0.10451 20.2812C0.141419 20.408 0.202952 20.5264 0.285596 20.6294C0.452504 20.8376 0.695269 20.971 0.960485 21.0001C1.2257 21.0293 1.49164 20.9519 1.69981 20.785C1.90798 20.6181 2.04131 20.3753 2.07049 20.1101C2.29007 18.1553 3.22217 16.3499 4.6887 15.0389C6.15524 13.7279 8.05338 13.0032 10.0205 13.0032C11.9876 13.0032 13.8857 13.7279 15.3523 15.0389C16.8188 16.3499 17.7509 18.1553 17.9705 20.1101C17.9977 20.3558 18.1149 20.5828 18.2996 20.7471C18.4843 20.9115 18.7233 21.0016 18.9705 21.0001H19.0805C19.3426 20.97 19.5822 20.8374 19.747 20.6314C19.9119 20.4253 19.9886 20.1625 19.9605 19.9001C19.76 18.0963 19.0724 16.3811 17.9713 14.9383C16.8703 13.4955 15.3974 12.3796 13.7105 11.7101V11.7101ZM10.0005 11.0001C9.20936 11.0001 8.436 10.7655 7.7782 10.326C7.12041 9.88648 6.60772 9.26176 6.30497 8.53086C6.00222 7.79995 5.923 6.99569 6.07734 6.21976C6.23168 5.44384 6.61265 4.73111 7.17206 4.1717C7.73147 3.61229 8.4442 3.23132 9.22012 3.07698C9.99605 2.92264 10.8003 3.00186 11.5312 3.30461C12.2621 3.60736 12.8868 4.12005 13.3264 4.77784C13.7659 5.43564 14.0005 6.209 14.0005 7.00012C14.0005 8.06099 13.5791 9.07841 12.8289 9.82855C12.0788 10.5787 11.0614 11.0001 10.0005 11.0001Z"/>
                                                </svg>
                                                Дашборд
                                            </a>
                                        </li>

                                        @if(auth()->user()->hasStartedInvestments())
                                            <li class="pb-2.5">
                                                <a href="{{ route('started_investments_page') }}" class="@if(Route::is('started_investments_page')) active @endif block group py-2 pr-2 pl-10 sm:pl-12 text-base md:text-lg relative text-gray-500 leading-tight rounded-lg bg-transparent font-normal transition-all duration-300  hover:bg-blue-50 hover:text-blue-500  focus:bg-blue-50 focus:text-blue-500 hover:font-bold [&.active]:text-blue-500 [&.active]:font-bold [&.active]:bg-blue-50">
                                                    <svg width="20" height="22" viewBox="0 0 20 22" fill="none" xmlns="http://www.w3.org/2000/svg" class="fill-[#6B7280] group-hover:fill-blue-500 transition-all duration-300 absolute left-3 top-1/2 -translate-y-1/2 z-10 inline-block group-[&.active]:fill-blue-500 w-4 sm:w-5">
                                                        <path d="M13.7105 11.7101C14.6909 10.9388 15.4065 9.88105 15.7577 8.68407C16.109 7.48709 16.0784 6.21039 15.6703 5.03159C15.2621 3.85279 14.4967 2.83052 13.4806 2.10698C12.4644 1.38344 11.2479 0.994629 10.0005 0.994629C8.75303 0.994629 7.5366 1.38344 6.52041 2.10698C5.50423 2.83052 4.73883 3.85279 4.3307 5.03159C3.92257 6.21039 3.892 7.48709 4.24325 8.68407C4.59449 9.88105 5.31009 10.9388 6.29048 11.7101C4.61056 12.3832 3.14477 13.4995 2.04938 14.94C0.953983 16.3806 0.270048 18.0914 0.070485 19.8901C0.0560396 20.0214 0.0676015 20.1543 0.10451 20.2812C0.141419 20.408 0.202952 20.5264 0.285596 20.6294C0.452504 20.8376 0.695269 20.971 0.960485 21.0001C1.2257 21.0293 1.49164 20.9519 1.69981 20.785C1.90798 20.6181 2.04131 20.3753 2.07049 20.1101C2.29007 18.1553 3.22217 16.3499 4.6887 15.0389C6.15524 13.7279 8.05338 13.0032 10.0205 13.0032C11.9876 13.0032 13.8857 13.7279 15.3523 15.0389C16.8188 16.3499 17.7509 18.1553 17.9705 20.1101C17.9977 20.3558 18.1149 20.5828 18.2996 20.7471C18.4843 20.9115 18.7233 21.0016 18.9705 21.0001H19.0805C19.3426 20.97 19.5822 20.8374 19.747 20.6314C19.9119 20.4253 19.9886 20.1625 19.9605 19.9001C19.76 18.0963 19.0724 16.3811 17.9713 14.9383C16.8703 13.4955 15.3974 12.3796 13.7105 11.7101V11.7101ZM10.0005 11.0001C9.20936 11.0001 8.436 10.7655 7.7782 10.326C7.12041 9.88648 6.60772 9.26176 6.30497 8.53086C6.00222 7.79995 5.923 6.99569 6.07734 6.21976C6.23168 5.44384 6.61265 4.73111 7.17206 4.1717C7.73147 3.61229 8.4442 3.23132 9.22012 3.07698C9.99605 2.92264 10.8003 3.00186 11.5312 3.30461C12.2621 3.60736 12.8868 4.12005 13.3264 4.77784C13.7659 5.43564 14.0005 6.209 14.0005 7.00012C14.0005 8.06099 13.5791 9.07841 12.8289 9.82855C12.0788 10.5787 11.0614 11.0001 10.0005 11.0001Z"/>
                                                    </svg>
                                                    Започнати инвестиции
                                                </a>
                                            </li>
                                        @endif
                                        <!--  -->


                                        <li class="pb-2.5">
                                            <a href="{{ route('profile.show') }}" class="@if(Route::is('profile.show')) active @endif block group py-2 pr-2 pl-10 sm:pl-12 text-base md:text-lg relative text-gray-500 leading-tight rounded-lg bg-transparent font-normal transition-all duration-300  hover:bg-blue-50 hover:text-blue-500  focus:bg-blue-50 focus:text-blue-500 hover:font-bold [&.active]:text-blue-500 [&.active]:font-bold [&.active]:bg-blue-50">
                                                <svg width="20" height="22" viewBox="0 0 20 22" fill="none" xmlns="http://www.w3.org/2000/svg" class="fill-[#6B7280] group-hover:fill-blue-500 transition-all duration-300 absolute left-3 top-1/2 -translate-y-1/2 z-10 inline-block group-[&.active]:fill-blue-500 w-4 sm:w-5">
                                                    <path d="M13.7105 11.7101C14.6909 10.9388 15.4065 9.88105 15.7577 8.68407C16.109 7.48709 16.0784 6.21039 15.6703 5.03159C15.2621 3.85279 14.4967 2.83052 13.4806 2.10698C12.4644 1.38344 11.2479 0.994629 10.0005 0.994629C8.75303 0.994629 7.5366 1.38344 6.52041 2.10698C5.50423 2.83052 4.73883 3.85279 4.3307 5.03159C3.92257 6.21039 3.892 7.48709 4.24325 8.68407C4.59449 9.88105 5.31009 10.9388 6.29048 11.7101C4.61056 12.3832 3.14477 13.4995 2.04938 14.94C0.953983 16.3806 0.270048 18.0914 0.070485 19.8901C0.0560396 20.0214 0.0676015 20.1543 0.10451 20.2812C0.141419 20.408 0.202952 20.5264 0.285596 20.6294C0.452504 20.8376 0.695269 20.971 0.960485 21.0001C1.2257 21.0293 1.49164 20.9519 1.69981 20.785C1.90798 20.6181 2.04131 20.3753 2.07049 20.1101C2.29007 18.1553 3.22217 16.3499 4.6887 15.0389C6.15524 13.7279 8.05338 13.0032 10.0205 13.0032C11.9876 13.0032 13.8857 13.7279 15.3523 15.0389C16.8188 16.3499 17.7509 18.1553 17.9705 20.1101C17.9977 20.3558 18.1149 20.5828 18.2996 20.7471C18.4843 20.9115 18.7233 21.0016 18.9705 21.0001H19.0805C19.3426 20.97 19.5822 20.8374 19.747 20.6314C19.9119 20.4253 19.9886 20.1625 19.9605 19.9001C19.76 18.0963 19.0724 16.3811 17.9713 14.9383C16.8703 13.4955 15.3974 12.3796 13.7105 11.7101V11.7101ZM10.0005 11.0001C9.20936 11.0001 8.436 10.7655 7.7782 10.326C7.12041 9.88648 6.60772 9.26176 6.30497 8.53086C6.00222 7.79995 5.923 6.99569 6.07734 6.21976C6.23168 5.44384 6.61265 4.73111 7.17206 4.1717C7.73147 3.61229 8.4442 3.23132 9.22012 3.07698C9.99605 2.92264 10.8003 3.00186 11.5312 3.30461C12.2621 3.60736 12.8868 4.12005 13.3264 4.77784C13.7659 5.43564 14.0005 6.209 14.0005 7.00012C14.0005 8.06099 13.5791 9.07841 12.8289 9.82855C12.0788 10.5787 11.0614 11.0001 10.0005 11.0001Z"/>
                                                </svg>
                                                Профил
                                            </a>
                                        </li>

                                        <li class="pb-0">
                                            <form method="POST" action="{{ route('logout') }}" x-data>
                                                @csrf
                                                <a href="{{ route('logout') }}" @click.prevent="$root.submit();" class="block group py-2 pr-2 pl-10 sm:pl-12 text-base md:text-lg relative text-gray-500 leading-tight rounded-lg bg-transparent font-normal transition-all duration-300  hover:bg-blue-50 hover:text-blue-500  focus:bg-blue-50 focus:text-blue-500 hover:font-bold">
                                                    <svg width="16" height="20" viewBox="0 0 16 20" fill="none" xmlns="http://www.w3.org/2000/svg" class="fill-[#6B7280] group-hover:fill-blue-500 transition-all duration-300 absolute left-3.5 top-1/2 -translate-y-1/2 z-10 inline-block w-3.5 sm:w-4">
                                                        <path d="M0 10C0 10.2652 0.105357 10.5196 0.292893 10.7071C0.48043 10.8946 0.734784 11 1 11H8.59L6.29 13.29C6.19627 13.383 6.12188 13.4936 6.07111 13.6154C6.02034 13.7373 5.9942 13.868 5.9942 14C5.9942 14.132 6.02034 14.2627 6.07111 14.3846C6.12188 14.5064 6.19627 14.617 6.29 14.71C6.38296 14.8037 6.49356 14.8781 6.61542 14.9289C6.73728 14.9797 6.86799 15.0058 7 15.0058C7.13201 15.0058 7.26272 14.9797 7.38458 14.9289C7.50644 14.8781 7.61704 14.8037 7.71 14.71L11.71 10.71C11.801 10.6149 11.8724 10.5028 11.92 10.38C12.02 10.1365 12.02 9.86346 11.92 9.62C11.8724 9.49725 11.801 9.3851 11.71 9.29L7.71 5.29C7.61676 5.19676 7.50607 5.1228 7.38425 5.07234C7.26243 5.02188 7.13186 4.99591 7 4.99591C6.86814 4.99591 6.73757 5.02188 6.61575 5.07234C6.49393 5.1228 6.38324 5.19676 6.29 5.29C6.19676 5.38324 6.1228 5.49393 6.07234 5.61575C6.02188 5.73757 5.99591 5.86814 5.99591 6C5.99591 6.13186 6.02188 6.26243 6.07234 6.38425C6.1228 6.50607 6.19676 6.61676 6.29 6.71L8.59 9H1C0.734784 9 0.48043 9.10536 0.292893 9.29289C0.105357 9.48043 0 9.73478 0 10V10ZM13 0H3C2.20435 0 1.44129 0.316071 0.87868 0.87868C0.316071 1.44129 0 2.20435 0 3V6C0 6.26522 0.105357 6.51957 0.292893 6.70711C0.48043 6.89464 0.734784 7 1 7C1.26522 7 1.51957 6.89464 1.70711 6.70711C1.89464 6.51957 2 6.26522 2 6V3C2 2.73478 2.10536 2.48043 2.29289 2.29289C2.48043 2.10536 2.73478 2 3 2H13C13.2652 2 13.5196 2.10536 13.7071 2.29289C13.8946 2.48043 14 2.73478 14 3V17C14 17.2652 13.8946 17.5196 13.7071 17.7071C13.5196 17.8946 13.2652 18 13 18H3C2.73478 18 2.48043 17.8946 2.29289 17.7071C2.10536 17.5196 2 17.2652 2 17V14C2 13.7348 1.89464 13.4804 1.70711 13.2929C1.51957 13.1054 1.26522 13 1 13C0.734784 13 0.48043 13.1054 0.292893 13.2929C0.105357 13.4804 0 13.7348 0 14V17C0 17.7956 0.316071 18.5587 0.87868 19.1213C1.44129 19.6839 2.20435 20 3 20H13C13.7956 20 14.5587 19.6839 15.1213 19.1213C15.6839 18.5587 16 17.7956 16 17V3C16 2.20435 15.6839 1.44129 15.1213 0.87868C14.5587 0.316071 13.7956 0 13 0Z"/>
                                                    </svg>
                                                    Одјавете се
                                                </a>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!--  -->
                        @else
                            <div class="px-5 lg:px-2.5 xl:px-7 hidden min-[370px]:inline-block">
                                <a href="{{ route('dashboard') }}" class="w-full font-bold text-lg md:text-xl text-white min-h-[42px] lg:min-h-[52px] py-2 lg:py-3 px-5 bg-colormain transition-all hover:bg-colormain/80  rounded-md inline-block"
                                >Админ панел</a>
                            </div>
                        @endif
                    @endauth

                </div>
            </div>
        </div>
    </div>
</header>

<div class="group-[&.overflow-hidden]/togglemenu:top-[60px] transition-all fixed w-full z-[450] -top-full md:group-[&.overflow-hidden]/togglemenu:top-[75px] lg:group-[&.overflow-hidden]/togglemenu:top-[90px] left-0 h-[calc(100vh_-_60px)] md:h-[calc(100vh_-_75px)] lg:h-[calc(100vh_-_90px)] bg-white overflow-y-auto">
    <div class="flex flex-col w-full">
        <div class="border-b border-black/50 w-full block">
            <a href="#" class="text-center block w-full px-3 py-4 text-colormain hover:text-white bg-white hover:bg-colormain text-lg [&.active]:bg-colormain [&.active]:font-bold [&.active]:text-white transition-all" x-data @click="window.scrollTo({top: 0, behavior: 'smooth'}), togglemenu = !togglemenu, active = !active">Почетна</a>
        </div>
        <div class="border-b border-black/50 w-full block">
            <a href="#" class="text-center block w-full px-3 py-4 text-colormain hover:text-white bg-white hover:bg-colormain text-lg [&.active]:bg-colormain [&.active]:font-bold [&.active]:text-white transition-all" @click='$refs.theAbout.scrollIntoView({ behavior: "smooth", block: "nearest", inline: "nearest" }), togglemenu = !togglemenu, active = !active'>За нас</a>
        </div>
        <div class="border-b border-black/50 w-full block">
            <a href="#" class="text-center block w-full px-3 py-4 text-colormain hover:text-white bg-white hover:bg-colormain text-lg [&.active]:bg-colormain [&.active]:font-bold [&.active]:text-white transition-all" @click='$refs.theSteps.scrollIntoView({ behavior: "smooth", block: "nearest", inline: "nearest" }), togglemenu = !togglemenu, active = !active'>Како работи</a>
        </div>
        <div class="border-b border-black/50 w-full block">
            <a href="#" class="text-center block w-full px-3 py-4 text-colormain hover:text-white bg-white hover:bg-colormain text-lg [&.active]:bg-colormain [&.active]:font-bold [&.active]:text-white transition-all" @click='$refs.theProjects.scrollIntoView({ behavior: "smooth", block: "nearest", inline: "nearest" }), togglemenu = !togglemenu, active = !active'>Проекти</a>
        </div>

        <div class="border-b border-black/50 w-full block">
            <a href="#" class="text-center block w-full px-3 py-4 text-colormain hover:text-white bg-white hover:bg-colormain text-lg [&.active]:bg-colormain [&.active]:font-bold [&.active]:text-white transition-all" @click='$refs.theCalc.scrollIntoView({ behavior: "smooth", block: "nearest", inline: "nearest" }), togglemenu = !togglemenu, active = !active'>Калкулатор</a>
        </div>
        <div class="border-b border-black/50 w-full block">
            <a href="#" class="text-center block w-full px-3 py-4 text-colormain hover:text-white bg-white hover:bg-colormain text-lg [&.active]:bg-colormain [&.active]:font-bold [&.active]:text-white transition-all" @click='$refs.theFooter.scrollIntoView({ behavior: "smooth", block: "nearest", inline: "nearest" }), togglemenu = !togglemenu, active = !active'>Контакт</a>
        </div>

        @guest
        <div class="border-b border-black/50 w-full block min-[370px]:hidden">
            <a href="{{ route('projects') }}" class="text-center block w-full px-3 py-4 text-colormain hover:text-white bg-coloryellow hover:bg-colormain text-lg [&.active]:bg-colormain [&.active]:font-bold [&.active]:text-white transition-all" @click='$refs.theEl.scrollIntoView({ behavior: "smooth", block: "nearest", inline: "start" }), togglemenu = !togglemenu, active = !active'>Најавете се</a>
        </div>
        @endguest

        @auth
            @if(auth()->user()->getRoleNames()->implode(', ') == "" || auth()->user()->getRoleNames()->implode(', ') == null)

            <div class="border-b border-black/50 w-full block min-[370px]:hidden">
                <a href="{{ route('dashboard') }}" class="text-center block w-full px-3 py-4 text-colormain hover:text-white bg-coloryellow hover:bg-colormain text-lg [&.active]:bg-colormain [&.active]:font-bold [&.active]:text-white transition-all" @click='$refs.theEl.scrollIntoView({ behavior: "smooth", block: "nearest", inline: "start" }), togglemenu = !togglemenu, active = !active'>НАдмин панел</a>
            </div>

            @else
                <a href="{{ route('dashboard') }}" class="text-center block w-full px-3 py-4 text-colormain hover:text-white bg-coloryellow hover:bg-colormain text-lg [&.active]:bg-colormain [&.active]:font-bold [&.active]:text-white transition-all" @click='$refs.theEl.scrollIntoView({ behavior: "smooth", block: "nearest", inline: "start" }), togglemenu = !togglemenu, active = !active'>НАдмин панел</a>
            @endif
        @endauth
    </div>
</div>