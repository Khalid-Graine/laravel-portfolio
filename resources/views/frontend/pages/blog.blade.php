@extends('frontend.master.master')
@section('title', 'blog')
@section('main')
    <main>

        <!-- breadcrumb-area -->
        <section class="breadcrumb__wrap">
            <div class="container custom-container">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-8 col-md-10">
                        <div class="breadcrumb__wrap__content">
                            <h2 class="title">Recent Article</h2>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Blog</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="breadcrumb__wrap__icon">
                <ul>
                    <li>
                        <img src="{{ asset('assets/img/icons/breadcrumb_icon01.png') }}" alt="">
                    </li>
                    <li>
                        <img src="{{ asset('frontend/assets/img/icons/breadcrumb_icon02.png') }}" alt="">
                    </li>
                    <li>
                        <img src="{{ asset('frontend/assets/img/icons/breadcrumb_icon03.png') }}" alt="">
                    </li>
                    <li>
                        <img src="{{ asset('frontend/assets/img/icons/breadcrumb_icon04.png') }}" alt="">
                    </li>
                    <li>
                        <img src="{{ asset('frontend/assets/img/icons/breadcrumb_icon05.png') }}" alt="">
                    </li>
                    <li>
                        <img src="{{ asset('frontend/assets/img/icons/breadcrumb_icon06.png') }}" alt="">
                    </li>
                </ul>
            </div>
        </section>
        <!-- breadcrumb-area-end -->


        <!-- blog-area -->
        <section class="standard__blog">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        @foreach ($blogs as $item)
                            <div class="standard__blog__post">
                                <div class="standard__blog__thumb">
                                    <a href="{{ route('blog.details', $item->id) }}">
                                        <img src="{{ asset('' . $item->image) }}" alt=""
                                            class="w-[850px] h-[430px] overflow-hidden object-cover">
                                    </a>
                                    <a href="{{ route('blog.details', $item->id) }}" class="blog__link">
                                        <i class="far fa-long-arrow-right"></i>
                                    </a>
                                </div>
                                <div class="standard__blog__content">
                                    <div class="blog__post__avatar">
                                        <div class="thumb">
                                            <img src="{{ asset('assets/img/blog/blog_avatar.png') }}" alt="">
                                        </div>
                                    </div>
                                    <h2 class="title">
                                        <a href="{{ route('blog.details', $item->id) }}"> {{ $item->title }}</a>
                                    </h2>
                                    <div>
                                        {{ Str::limit($item->description, 250) }}
                                        @if (strlen($item->description) > 250)
                                            <a href="{{ route('blog.details', $item->id) }}" class="text-blue-500">Read
                                                More</a>
                                        @endif
                                    </div>

                                    <ul class="blog__post__meta">
                                        <li>
                                            <i class="fal fa-calendar-alt"></i>
                                            {{ $item->created_at->format('d F y') }}
                                        </li>
                                        <li>
                                            <i class="fal fa-comments-alt"> </i>
                                            <a href="#">Comment (08)</a>
                                        </li>
                                        <li class="post-share">
                                            <a href="#">
                                                <i class="fal fa-share-all"></i> (18)
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        @endforeach

                        <div class="">
                            {{ $blogs->links('vendor.pagination.custom') }}
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
                                            <div class="rc__post__thumb">
                                                <a href="{{ route('blog.details', $item->id) }}">
                                                    <img src="{{ asset('' . $item->image) }}"
                                                        class="w-[130px] h-[70px] overflow-hidden object-cover"
                                                        alt="">
                                                </a>
                                            </div>
                                            <div class="rc__post__content">
                                                <h5 class="title">
                                                    <a href="{{ route('blog.details', $item->id) }}">
                                                        {{ $item->title }}
                                                    </a>
                                                </h5>
                                                <span class="post-date"><i class="fal fa-calendar-alt"></i>
                                                    {{ $item->created_at->format('d F y') }}
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
                                            <a href="#">
                                                {{ $item->blog_category_name }}
                                                ({{ $item->blogs->count() }})
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="widget">
                                <h4 class="widget-title">Recent Comment</h4>
                                <ul class="sidebar__comment">
                                    <li class="sidebar__comment__item">
                                        <a href="blog-details.html">Rasalina Sponde</a>
                                        <p>There are many variations of passages of lorem ipsum available, but the majority
                                            have</p>
                                    </li>
                                    <li class="sidebar__comment__item">
                                        <a href="blog-details.html">Rasalina Sponde</a>
                                        <p>There are many variations of passages of lorem ipsum available, but the majority
                                            have</p>
                                    </li>
                                    <li class="sidebar__comment__item">
                                        <a href="blog-details.html">Rasalina Sponde</a>
                                        <p>There are many variations of passages of lorem ipsum available, but the majority
                                            have</p>
                                    </li>
                                    <li class="sidebar__comment__item">
                                        <a href="blog-details.html">Rasalina Sponde</a>
                                        <p>There are many variations of passages of lorem ipsum available, but the majority
                                            have</p>
                                    </li>
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
                                    <li><a href="blog.html">book</a></li>
                                    <li><a href="blog.html">Design</a></li>
                                    <li><a href="blog.html">product design</a></li>
                                    <li><a href="blog.html">landing page</a></li>
                                    <li><a href="blog.html">data</a></li>
                                </ul>
                            </div>
                        </aside>
                    </div>
                </div>
            </div>
        </section>


        <!-- blog-area-end -->


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
