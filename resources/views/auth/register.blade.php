<x-guest-layout>
    <x-authentication-card>
        

        <h2 class="text-center font-bold color-maincolor text-2xl md:text-3xl mb-7 mb:md-10r">Регистрација</h2>


        <x-validation-errors class="my-4" />

        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
            @csrf

            <div>
                <x-label for="name" value="Име" class="mb-1 text-sm font-semibold !leading-tight block" />
                <x-input id="name" class="font-medium text-sm sm:text-base text-colormain placeholder:text-gray-500 min-h-[46px] sm:min-h-[50px] py-2 px-2.5 bg-white transition-all rounded-md border-gray-300 border-solid border focus:!border-colormain focus:!ring-colormain w-full" type="text" name="name" :value="old('name')" autofocus autocomplete="name" />
            </div>

            <!-- NEW -->
            <div class="mt-4">
                <x-label for="surname" value="Презиме" class="mb-1 text-sm font-semibold !leading-tight block" />
                <x-input id="surname" class="font-medium text-sm sm:text-base text-colormain placeholder:text-gray-500 min-h-[46px] sm:min-h-[50px] py-2 px-2.5 bg-white transition-all rounded-md border-gray-300 border-solid border focus:!border-colormain focus:!ring-colormain w-full" type="text" name="surname" :value="old('surname')" autofocus autocomplete="surname" />
            </div>
            <!-- -->

            <div class="mt-4">
                <x-label for="email" value="Епошта" class="mb-1 text-sm font-semibold !leading-tight block" />
                <x-input id="email" class="font-medium text-sm sm:text-base text-colormain placeholder:text-gray-500 min-h-[46px] sm:min-h-[50px] py-2 px-2.5 bg-white transition-all rounded-md border-gray-300 border-solid border focus:!border-colormain focus:!ring-colormain w-full" type="email" name="email" :value="old('email')" autocomplete="email" />
            </div>

            <!-- phone -->
            <div class="mt-4">
                <x-label for="phone" value="Телефон" class="mb-1 text-sm font-semibold !leading-tight block" />
                
                <div class="flex flex-row flex-wrap items-center justify-between -mx-1 w-full">
                    <div class="px-1 w-[54px]">
                        +3897
                    </div>
                    <div class="px-1 w-[calc(100%_-_54px)]">
                        <x-input id="phone" class="font-medium text-sm sm:text-base text-colormain placeholder:text-gray-500 min-h-[46px] sm:min-h-[50px] py-2 px-2.5 bg-white transition-all rounded-md border-gray-300 border-solid border focus:!border-colormain focus:!ring-colormain w-full" type="number" maxlength="7" step="1" name="phone" :value="old('phone')" autocomplete="phone" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" />
                    </div>
                </div>

                
            </div>
            <!--  -->

            <!-- NEW -->
            @props(['options' => []])
            @php
                $options = array_merge(['dateFormat' => 'd-m-Y','enableTime' => false,'altFormat' =>  'j F Y','altInput' => true], $options);
            @endphp
            <div class="mt-4">
                <x-label for="dob" value="Датум и година на раѓање"  class="mb-1 text-sm font-semibold !leading-tight block" />
                <x-input id="dob" class="font-medium text-sm sm:text-base text-colormain placeholder:text-gray-500 min-h-[46px] sm:min-h-[50px] py-2 px-2.5 bg-white transition-all rounded-md border-gray-300 border-solid border focus:!border-colormain focus:!ring-colormain w-full" type="date" name="dob" :value="old('dob')" autofocus autocomplete="dob" x-data="{init() {flatpickr(this.$refs.input, {{json_encode((object)$options)}});}}" x-ref="input" />
            </div>
            <!-- -->

            <!-- NEW -->
            <div class="mt-4">
                <x-label for="id_card_number" value="Број на лична карта" class="mb-1 text-sm font-semibold !leading-tight block" />
                <x-input id="id_card_number" class="font-medium text-sm sm:text-base text-colormain placeholder:text-gray-500 min-h-[46px] sm:min-h-[50px] py-2 px-2.5 bg-white transition-all rounded-md border-gray-300 border-solid border focus:!border-colormain focus:!ring-colormain w-full" type="text" name="id_card_number" :value="old('id_card_number')" autofocus autocomplete="id_card_number" />
            </div>
            <!-- -->

            <!-- NEW -->
            <div class="mt-4">
                <x-label for="embg" value="ЕМБГ" class="mb-1 text-sm font-semibold !leading-tight block" />
                <x-input id="embg" class="font-medium text-sm sm:text-base text-colormain placeholder:text-gray-500 min-h-[46px] sm:min-h-[50px] py-2 px-2.5 bg-white transition-all rounded-md border-gray-300 border-solid border focus:!border-colormain focus:!ring-colormain w-full" type="text" name="embg" :value="old('embg')" autofocus autocomplete="embg" />
            </div>
            <!-- -->

            <!-- NEW -->
            <div class="mt-4">
                <x-label for="address" value="Адреса" class="mb-1 text-sm font-semibold !leading-tight block" />
                <x-input id="address" class="font-medium text-sm sm:text-base text-colormain placeholder:text-gray-500 min-h-[46px] sm:min-h-[50px] py-2 px-2.5 bg-white transition-all rounded-md border-gray-300 border-solid border focus:!border-colormain focus:!ring-colormain w-full" type="text" name="address" :value="old('address')" autofocus autocomplete="address" />
            </div>
            <!-- -->

            <!-- NEW -->
            <div class="mt-4">
                <x-label for="bank_account" value="Активна трансакциска сметка" class="mb-1 text-sm font-semibold !leading-tight block" />
                <x-input id="bank_account" class="font-medium text-sm sm:text-base text-colormain placeholder:text-gray-500 min-h-[46px] sm:min-h-[50px] py-2 px-2.5 bg-white transition-all rounded-md border-gray-300 border-solid border focus:!border-colormain focus:!ring-colormain w-full" type="text" name="bank_account" :value="old('bank_account')" autofocus autocomplete="bank_account" />
            </div>
            <!-- -->

            <!-- NEW -->
            <div class="mt-4">
                <x-label for="id_card_picture_front" value="Предна страна од пасош или лична карта" class="mb-1 text-sm font-semibold !leading-tight block" />
                <x-input id="id_card_picture_front" type="file" oninput="pic_front.src=window.URL.createObjectURL(this.files[0])" class="font-medium text-sm sm:text-base text-colormain placeholder:text-gray-500 min-h-[46px] sm:min-h-[50px] py-2 px-2.5 bg-white transition-all rounded-md border-gray-300 border-solid border focus:!border-colormain focus:!ring-colormain w-full" name="id_card_picture_front" :value="old('id_card_picture_front')" autofocus autocomplete="id_card_picture_front" accept="image/*;capture=camera"/>
                <img id="pic_front" style="width: 85px; height: auto; margin-top: 10px; border-radius: 5px; display: inline-block;" />
            </div>
            <!-- -->

            <!-- NEW -->
            <div class="mt-">
                <x-label for="id_card_picture_back" value="Задна страна од пасош или лична карта" class="mb-1 text-sm font-semibold !leading-tight block" />
                <x-input id="id_card_picture_back" type="file" oninput="pic_back.src=window.URL.createObjectURL(this.files[0])" class="font-medium text-sm sm:text-base text-colormain placeholder:text-gray-500 min-h-[46px] sm:min-h-[50px] py-2 px-2.5 bg-white transition-all rounded-md border-gray-300 border-solid border focus:!border-colormain focus:!ring-colormain w-full" name="id_card_picture_back" :value="old('id_card_picture_back')" autofocus autocomplete="id_card_picture_back" accept="image/*;capture=camera"/>
                <img id="pic_back" style="width: 85px; height: auto; margin-top: 10px; border-radius: 5px; display: inline-block;" />
            </div>
            <!-- -->

            

            <div class="mt-4">
                <x-label for="password" value="Лозинка"  class="mb-1 text-sm font-semibold !leading-tight block" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" autocomplete="new-password" class="font-medium text-sm sm:text-base text-colormain placeholder:text-gray-500 min-h-[46px] sm:min-h-[50px] py-2 px-2.5 bg-white transition-all rounded-md border-gray-300 border-solid border focus:!border-colormain focus:!ring-colormain w-full" />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="Потврдете лозинка"  class="mb-1 text-sm font-semibold !leading-tight block" />
                <x-input id="password_confirmation" class="font-medium text-sm sm:text-base text-colormain placeholder:text-gray-500 min-h-[46px] sm:min-h-[50px] py-2 px-2.5 bg-white transition-all rounded-md border-gray-300 border-solid border focus:!border-colormain focus:!ring-colormain w-full" type="password" name="password_confirmation" autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" />

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            

            <div class="block mt-7 md:mt-10 text-center">
                <x-button class="w-[240px] max-w-full">
                    Регистрирајте се
                </x-button>
            </div>
            
            <div class="block mt-5">
                <p class="text-center font-medium text-sm mb-0">Веќе имате креирано свој профил?<br>
                    <a class="underline underline-offset-2 text-colorred" href="{{ route('login') }}">
                        Најавете се.
                    </a>
                </p>
            </div>




        </form>
    </x-authentication-card>
</x-guest-layout>

<script>
    function showImage() {
        return {
            showPreview(event) {
                if (event.target.files.length > 0) {
                    var src = URL.createObjectURL(event.target.files[0]);
                    var preview = document.getElementById("preview");
                    preview.src = src;
                    preview.style.display = "block";
                }
            }
        }
    }
</script>
