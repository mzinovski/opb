<footer x-ref="theFooter" class="w-full block relative bg-colormain text-white pb-5 pt-5">
    <div class="px-5 xl:px-6 w-[1440px] max-w-full block mx-auto relative z-20">
        <p class="mb-10 text-center lg:text-start">
            <a href="#" class="inline-block">
                <img src="{{ Vite::asset('resources/images/logos/logo-smart-invest-yellow.svg')}}" alt="Smart Invest Group" width="230" height="15">
            </a>
        </p>

        <div class="flex flex-row flex-wrap justify-center xl:justify-start items-start lg:items-start -mx-4">
            <div class="px-4 w-full sm:w-1/2 lg:w-1/3 xl:w-3/12 text-center lg:text-left">
                <p class="text-lg font-bold mb-1">Smart Invest</p>
                <ul class="pl-0">
                    <li class="py-2">
                        <button class="text-white/70 transition-all hover:text-white font-medium text-lg md:text-xl no-undeline hover:underline underline-offset-4" x-data @click="window.scrollTo({top: 0, behavior: 'smooth'})">Почетна</button>
                    </li>
                    <li class="py-2">
                        <button class="text-white/70 transition-all hover:text-white font-medium text-lg md:text-xl no-undeline hover:underline underline-offset-4" @click='$refs.theAbout.scrollIntoView({ behavior: "smooth", block: "start", inline: "start" });'>За Нас</button>
                    </li>
                    <li class="py-2">
                        <button class="text-white/70 transition-all hover:text-white font-medium text-lg md:text-xl no-undeline hover:underline underline-offset-4" @click='$refs.theSteps.scrollIntoView({ behavior: "smooth", block: "start", inline: "start" });'>Како работи</button>
                    </li>
                    <li class="py-2">
                        <button class="text-white/70 transition-all hover:text-white font-medium text-lg md:text-xl no-undeline hover:underline underline-offset-4" @click='$refs.theProjects.scrollIntoView({ behavior: "smooth", block: "start", inline: "start" });'>Проекти</button>
                    </li>
                    <li class="py-2">
                        <button class="text-white/70 transition-all hover:text-white font-medium text-lg md:text-xl no-undeline hover:underline underline-offset-4" @click='$refs.theFooter.scrollIntoView({ behavior: "smooth", block: "nearest", inline: "nearest" });'>Контакт</button>
                    </li>
                </ul>
            </div>
            <div class="px-4 w-full sm:w-1/2 lg:w-1/3 xl:w-2/12 pt-10 sm:pt-0 hidden text-center lg:text-left">
                <p class="text-lg font-bold mb-1">Smart Invest</p>
                <ul class="pl-0">
                    <li class="py-2">
                        <a href="#" class="text-white/70 transition-all hover:text-white font-medium text-lg md:text-xl no-undeline hover:underline underline-offset-4">Блог</a>
                    </li>
                    <li class="py-2">
                        <a href="#" class="text-white/70 transition-all hover:text-white font-medium text-lg md:text-xl no-undeline hover:underline underline-offset-4">FAQ</a>
                    </li>
                    <li class="py-2">
                        <a href="#" class="text-white/70 transition-all hover:text-white font-medium text-lg md:text-xl no-undeline hover:underline underline-offset-4">Како работи</a>
                    </li>
                </ul>
            </div>
            <div class="px-4 w-full sm:w-1/2 lg:w-1/3 xl:w-5/12 pt-10 sm:pt-0 text-center lg:text-left">
                <p class="text-lg font-bold mb-1">Контакт</p>
                <div class="px-0 min-[420px]:px-[20%] sm:px-0">
                    <ul class="pl-0">
                        <li class="py-2 pl-10 relative text-left">
                            <svg class="absolute left-0 top-3 h-auto w-auto max-w-[30px]" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8.75 10C8.75 8.20507 10.2051 6.75 12 6.75C13.7949 6.75 15.25 8.20507 15.25 10C15.25 11.7949 13.7949 13.25 12 13.25C10.2051 13.25 8.75 11.7949 8.75 10Z" fill="white"/>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M3.77354 8.87739C4.11718 4.70845 7.60097 1.5 11.7841 1.5H12.216C16.3991 1.5 19.8829 4.70845 20.2265 8.87739C20.4115 11.122 19.7182 13.3508 18.2925 15.0943L13.4995 20.9561C12.7245 21.9039 11.2756 21.9039 10.5006 20.9561L5.70752 15.0943C4.28187 13.3508 3.58852 11.122 3.77354 8.87739ZM12 5.25C9.37665 5.25 7.25 7.37665 7.25 10C7.25 12.6234 9.37665 14.75 12 14.75C14.6234 14.75 16.75 12.6234 16.75 10C16.75 7.37665 14.6234 5.25 12 5.25Z" fill="white"/>
                                </svg>
                            <a href="https://maps.app.goo.gl/kH7PRxbAS87a3Zx47" target="_blank" class="text-white/70 transition-all hover:text-white font-medium text-lg md:text-xl no-undeline hover:underline underline-offset-4">Митрополит Теодосиј Гологанов бр.60Б,<br>1000 Скопје</a>
                        </li>
                        <li class="py-2 pl-10 relative text-left">
                            <svg class="absolute left-0 top-3 h-auto w-auto max-w-[30px]" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M5.00004 9.86029C6.91644 14.0342 10.3264 17.3527 14.566 19.1517L15.2456 19.4545C16.8004 20.1472 18.6282 19.6209 19.5765 18.2074L20.4646 16.8837C20.7533 16.4533 20.6654 15.8737 20.262 15.5483L17.2502 13.1185C16.8078 12.7616 16.1573 12.8447 15.8189 13.3014L14.8871 14.5586C12.4963 13.3793 10.5553 11.4382 9.37595 9.04744L10.6332 8.11572C11.0899 7.77729 11.173 7.12678 10.8161 6.6844L8.38623 3.67245C8.06088 3.26917 7.48138 3.18121 7.05101 3.46977L5.71817 4.36347C4.29582 5.31718 3.77244 7.16003 4.48118 8.71898L4.99926 9.85859L5.00004 9.86029Z" fill="white"/>
                            </svg>
                            <a href="tel:0038970314493" class="text-white/70 transition-all hover:text-white font-medium text-lg md:text-xl no-undeline hover:underline underline-offset-4">+38970314493</a>
                        </li>
                        <li class="py-2 pl-10 relative text-left">
                            <svg class="absolute left-0 top-3 h-auto w-auto max-w-[30px]" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M7.28949 4.90749C10.4241 4.635 13.5765 4.635 16.7111 4.90749L18.2214 5.03877C19.2267 5.12617 20.0878 5.72584 20.534 6.58361C20.591 6.69335 20.5483 6.82621 20.4431 6.89132L14.1771 10.7702C12.8333 11.6022 11.1387 11.6196 9.77802 10.8156L3.4702 7.0882C3.36829 7.02798 3.32151 6.90402 3.36744 6.79492C3.77559 5.82536 4.69322 5.13318 5.77925 5.03877L7.28949 4.90749Z" fill="white"/>
                                <path d="M3.3623 8.76676C3.20634 8.6746 3.00734 8.77377 2.98916 8.95402C2.73542 11.4697 2.79683 14.0091 3.17339 16.5132C3.3719 17.8333 4.44931 18.8454 5.77926 18.961L7.28949 19.0923C10.4241 19.3647 13.5765 19.3647 16.7111 19.0923L18.2214 18.961C19.5513 18.8454 20.6287 17.8333 20.8272 16.5132C21.2148 13.9361 21.2685 11.3216 20.9885 8.73415C20.9688 8.55264 20.7665 8.45529 20.6112 8.55139L14.9667 12.0456C13.1485 13.1712 10.8559 13.1948 9.01493 12.1069L3.3623 8.76676Z" fill="white"/>
                                </svg>
                            <a href="mailto:contact@sigroup.mk" class="text-white/70 transition-all hover:text-white font-medium text-lg md:text-xl no-undeline hover:underline underline-offset-4">contact@sigroup.mk</a>
                        </li>
                        
                    </ul>
                </div>
                
                <div class="block pt-5">
                    <ul class="mb-0 flex flex-row -mx-2 items-center justify-center md:justify-start">
                        <li class="px-2">
                            <a href="https://www.facebook.com/SmartInvestGroupMk" target="_blank" class="group w-10 h-10 rounded-full bg-[#2A3466] flex justify-center items-center hover:bg-white transition-all duration-300">
                                <svg  class="fill-[#F1F1F1] group-hover:fill-colormain transition-all duration-300" width="12" height="24" viewBox="0 0 12 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M11.2137 12.9718L11.8356 8.87666H7.94521V6.22035C7.94521 5.09972 8.48767 4.00676 10.2301 4.00676H12V0.520351C12 0.520351 10.3945 0.243652 8.86027 0.243652C5.6548 0.243652 3.56164 2.20545 3.56164 5.7555V8.87666H0V12.9718H3.56164V22.8721C4.27671 22.9855 5.00822 23.0437 5.75342 23.0437C6.49863 23.0437 7.23014 22.9855 7.94521 22.8721V12.9718H11.2137Z"/>
                                </svg>
                            </a>
                        </li>

                        <li class="px-2 hidden">
                            <a href="" class="group w-10 h-10 rounded-full bg-[#2A3466] flex justify-center items-center hover:bg-white transition-all duration-300">
                                <svg class="fill-[#F1F1F1] group-hover:fill-colormain transition-all duration-300" width="24" height="20" viewBox="0 0 24 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M21.0566 4.82421C21.0659 5.03541 21.0659 5.23701 21.0659 5.44821C21.0752 11.8514 16.3707 19.2435 7.76744 19.2435C5.22999 19.2435 2.73885 18.4851 0.599609 17.0643C0.97004 17.1123 1.34047 17.1315 1.7109 17.1315C3.81309 17.1315 5.85972 16.4018 7.5174 15.0482C5.51707 15.0098 3.75753 13.6562 3.14632 11.6786C3.85014 11.8226 4.57248 11.7938 5.25777 11.5922C3.08149 11.1506 1.51642 9.16343 1.50716 6.84982C1.50716 6.83062 1.50716 6.81142 1.50716 6.79222C2.15542 7.16662 2.88702 7.37782 3.62788 7.39702C1.58125 5.97621 0.942258 3.14421 2.1832 0.926598C4.56322 3.96021 8.06378 5.79381 11.8237 5.99541C11.444 4.31541 11.9626 2.549 13.1757 1.3586C15.0557 -0.475006 18.0191 -0.379006 19.7972 1.5698C20.8436 1.3586 21.8531 0.955398 22.7699 0.388997C22.418 1.5122 21.6864 2.4626 20.714 3.06741C21.6401 2.95221 22.5476 2.693 23.3996 2.309C22.7699 3.28821 21.9735 4.13301 21.0566 4.82421Z"/>
                                </svg>
                            </a>
                        </li>

                        <li class="px-2 ">
                            <a href="https://www.instagram.com/smartinvestgroupmk/" target="_blank" class="group w-10 h-10 rounded-full bg-[#2A3466] flex justify-center items-center hover:bg-white transition-all duration-300">
                                <svg class="fill-[#F1F1F1] group-hover:fill-colormain transition-all duration-300" width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M23.933 7.6956C23.8754 6.41777 23.669 5.54348 23.3761 4.77966C23.0689 3.99183 22.6608 3.3193 21.9934 2.65636C21.3261 1.99343 20.6588 1.5755 19.8714 1.27286C19.1081 0.97502 18.2343 0.773258 16.9572 0.715612C15.6754 0.657966 15.2673 0.643555 12.0122 0.643555C8.7524 0.643555 8.34431 0.657966 7.06726 0.715612C5.7902 0.773258 4.91643 0.979824 4.15308 1.27286C3.36092 1.5803 2.68878 1.98863 2.02625 2.65636C1.36372 3.3241 0.946035 3.99183 0.643574 4.77966C0.350716 5.54348 0.144274 6.41777 0.0866628 7.6956C0.0290513 8.97822 0.0146484 9.38655 0.0146484 12.6436C0.0146484 15.9054 0.0290513 16.3137 0.0866628 17.5915C0.144274 18.8693 0.350716 19.7436 0.643574 20.5074C0.950836 21.2953 1.35892 21.9678 2.02625 22.6307C2.68878 23.2985 3.36092 23.7116 4.14827 24.0143C4.91163 24.3121 5.7854 24.5139 7.06246 24.5715C8.34431 24.6291 8.7524 24.6436 12.0074 24.6436C15.2673 24.6436 15.6754 24.6291 16.9524 24.5715C18.2295 24.5139 19.1033 24.3073 19.8666 24.0143C20.654 23.7068 21.3261 23.2985 21.9886 22.6307C22.6512 21.963 23.0689 21.2953 23.3713 20.5074C23.669 19.7436 23.8706 18.8693 23.9282 17.5915C23.9858 16.3089 24.0002 15.9006 24.0002 12.6436C24.0002 9.38655 23.9906 8.97342 23.933 7.6956ZM21.7774 17.4954C21.7246 18.6676 21.5278 19.3065 21.3645 19.7244C21.1485 20.2817 20.8844 20.6852 20.4619 21.1079C20.0395 21.5307 19.641 21.7853 19.0793 22.011C18.6568 22.1744 18.0182 22.3713 16.8516 22.4242C15.589 22.4818 15.2097 22.4962 12.0026 22.4962C8.7956 22.4962 8.41633 22.4818 7.15368 22.4242C5.98224 22.3713 5.34371 22.1744 4.92603 22.011C4.36912 21.7949 3.96584 21.5307 3.54335 21.1079C3.12087 20.6852 2.86642 20.2865 2.64077 19.7244C2.47754 19.3017 2.2807 18.6628 2.22789 17.4954C2.17028 16.232 2.15588 15.8525 2.15588 12.6436C2.15588 9.43459 2.17028 9.05508 2.22789 7.79167C2.2807 6.61954 2.47754 5.98062 2.64077 5.56269C2.85682 5.00544 3.12087 4.60192 3.54335 4.17918C3.96584 3.75645 4.36432 3.50184 4.92603 3.27606C5.34851 3.11273 5.98704 2.91577 7.15368 2.86293C8.41633 2.80528 8.7956 2.79087 12.0026 2.79087C15.2097 2.79087 15.589 2.80528 16.8516 2.86293C18.0231 2.91577 18.6616 3.11273 19.0793 3.27606C19.6362 3.49223 20.0395 3.75645 20.4619 4.17918C20.8844 4.60192 21.1389 5.00064 21.3645 5.56269C21.5278 5.98543 21.7246 6.62434 21.7774 7.79167C21.835 9.05508 21.8494 9.43459 21.8494 12.6436C21.8494 15.8525 21.8302 16.232 21.7774 17.4954Z"/>
                                    <path d="M12.0027 6.47542C8.59401 6.47542 5.83826 9.23763 5.83826 12.6436C5.83826 16.0543 8.59881 18.8117 12.0027 18.8117C15.4066 18.8117 18.1671 16.0447 18.1671 12.6436C18.1671 9.23283 15.4114 6.47542 12.0027 6.47542ZM12.0027 16.6452C9.79425 16.6452 8.00349 14.8533 8.00349 12.6436C8.00349 10.4338 9.79425 8.64195 12.0027 8.64195C14.2111 8.64195 16.0019 10.4338 16.0019 12.6436C16.0019 14.8533 14.2111 16.6452 12.0027 16.6452Z"/>
                                    <path d="M18.4071 7.67638C19.2026 7.67638 19.8474 7.03115 19.8474 6.23523C19.8474 5.4393 19.2026 4.79408 18.4071 4.79408C17.6117 4.79408 16.9669 5.4393 16.9669 6.23523C16.9669 7.03115 17.6117 7.67638 18.4071 7.67638Z"/>
                                    <path d="M0 12.6436C0 15.9054 0.0144029 16.3137 0.0720144 17.5915C0.129626 18.8693 0.336067 19.7436 0.628926 20.5074C0.936187 21.2953 1.34427 21.9678 2.0116 22.6307C2.67413 23.2937 3.34627 23.7116 4.13363 24.0143C4.89698 24.3121 5.77075 24.5139 7.04781 24.5715C8.32967 24.6291 8.73775 24.6436 11.9928 24.6436C15.2527 24.6436 15.6607 24.6291 16.9378 24.5715C18.2148 24.5139 19.0886 24.3073 19.852 24.0143C20.6393 23.7068 21.3115 23.2985 21.974 22.6307C22.6365 21.9678 23.0542 21.2953 23.3567 20.5074C23.6543 19.7436 23.856 18.8693 23.9136 17.5915C23.9712 16.3089 23.9856 15.9006 23.9856 12.6436C23.9856 9.38175 23.9712 8.97342 23.9136 7.6956C23.856 6.41777 23.6495 5.54348 23.3567 4.77966C23.0494 3.99183 22.6413 3.3193 21.974 2.65636C21.3163 1.98863 20.6441 1.5755 19.8568 1.27286C19.0934 0.97502 18.2196 0.773258 16.9426 0.715612C15.6607 0.657966 15.2526 0.643555 11.9976 0.643555C8.73775 0.643555 8.32967 0.657966 7.05261 0.715612C5.77555 0.773258 4.90178 0.979824 4.13843 1.27286C3.35107 1.5803 2.67894 1.98863 2.0164 2.65636C1.35387 3.3241 0.936187 3.99183 0.633727 4.77966C0.336067 5.54348 0.129626 6.41777 0.0720144 7.6956C0.0144029 8.97342 0 9.38175 0 12.6436ZM2.16523 12.6436C2.16523 9.43939 2.17964 9.05508 2.23725 7.79167C2.29006 6.61954 2.4869 5.98062 2.65013 5.56269C2.86617 5.00544 3.13023 4.60192 3.55271 4.17918C3.9752 3.75645 4.37367 3.50184 4.93539 3.27606C5.35787 3.11273 5.9964 2.91577 7.16303 2.86293C8.42568 2.80528 8.80496 2.79087 12.012 2.79087C15.219 2.79087 15.5983 2.80528 16.861 2.86293C18.0324 2.91577 18.6709 3.11273 19.0886 3.27606C19.6455 3.49223 20.0488 3.75645 20.4713 4.17918C20.8938 4.60192 21.1482 5.00064 21.3739 5.56269C21.5371 5.98543 21.7339 6.62434 21.7868 7.79167C21.8444 9.05508 21.8588 9.43459 21.8588 12.6436C21.8588 15.8525 21.8444 16.232 21.7868 17.4954C21.7339 18.6676 21.5371 19.3065 21.3739 19.7244C21.1578 20.2817 20.8938 20.6852 20.4713 21.1079C20.0488 21.5307 19.6503 21.7853 19.0886 22.011C18.6661 22.1744 18.0276 22.3713 16.861 22.4242C15.5983 22.4818 15.219 22.4962 12.012 22.4962C8.80496 22.4962 8.42568 22.4818 7.16303 22.4242C5.9916 22.3713 5.35307 22.1744 4.93539 22.011C4.37848 21.7949 3.9752 21.5307 3.55271 21.1079C3.13023 20.6852 2.87578 20.2865 2.65013 19.7244C2.4869 19.3017 2.29006 18.6628 2.23725 17.4954C2.17483 16.232 2.16523 15.8477 2.16523 12.6436Z"/>
                                </svg>
                                    
                            </a>
                        </li>

                        <li class="px-2">
                            <a href="https://www.linkedin.com/company/smart-invest-group/" target="_blank" class="group w-10 h-10 rounded-full bg-[#2A3466] flex justify-center items-center hover:bg-white transition-all duration-300">
                                <svg class="fill-[#F1F1F1] group-hover:fill-colormain transition-all duration-300" width="22" height="21" viewBox="0 0 22 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0.535156 2.96679C0.535156 2.29337 0.770853 1.73782 1.24223 1.30012C1.7136 0.862403 2.32641 0.643555 3.08061 0.643555C3.82136 0.643555 4.42067 0.859029 4.87859 1.29002C5.34996 1.73446 5.58566 2.31357 5.58566 3.02739C5.58566 3.67386 5.35671 4.21256 4.89879 4.64355C4.42742 5.088 3.80788 5.31022 3.04021 5.31022H3.02C2.27926 5.31022 1.67994 5.088 1.22202 4.64355C0.764106 4.19911 0.535156 3.64018 0.535156 2.96679ZM0.797783 20.6436V7.14861H5.28263V20.6436H0.797783ZM7.76748 20.6436H12.2523V13.1082C12.2523 12.6368 12.3062 12.2732 12.4139 12.0173C12.6025 11.5594 12.8887 11.1722 13.2725 10.8557C13.6564 10.5392 14.1378 10.3809 14.717 10.3809C16.2254 10.3809 16.9796 11.3978 16.9796 13.4314V20.6436H21.4644V12.9062C21.4644 10.9129 20.9931 9.40113 20.0503 8.37083C19.1075 7.34052 17.8618 6.82537 16.3129 6.82537C14.5756 6.82537 13.222 7.57285 12.2523 9.0678V9.1082H12.2321L12.2523 9.0678V7.14861H7.76748C7.79441 7.57958 7.80788 8.91964 7.80788 11.1688C7.80788 13.418 7.79441 16.5762 7.76748 20.6436Z"/>
                                </svg>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="px-4 w-full sm:w-1/2 lg:w-1/3 xl:w-4/12 py-10 lg:pt-0 text-center lg:text-left">
                <p class="text-lg font-bold mb-3">Наскоро достапни на</p>
                <div class="flex flex-row flex-wrap -mx-2.5 justify-center lg:justify-start items-center lg:items-start">
                    <div class="px-2.5 py-1">
                        <a href="#">
                            <img src="{{ Vite::asset('resources/images/homepage/button-apple.svg')}}" alt="Apple Store" width="163" height="47">
                        </a>
                    </div>

                    <div class="px-2.5 py-1">
                        <a href="#">
                            <img src="{{ Vite::asset('resources/images/homepage/button-android.svg')}}" alt="Apple Store" width="163" height="47">
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="pt-10 block text-center xl:text-left">
            <ul class="pl-0 flex flex-row flex-wrap justify-center lg:justify-start -mx-1.5 items-center">
                <li class="py-0.5 px-1.5 text-white/70 transition-all font-medium text-sm md:text-base">
                    © Copyright {{ now()->year }} - Смарт Инвест Гроуп, ДОО Скопје
                </li>
                <li class="py-0.5 px-1.5 hidden">
                    <span class="relative pl-4 before:absolute before:left-0 before:top-1/2 before:-translate-y-1/2 before:content-[''] before:w-1.5 before:h-1.5 before:rounded-full before:bg-white">
                        <a href="#" class="text-white/70 transition-all hover:text-white font-medium text-sm md:text-base">Terms of Use</a>
                    </span>
                </li>
                <li class="py-0.5 px-1.5 hidden">
                    <span class="relative pl-4 before:absolute before:left-0 before:top-1/2 before:-translate-y-1/2 before:content-[''] before:w-1.5 before:h-1.5 before:rounded-full before:bg-white">
                        <a href="#" class="text-white/70 transition-all hover:text-white font-medium text-sm md:text-base">Key Risks</a>
                    </span>
                </li>
                <li class="py-0.5 px-1.5 hidden">
                    <span class="relative pl-4 before:absolute before:left-0 before:top-1/2 before:-translate-y-1/2 before:content-[''] before:w-1.5 before:h-1.5 before:rounded-full before:bg-white">
                        <a href="#" class="text-white/70 transition-all hover:text-white font-medium text-sm md:text-base">Privacy Policy</a>
                    </span>
                </li>
                <li class="py-0.5 px-1.5 hidden">
                    <span class="relative pl-4 before:absolute before:left-0 before:top-1/2 before:-translate-y-1/2 before:content-[''] before:w-1.5 before:h-1.5 before:rounded-full before:bg-white">
                        <a href="#" class="text-white/70 transition-all hover:text-white font-medium text-sm md:text-base">Cookies Notice</a>
                    </span>
                </li>
                <li class="py-0.5 px-1.5 hidden">
                    <span class="relative pl-4 before:absolute before:left-0 before:top-1/2 before:-translate-y-1/2 before:content-[''] before:w-1.5 before:h-1.5 before:rounded-full before:bg-white">
                        <a href="#" class="text-white/70 transition-all hover:text-white font-medium text-sm md:text-base">Terms of Use</a>
                    </span>
                </li>
            </ul>

        </div>
    </div>
</footer>

<button  x-data @click="window.scrollTo({top: 0, behavior: 'smooth'})" @scroll.window="toTop = (window.pageYOffset < 470) ? false: true" :class="{'!opacity-100 !visible': toTop }" class="fixed flex items-center justify-center right-10 bottom-20 z-[300] opacity-0 invisible transition-all w-[37px] h-[37px] rounded-md bg-[#2A3466]">
    <svg width="16" height="11" viewBox="0 0 16 11" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M14.472 10.0516C14.1236 10.0516 13.7753 9.92322 13.5003 9.64822L8.00029 4.14822L2.50029 9.64822C1.96862 10.1799 1.08862 10.1799 0.556953 9.64822C0.0252865 9.11656 0.0252865 8.23656 0.556953 7.70489L7.02862 1.23322C7.56029 0.701556 8.44029 0.701556 8.97195 1.23322L15.4436 7.70489C15.9753 8.23656 15.9753 9.11656 15.4436 9.64822C15.1686 9.92322 14.8203 10.0516 14.472 10.0516Z" fill="#CED0D2"/>
    </svg>
</button>