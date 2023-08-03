@php
    $services = App\Models\Service::all();

    function limitString($value, $limit , $end = '...') {
        if (Str::length($value) > $limit) {
            return Str::limit($value, $limit, $end);
        } else {
            return $value;
        }
    }

@endphp
<section class="services">
    <div class="container">
        <div class="services__title__wrap">
            <div class="row align-items-center justify-content-between">
                <div class="col-xl-5 col-lg-6 col-md-8">
                    <div class="section__title">
                        <span class="sub-title">02 - my Services</span>
                        <h2 class="title">Creates amazing digital experiences</h2>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-6 col-md-4">
                    <div class="services__arrow"></div>
                </div>
            </div>
        </div>
        <div class="row gx-0 services__active">
            @foreach ($services as $item)
                <div class="col-xl-3">
                    <div class="services__item">
                        <div class="services__thumb bg-white">
                            <a href="{{ route('service.details', $item->id) }}"><img src="{{ asset('' . $item->image) }}"
                                    class="w-[320px] h-[240px] overflow-hidden  object-cover" alt=""></a>
                        </div>
                        <div class="services__content">
                            <div class="services__icon">
                                <img class="light"
                                    src="{{ asset('frontend/assets/img/icons/services_light_icon01.png') }}"
                                    alt="" >
                                <img class="dark" src="{{ asset('frontend/assets/img/icons/services_icon01.png') }}"
                                    alt="">
                            </div>
                            <h3 class="title"><a href="{{ route('service.details', $item->id) }}">
                                {{ limitString($item->title, 35, '...') }}

                                </a></h3>

                                {{ limitString($item->description, 120, '...') }}

                            <a href="{{ route('service.details', $item->id) }}" class="btn border-btn mt-4">Read more</a>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</section>

