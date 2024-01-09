@extends('landing.master')

@section('title', 'Организација на потрошувачите Битола')
@section('meta_title', 'Организација на потрошувачите Битола')
@section('keywords', 'заработка, инвестирање, безбеден')
@section('description', 'Паметен, лесен и безбеден начин за инвестирање - Инвестирајте дигитално и добијте загарантирана заработка')
{{-- facebook meta tags --}}
@section('fb_meta_title', 'Организација на потрошувачите Битола')
@section('fb_description',  'Паметен, лесен и безбеден начин за инвестирање - Инвестирајте дигитално и добијте загарантирана заработка')
@section('fb_route', URL::current()) 
@section('fb_type', 'website')
@section('fb_image', Vite::asset('resources/images/homepage/si-group-social.jpg'))

{{--twitter meta tags --}}
@section('twitter_meta_title',  'Организација на потрошувачите Битола')
@section('twitter_description', 'Паметен, лесен и безбеден начин за инвестирање - Инвестирајте дигитално и добијте загарантирана заработка')
@section('twitter_url',  URL::current())

@section('content')

<!-- Start -->
<section class="slider">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-10">
                <div class="block">
                    {{-- <span class="d-block mb-3 text-white text-capitalize">Prepare for new future</span> --}}
                    <h1 class="animated fadeInUp mb-5" data-aos="fade-left" data-aos-offset="1" data-aos-delay="0" data-aos-duration="2000" data-aos-easing="ease-in-out" data-aos-once="false">Организација на <br>потрошувачите на <br>Битола</h1>
                    <a href="#" target="_blank" class="btn btn-main animated fadeInUp btn-round-full" data-aos="fade-right" data-aos-offset="1" data-aos-delay="0" data-aos-duration="2000" data-aos-easing="ease-in-out" data-aos-once="false">Get started<i class="btn-icon fa fa-angle-right ml-2"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section Koi Sme Start -->
<section class="section intro">
    <div class="container">
        <div class="row ">
            <div class="col-lg-8">
                <div class="section-title" data-aos="fade-left" data-aos-offset="1" data-aos-delay="0" data-aos-duration="2000" data-aos-easing="ease-in-out" data-aos-once="false">
                    <span class="h6 text-color ">За нас</span>
                    <h2 class="mt-3 content-title">Кои сме</h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center" data-aos="fade-right" data-aos-offset="1" data-aos-delay="0" data-aos-duration="2000" data-aos-easing="ease-in-out" data-aos-once="false">
            <div class="col-lg-4 col-md-6 col-12">
                <div class="intro-item mb-5 mb-lg-0"> 
                    <i class="ti-layers-alt color-one"></i>
                    <h4 class="mt-4 mb-3">Професионалност</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odit, ducimus.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="intro-item mb-5 mb-lg-0">
                    <i class="ti-layers-alt color-one"></i>
                    <h4 class="mt-4 mb-3">Грижа за секој корисник</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odit, ducimus.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="intro-item">
                    <i class="ti-layers-alt color-one"></i>
                    <h4 class="mt-4 mb-3">Транспарентност</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odit, ducimus.</p>
                </div>
            </div> 
        </div>
    </div>
</section>
<!-- Section Koi Sme END -->

 <!-- Section Clenstvo Start --> 
<section class="section cta">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <div class="cta-item  bg-white p-5 rounded" data-aos="fade-left" data-aos-offset="1" data-aos-delay="0" data-aos-duration="2000" data-aos-easing="ease-in-out" data-aos-once="false">
                    <span class="h6 text-color">За нас</span>
                    <h2 class="mt-2 mb-4">Членство</h2>
                    <p class="lead mb-4">
                        Доколку сакате да станете член на Организацијата на потрошувачите на Битола, тоа можете да го направите на следниот начин: Обратете се до советодавното биро на ОПБ на адреса Бул. 1-ви Мај 204, Битола или контактирајте не на
                    </p>
                    <h5><i class="ti-envelope mr-3 text-color"></i><a href="mailto:opbitola@yahoo.com">opbitola@yahoo.com</a></h5>
                    <h5><i class="ti-mobile mr-3 text-color"></i><a href="tell:+38947228246">047/228-246</a></h5>
                    
                </div>
            </div>
        </div>
    </div>
</section>
<!--  Section Clenstvo End-->


<!--  Section Godisni Izvestai -->
<section class="section service border-top">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7 text-center">
                <div class="section-title">
                    <span class="h6 text-color">За нас</span>
                    <h2 class="mt-3 content-title ">Годишни извештаи</h2>
                </div>
            </div>
        </div>
        <livewire:godisni-izvestai.front />
    </div>
</section>
<!--  Section Godisni Izvestai End -->

<!--  Section Novosti -->
<section class="section latest-blog bg-2">
    <livewire:novosti.front />
</section>
<!--  Section Novosti End -->

<!--  Section Proekti -->
<section class="section">
    <livewire:proekti.front />
</section>
<!--  Section Proekti End -->

<section class="mt-70 position-relative">
    <div class="container">
    <div class="cta-block-2 bg-gray p-5 rounded border-1">
        <div class="row">
            <div class="col-lg-6 col-md-12 col-sm-12">
                 <form id="contact-form" class="contact__form" method="post" action="mail.php">
                 <!-- form message -->
                    <div class="row">
                        <div class="col-12">
                            <div class="alert alert-success contact__msg" style="display: none" role="alert">
                                Your message was sent successfully.
                            </div>
                        </div>
                    </div>
                    <!-- end message -->
                    <span class="text-color">Контакт</span>
                    <h3 class="text-md mb-4">Оставете порака</h3>
                    <div class="form-group">
                        <input name="name" type="text" class="form-control" placeholder="Име">
                    </div>
                    <div class="form-group">
                        <input name="email" type="email" class="form-control" placeholder="Епошта">
                    </div>
                    <div class="form-group-2 mb-4">
                        <textarea name="message" class="form-control" rows="4" placeholder="Порака"></textarea>
                    </div>
                    <button class="btn btn-main" name="submit" type="submit">Испрати</button>
                </form>
            </div>

            <div class="col-lg-5 col-sm-12">
                <div class="contact-content pl-lg-5 mt-5 mt-lg-0">
                    <span class="text-muted">Најдете не</span>
                    <h2 class="mb-5 mt-2">За повеќе информации слободно контактирајте нé</h2>

                    <ul class="address-block list-unstyled">
                        <li>
                            <i class="ti-direction mr-3"></i>Булевар 1-ви Мај бр. 204-12А Битола
                        </li>
                        <li>
                            <i class="ti-email mr-3"></i>opbitola@yahoo.com
                        </li>
                        <li>
                            <i class="ti-mobile mr-3"></i>047/228-246
                        </li>
                    </ul>

                    <ul class="social-icons list-inline mt-5">
                        <li class="list-inline-item">
                            <a target="_blank" href="https://www.facebook.com/PotrosuvaciBitola/"><i class="fab fa-facebook-f"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

</section>

@endsection

{{-- @push('modals') --}}

{{-- @endpush --}}
@push('scripts')
   
@endpush
