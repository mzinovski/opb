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

    <section x-ref="theCalc" class="w-full block relative py-[60px] md:py-[80px] lg:py-[100px] bg-bglight">
        <div class="px-5 xl:px-6 w-[1440px] max-w-full block relative mx-auto">
            <livewire:project-calculator.index :selected_project="$selected_project">
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
        })
   </script>

   <script type="text/javascript">
     var elts = document.getElementsByClassName('sms_number_inputs');
      Array.from(elts).forEach(function(elt){
        elt.addEventListener("keyup", function(event) {
            elt.nextElementSibling.focus();
        });
      });
   </script>
@endpush
