@php
    $data = App\Models\HomeSlide::findOrFail(1);
@endphp


<section class="banner">

    <div class="container custom-container">
        <div class="row align-items-center justify-content-center justify-content-lg-between">
            <div class="col-lg-6  order-0 order-lg-2">
                <div class="banner__img text-center text-xxl-end flex justify-center items-center">
                    <img src="{{ asset(''.$data->home_slide) }}" alt="" class="w w-full h-full object-fill overflow-hidden">
                    {{-- <p>{{ asset('/'.$data->home_slide) }} </p> --}}
                </div>
            </div>
            <div class="col-xl-5 col-lg-6">
                <div class="banner__content">
                    <h2 class="title wow fadeInUp " data-wow-delay=".2s">
                        <span>
                            {{ $data->title }}
                        </span>

                    </h2>
                    <p class="wow fadeInUp" data-wow-delay=".4s">
                        {{ $data->short_title }}
                    </p>
                    <a href="{{ route('about') }}" class="btn wow fadeInUp" data-wow-delay=".6s"> more about me</a>
                </div>
            </div>
        </div>
    </div>

    <div class="scroll__down">
        <a href="#aboutSection" class="scroll__link">
            Scroll down
        </a>
    </div>

    <div class="banner__video">
        <a href="{{ $data->video_url }}" loading="lazy" controls class="popup-video">
            <i class="fas fa-play"></i>
        </a>
    </div>
</section>
