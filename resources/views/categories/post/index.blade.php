@extends('layouts.main')

@section('content')
    <section class="categories_area clearfix" id="about">
        <div class="breadcumb-nav">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('main.index') }}"><i class="fa fa-home" aria-hidden="true"></i>Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Category "{{ $category->title }}"
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- ****** Breadcumb Area End ****** -->

        <!-- ****** Archive Area Start ****** -->
        <section class="archive-area section_padding_80">
            <div class="container">
                <div class="row">
                    @foreach($posts as $post)
                        <!-- Single Post -->
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="single-post wow fadeInUp" data-wow-delay="0.1s">
                                <!-- Post Thumb -->
                                <div class="post-thumb">
                                    <img src="{{ asset('storage/' . $post->preview_image) }}" alt="">
                                </div>
                                <!-- Post Content -->
                                <div class="post-content">
                                    <div class="post-meta d-flex">
                                        <div class="post-author-date-area d-flex">
                                            <!-- Post Date -->
                                            <div class="post-date">
                                                <a href="#">{{ $post->dateAsCarbon }}</a>
                                            </div>
                                        </div>
                                        <!-- Post Comment & Share Area -->
                                        <div class="post-comment-share-area d-flex">
                                            <!-- Post Favourite -->
                                            <div class="post-favourite">
                                                @auth()
                                                    <form action="{{ route('post.like.store', $post) }}" method="post">
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
                                                    <a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i> {{$post->likedUsers->count()}}
                                                    </a>
                                                @endguest
                                            </div>
                                            <!-- Post Comments -->
                                            <div class="post-comments">
                                                <a href="#" class="pl-2"><i class="fa fa-comment-o"
                                                                            aria-hidden="true"></i> {{ $post->comments->count() }}
                                                </a>
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
                </div>
            </div>
        </section>
        <!-- ****** Archive Area End ****** -->
@endsection
