@extends('layouts.main')
@section('content')
    <!-- ****** Breadcumb Area Start ****** -->
    <div class="breadcumb-area" style="background-image: url({{asset('assets/img/bg-img/breadcumb.jpg')}});">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="bradcumb-title text-center">
                        <h2>{{ $post->title }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="breadcumb-nav">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('main.index') }}"><i class="fa fa-home"
                                                                                               aria-hidden="true"></i>
                                    Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('main.index') }}">Posts</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $post->title }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ****** Breadcumb Area End ****** -->
    <!-- ****** Single Blog Area Start ****** -->
    <section class="single_blog_area section_padding_80">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-8">
                    <div class="row no-gutters">

                        <!-- Single Post Share Info -->
                        <div class="col-2 col-sm-1">
                            <div class="single-post-share-info mt-100">
                                <a href="#" class="facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                <a href="#" class="twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                <a href="#" class="googleplus"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                                <a href="#" class="instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                <a href="#" class="pinterest"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                            </div>
                        </div>

                        <!-- Single Post -->
                        <div class="col-10 col-sm-11">
                            <div class="single-post">
                                <!-- Post Thumb -->
                                <div class="post-thumb">
                                    <img src="{{ asset('storage/' . $post->main_image) }}" alt="">
                                </div>
                                <!-- Post Content -->
                                <div class="post-content">
                                    <div class="post-meta d-flex">
                                        <div class="post-author-date-area d-flex">
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
                                                    <a href="#" class="pe-none">
                                                        <i class="fa fa-heart-o" aria-hidden="true"></i>
                                                        {{ $post->likedUsers->count() }}
                                                    </a>
                                                @endguest
                                            </div>
                                            <!-- Post Comments -->
                                            <div class="post-comments">
                                                <a href="#" class="pl-2"><i class="fa fa-comment-o"
                                                                            aria-hidden="true"></i> {{ $post->comments->count() }}
                                                </a>
                                            </div>
                                            <!-- Post Share -->
                                            <div class="post-share">
                                                <a href="#"><i class="fa fa-share-alt" aria-hidden="true"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="#">
                                        <h2 class="post-headline">{{ $post->title }}</h2>
                                    </a>
                                    {{--<p>Tiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea. Liusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, qui s nostrud exercitation ullamLorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliquaLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>

                                    <blockquote class="yummy-blockquote mt-30 mb-30">
                                        <h5 class="mb-30">“Technology is nothing. What's important is that you have a faith in people, that they're basically good and smart, and if you give them tools, they'll do wonderful things with them.”</h5>
                                        <h6 class="text-muted">Steven Jobs</h6>
                                    </blockquote>

                                    <h4>You Can Buy For Less Than A College Degree</h4>
                                    <p>Dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </p>

                                    <img class="br-30 mb-30" src="img/blog-img/11.jpg" alt="">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliquaLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.</p>

                                    <img class="br-30 mb-30" src="img/blog-img/12.jpg" alt="">
                                    <p>Liusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, qui s nostrud exercitation ullamLorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliquaLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>

                                    <img class="br-30 mb-30" src="img/blog-img/13.jpg" alt="">
                                    <h4>You Can Buy For Less Than A College Degree</h4>
                                    <p>Liusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, qui s nostrud exercitation ullamLorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliquaLorem ipsum dolor sit amet, consectetur adipisicing elit.</p>

                                    <ul class="mb-30">
                                        <li>1/3 cup Lonsectetur adipisicing elit.Lorem ipsum</li>
                                        <li>1/2 cup Veniam, quis nostrud exercitation</li>
                                        <li>Ut labore et dolore magna</li>
                                        <li>Lonsectetur adipisicing elit.Lorem ipsum</li>
                                        <li>Lonsectetur adipisicing elit.Lorem ipsum</li>
                                        <li>Ut labore et dolore magna</li>
                                        <li>Lonsectetur adipisicing elit.Lorem ipsum</li>
                                    </ul>

                                    <img class="br-30 mb-15" src="img/blog-img/14.jpg" alt="">--}}
                                    {!! $post->content !!}
                                </div>
                            </div>

                            <!-- Tags Area -->
                            <div class="tags-area">
                                @foreach($post->tags as $tag)
                                    <a href="{{ route('tag.post.index', $tag) }}">{{ $tag->title }}</a>
                                @endforeach
                            </div>

                            <!-- Related Post Area -->
                            <div class="related-post-area section_padding_50">
                                <h4 class="mb-30">Related post</h4>

                                <div class="related-post-slider owl-carousel">
                                    <!-- Single Related Post-->
                                    @foreach($relatedPosts as $relatedPost)
                                        <div class="single-post">
                                            <!-- Post Thumb -->
                                            <div class="post-thumb">
                                                <img src="{{ asset('storage/' . $relatedPost->preview_image) }}" alt="">
                                            </div>
                                            <!-- Post Content -->
                                            <div class="post-content">
                                                <div class="post-meta d-flex">
                                                    <div class="post-author-date-area d-flex">
                                                        <!-- Post Date -->
                                                        <div class="post-date">
                                                            <a href="#">{{ $relatedPost->dateAsCarbon->format('P d, Y') }}</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a href="{{ route('post.show', $relatedPost) }}">
                                                    <h6>{{ $relatedPost->title }}</h6>
                                                </a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <!-- Comment Area Start -->
                            @if($post->comments->count() > 0)
                            <div class="comment_area section_padding_50 clearfix">
                                <h4 class="mb-30">{{ $post->comments->count() > 1 ? $post->comments->count() . ' commments' : $post->comments->count() . ' comment' }}</h4>

                                <ol>
                                    @foreach($post->comments as $comment)
                                        <!-- Single Comment Area -->
                                        <li class="single_comment_area">
                                            <div class="comment-wrapper d-flex">
                                                <!-- Comment Meta -->
                                                <div class="comment-author">
                                                    <img src="{{ isset($comment->user->photo) ? asset('storage/' . $comment->user->photo) : asset('storage/images/none.png') }}" alt="">
                                                </div>
                                                <!-- Comment Content -->
                                                <div class="comment-content">
                                                    <span
                                                        class="comment-date text-muted">{{ $comment->dateAsCarbon->diffForHumans() }}</span>
                                                    <h5>{{ $comment->user->name }}</h5>
                                                    <p>{{ $comment->message }}</p>
                                                </div>
                                            </div>
                                            {{--<ol class="children">
                                                <li class="single_comment_area">
                                                    <div class="comment-wrapper d-flex">
                                                        <!-- Comment Meta -->
                                                        <div class="comment-author">
                                                            <img src="img/blog-img/18.jpg" alt="">
                                                        </div>
                                                        <!-- Comment Content -->
                                                        <div class="comment-content">
                                                            <span class="comment-date text-muted">27 Aug 2018</span>
                                                            <h5>Brandon Kelley</h5>
                                                            <p>Neque porro qui squam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora.</p>
                                                            <a href="#">Like</a>
                                                            <a class="active" href="#">Reply</a>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ol>--}}
                                        </li>
                                    @endforeach
                                </ol>
                            </div>
                            @endif
                            @auth()
                                <!-- Leave A Comment -->
                                <div class="leave-comment-area section_padding_50 clearfix">
                                    <div class="comment-form">
                                        <h4 class="mb-30">Leave A Comment</h4>

                                        <!-- Comment Form -->
                                        <form action="{{ route('post.comment.store', $post) }}" method="post">
                                            @csrf
                                            <div class="form-group">
                                                <textarea class="form-control" name="message" id="message" cols="30"
                                                          rows="10" placeholder="Message"></textarea>
                                            </div>
                                            <button type="submit" class="btn contact-btn">Post Comment</button>
                                        </form>
                                    </div>
                                </div>
                            @endauth
                        </div>
                    </div>
                </div>

                <!-- ****** Blog Sidebar ****** -->
                @include('includes.sidebar')
            </div>
        </div>
    </section>
    <!-- ****** Single Blog Area End ****** -->
@endsection
