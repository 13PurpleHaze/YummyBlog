@extends('layouts.main')

@section('content')
    <!-- ****** Blog Area Start ****** -->
    <section class="blog_area section_padding_0_80">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-8">
                    <div class="row">

                        <!-- Most Popular Post -->
                        <div class="col-12">
                            <div class="single-post wow fadeInUp" data-wow-delay=".2s">
                                <!-- Post Thumb -->
                                <div class="post-thumb">
                                    <img src="{{ asset('storage/' . $mostPopularPost->preview_image) }}" alt="">
                                </div>
                                <!-- Post Content -->
                                <div class="post-content">
                                    <div class="post-meta d-flex">
                                        <div class="post-author-date-area d-flex">
                                            <!-- Post Date -->
                                            <div class="post-date">
                                                <a href="#">{{ $mostPopularPost->dateAsCarbon->format('F d, Y') }}</a>
                                            </div>
                                        </div>
                                        <!-- Post Comment & Share Area -->
                                        <div class="post-comment-share-area d-flex">
                                            <!-- Post Favourite -->
                                            <div class="post-favourite">
                                                @auth()
                                                    <form action="{{ route('post.like.store', $mostPopularPost) }}"
                                                          method="post">
                                                        @csrf
                                                        <button type="submit" class="border-0 bg-transparent"
                                                                style="cursor: pointer; font-size: 14px">
                                                            @if(auth()->user()->posts->contains($mostPopularPost->id))
                                                                <i class="fa fa-solid fa-heart"></i>
                                                            @else
                                                                <i class="fa fa-heart-o"></i>
                                                            @endif
                                                            {{ $mostPopularPost->likedUsers->count() }}</button>
                                                    </form>
                                                @endauth
                                                @guest()
                                                    <a href="#" class="pe-none">
                                                        <i class="fa fa-heart-o" aria-hidden="true"></i>
                                                        {{ $mostPopularPost->likedUsers->count() }}
                                                    </a>
                                                @endguest
                                            </div>
                                            <!-- Post Comments -->
                                            <div class="post-comments pl-2">
                                                <a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i> {{ $mostPopularPost->comments->count() }}</a>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="{{ route('post.show', $mostPopularPost) }}">
                                        <h2 class="post-headline">{{ $mostPopularPost->title }}</h2>
                                    </a>
                                    <a href="{{ route('post.show', $mostPopularPost) }}" class="read-more">Start
                                        Reading..</a>
                                </div>
                            </div>
                        </div>

                        <!-- Single Post -->
                        @foreach($posts as $post)
                            <div class="col-12 col-md-6">
                                <div class="single-post wow fadeInUp" data-wow-delay=".4s">
                                    <!-- Post Thumb -->
                                    <div class="post-thumb">
                                        <img src="{{ asset('storage/'. $post->preview_image) }}" alt="">
                                    </div>
                                    <!-- Post Content -->
                                    <div class="post-content">
                                        <div class="post-meta d-flex">
                                            <div class="post-author-date-area d-flex">
                                                <!-- Post Author -->
                                                <div class="post-author">
                                                    <a href="#">{{ $post->category->title}}</a>
                                                </div>
                                                <!-- Post Date -->
                                                <div class="post-date">
                                                    <a href="#">{{ $post->dateAsCarbon->format('F d, Y') }}</a>
                                                </div>
                                            </div>
                                            <!-- Post Comment & Share Area -->
                                            <div class="post-comment-share-area d-flex">
                                                <!-- Post Favourite -->
                                                <div class="post-favourite">
                                                    @auth()
                                                        <form action="{{ route('post.like.store', $post) }}"
                                                              method="post">
                                                            @csrf
                                                            <button type="submit" class="border-0 bg-transparent"
                                                                    style="cursor: pointer; font-size: 14px">
                                                                @if(auth()->user()->posts->contains($post->id))
                                                                    <i class="fa fa-solid fa-heart"></i>
                                                                @else
                                                                    <i class="fa fa-heart-o"></i>
                                                                @endif
                                                                {{ $post->likedUsers->count() }}</button>
                                                        </form>
                                                    @endauth
                                                    @guest()
                                                        <a href="#" class="pe-none">
                                                            <i class="fa fa-heart-o" aria-hidden="true"></i>
                                                            {{ $post->likedUsers->count() }}
                                                        </a>
                                                    @endguest
                                                </div>
                                                <!-- Post Comments -->
                                                <div class="post-comments">
                                                    <a href="#" class="pl-2">
                                                        <i class="fa fas fa-comment" aria-hidden="true"></i>
                                                        {{ $post->comments->count() }}
                                                    </a>
                                                </div>
                                                <!-- Post Share -->
                                                <div class="post-share">
                                                    <a href="#"><i class="fa fa-share-alt" aria-hidden="true"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="{{ route('post.show', $post) }}">
                                            <h4 class="post-headline">{{ $post->title }}</h4>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div>
                            {{ $posts->links() }}
                        </div>
                    </div>
                </div>
                @include('includes.sidebar')
            </div>
        </div>
    </section>
    <!-- ****** Blog Area End ****** -->
@endsection
