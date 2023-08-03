@php
    $blogs = App\Models\Blog::latest()
        ->take(3)
        ->get();
@endphp
<section class="blog">
    <div class="container">
        <div class="row gx-0 justify-content-center">
            @foreach ($blogs as $item)
                <div class="col-lg-4 col-md-6 col-sm-9">
                    <div class="blog__post__item">
                        <div class="blog__post__thumb">
                            <a href="{{ route('blog.details', $item->id) }}">
                                <img src="{{ asset('' . $item->image) }}"
                                    class="w-[430px] h-[327px] overflow-hidden object-cover"
                                     alt="">
                            </a>
                            <div class="blog__post__tags">
                                <a href="{{ route('blog.details', $item->id) }}">
                                    @if ($item->category)
                                        {{ $item->category->blog_category_name }}
                                    @endif
                                </a>
                            </div>
                        </div>
                        <div class="blog__post__content">
                            <span class="date">
                                {{ $item->created_at->format('d F Y') }}
                            </span>
                            <h3 class="title"><a href="{{ route('blog.details', $item->id) }}">
                                    {{ $item->title }}
                                </a></h3>
                            <a href="{{ route('blog.details', $item->id) }}" class="read__more">Read mORe</a>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
        <div class="blog__button text-center">
            <a href="{{ route('blog') }}" class="btn">more blog</a>
        </div>
    </div>
</section>
