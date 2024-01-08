<div class="w-[945px] max-w-full rounded-md shadow-[0px_4px_24px_rgba(0,0,0,0.15)] px-[20px] sm:px-[35px] md:px-[80px] py-[28px] bg-white relative inline-block text-left">
    <div class="absolute left-1/2 -translate-x-1/2 -top-[50px] md:-top-[80px] h-[50px] md:h-[80px] w-[865px] max-w-[90%] block">
        <img src="{{ Vite::asset('resources/images/homepage/bg-newsletter-top.svg')}}" alt="Newsletter top shape" width="865px" height="80px"  class="w-full h-full">
    </div>
    
    <h3 class="text-4xl md:text-5xl xl:text-6xl !leading-[140%] font-bold mb-4">Зачленете се!</h3>
    <p class="w-[444px] max-w-full mb-6 text-lg">Зачленете се и бидете известени кога ќе ја лансираме апликацијата!</p>
    <form wire:submit.prevent="submit" class="mb-0">
        <div class="flex flex-row flex-wrap -mx-2">
            <div class="w-full sm:w-[calc(100%_-_240px)] px-2 py-1">
                <label for="email-input" class="hidden">Вашиот емаил</label>
                <input wire:model="email" type="email" name="email" id="email" placeholder="Вашиот емаил" class="w-full font-normal text-lg md:text-xl text-colormain placeholder:text-gray-500 min-h-[52px] py-2 px-4 bg-white transition-all rounded-md border-gray-300 border-solid border focus:border-colormain">
            </div>
            <div class="w-full sm:w-[240px] px-2 py-1">
                <button class="w-full font-bold text-lg md:text-xl text-white min-h-[52px] py-2 px-2 bg-coloryellow transition-all hover:bg-colormain rounded-md">Зачлени ме</button>
            </div>
        </div>
    </form>
    <p class="text-green-500 font-bold text-sm mb-0 pt-2">
        @if (session()->has('message'))
            
                {{ session('message') }}
            
        @endif
    </p>

    <div class="absolute left-1/2 -translate-x-1/2 -bottom-[35px] h-[35px] w-[865px] max-w-[90%] block">
        <img src="{{ Vite::asset('resources/images/homepage/bg-newsletter-bottom.svg')}}" alt="Newsletter top shape" width="865px" height="35px" class="w-full h-full">
    </div>
</div>
