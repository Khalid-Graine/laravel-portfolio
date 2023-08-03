@php
    $blogs = App\Models\Blog::take(5)->get();
    $BlogCategories = App\Models\BlogCategory::all();
@endphp

@extends('frontend.master.master')
@section('title', 'blog deatils')
@section('main')

    <main>
        <!-- breadcrumb-area -->
        <section class="breadcrumb__wrap">
            <div class="container custom-container">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-8 col-md-10">
                        <div class="breadcrumb__wrap__content">
                            <h2 class="title">Single Article</h2>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Blog Details</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="breadcrumb__wrap__icon">
                <ul>
                    <li><img src="assets/img/icons/breadcrumb_icon01.png" alt=""></li>
                    <li><img src="assets/img/icons/breadcrumb_icon02.png" alt=""></li>
                    <li><img src="assets/img/icons/breadcrumb_icon03.png" alt=""></li>
                    <li><img src="assets/img/icons/breadcrumb_icon04.png" alt=""></li>
                    <li><img src="assets/img/icons/breadcrumb_icon05.png" alt=""></li>
                    <li><img src="assets/img/icons/breadcrumb_icon06.png" alt=""></li>
                </ul>
            </div>
        </section>
        <!-- breadcrumb-area-end -->


        <!-- blog-details-area -->
        <section class="standard__blog blog__details">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="standard__blog__post">
                            <div class="standard__blog__thumb flex bg-green-300">
                                <img src="{{ asset('' . $blog->image) }}" class="w-[850px] h-[430px] overflow-hidden"
                                    alt="">
                            </div>
                            <div class="blog__details__content services__details__content">
                                <ul class="blog__post__meta">
                                    <li><i class="fal fa-calendar-alt"></i> {{ $blog->created_at->format('d F y') }}</li>
                                </ul>

                                <div>
                                    {{ $blog->description }}
                                </div>

                            </div>
                            <div class="blog__details__bottom">
                                <ul class="blog__details__tag">
                                    <li class="title">Tag:</li>
                                    <li class="tags-list">
                                        <a href="#">Business</a>
                                        <a href="#">Design</a>
                                        <a href="#">apps</a>
                                        <a href="#">data</a>
                                    </li>
                                </ul>
                                <ul class="blog__details__social">
                                    <li class="title">Share :</li>
                                    <li class="social-icons">
                                        <a href="#"><i class="fab fa-facebook"></i></a>
                                        <a href="#"><i class="fab fa-twitter-square"></i></a>
                                        <a href="#"><i class="fab fa-linkedin"></i></a>
                                        <a href="#"><i class="fab fa-pinterest"></i></a>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-4">
                        <aside class="blog__sidebar">
                            <div class="widget">
                                <form action="#" class="search-form">
                                    <input type="text" placeholder="Search">
                                    <button type="submit"><i class="fal fa-search"></i></button>
                                </form>
                            </div>
                            <div class="widget">
                                <h4 class="widget-title">Recent Blog</h4>
                                <ul class="rc__post">
                                    @foreach ($blogs as $item)
                                        <li class="rc__post__item">
                                            <div class="rc__post__thumb bg-red-300">
                                                <a href="{{ route('blog.details', $item->id) }}"><img
                                                        data-src="{{ asset('' . $item->image) }}"
                                                        class="lazy-load w-[104px] h-[68px] object-cover overflow-hidden"
                                                        alt=""></a>
                                            </div>
                                            <div class="rc__post__content">
                                                <h5 class="title">
                                                    <a href="{{ route('blog.details', $item->id) }}">
                                                        {{ $item->title }}
                                                    </a>
                                                </h5>
                                                <span class="post-date"><i class="fal fa-calendar-alt"></i>
                                                    {{ $item->created_at->format('D F Y') }}
                                                </span>
                                            </div>
                                        </li>
                                    @endforeach

                                </ul>
                            </div>
                            <div class="widget">
                                <h4 class="widget-title">Categories</h4>
                                <ul class="sidebar__cat">
                                    @foreach ($BlogCategories as $item)
                                        <li class="sidebar__cat__item">
                                            <a href="blog.html">
                                                {{ $item->blog_category_name }}
                                                ({{ $item->blogs->count() }})
                                            </a>
                                        </li>
                                    @endforeach


                                </ul>
                            </div>

                            <div class="widget">
                                <h4 class="widget-title">Popular Tags</h4>
                                <ul class="sidebar__tags">
                                    <li><a href="blog.html">Business</a></li>
                                    <li><a href="blog.html">Design</a></li>
                                    <li><a href="blog.html">apps</a></li>
                                    <li><a href="blog.html">landing page</a></li>
                                    <li><a href="blog.html">data</a></li>
                                    <li><a href="blog.html">website</a></li>

                                </ul>
                            </div>
                        </aside>
                    </div>
                </div>
            </div>
        </section>
        <!-- blog-details-area-end -->


        <!-- contact-area -->
        <section class="homeContact homeContact__style__two">
            <div class="container">
                <div class="homeContact__wrap">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="section__title">
                                <span class="sub-title">07 - Say hello</span>
                                <h2 class="title">Any questions? Feel free <br> to contact</h2>
                            </div>
                            <div class="homeContact__content">
                                <p>There are many variations of passages of Lorem Ipsum available, but the majority have
                                    suffered alteration in some form</p>
                                <h2 class="mail"><a href="mailto:Info@webmail.com">Info@webmail.com</a></h2>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="homeContact__form">
                                <form action="#">
                                    <input type="text" placeholder="Enter name*">
                                    <input type="email" placeholder="Enter mail*">
                                    <input type="number" placeholder="Enter number*">
                                    <textarea name="message" placeholder="Enter Massage*"></textarea>
                                    <button type="submit">Send Message</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- contact-area-end -->

    </main>
@endsection
