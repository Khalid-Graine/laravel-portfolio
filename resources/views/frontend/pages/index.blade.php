@extends('frontend.master.master')
@section('title', 'home')
@section('main')
<main>

    <!-- banner-area -->
    @include('frontend.home.home_slide')
    <!-- banner-area-end -->

    <!-- about-area -->
    @include('frontend.home.home_about')
    <!-- about-area-end -->

    <!-- services-area -->
    @include('frontend.home.home_services')
    <!-- services-area-end -->

    <!-- work-process-area -->
    @include('frontend.home.home_work')
    <!-- work-process-area-end -->

    <!-- portfolio-area -->
    @include('frontend.home.portfolio')
    <!-- portfolio-area-end -->

    <!-- partner-area -->
    @include('frontend.home.home_partner')
    <!-- partner-area-end -->

    <!-- testimonial-area -->
    @include('frontend.home.home_testimonial')

    <!-- testimonial-area-end -->

    <!-- blog-area -->
    @include('frontend.home.home_blog')
    <!-- blog-area-end -->

    <!-- contact-area -->
    @include('frontend.home.home_contact')
    <!-- contact-area-end -->
</main>

@endsection
