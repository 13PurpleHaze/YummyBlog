<!-- ****** Blog Sidebar ****** -->
<div class="col-12 col-sm-8 col-md-6 col-lg-4">
    <div class="blog-sidebar mt-5 mt-lg-0">
        <!-- Single Widget Area -->
        <div class="single-widget-area subscribe_widget text-center">
            <div class="widget-title">
                <h6>Subscribe &amp; Follow</h6>
            </div>
            <div class="subscribe-link">
                @foreach($socials as $social)
                    <a href="{{$social->link}}"><i class="fa fa-{{$social->title}}" aria-hidden="true"></i></a>
                @endforeach
            </div>
        </div>

        <!-- Single Widget Area -->
        <div class="single-widget-area popular-post-widget">
            <div class="widget-title text-center">
                <h6>Populer Post</h6>
            </div>
            <!-- Single Popular Post -->
            @foreach($popularPosts as $post)
            <div class="single-populer-post d-flex">
                <img src="{{ asset('storage/' . $post->preview_image) }}" alt="">
                <div class="post-content">
                    <a href="{{ route('post.show', $post) }}">
                        <h6>{{ $post->title }}</h6>
                    </a>
                    <p>{{ $post->dateAsCarbon->format('l, F d, Y') }}</p>
                </div>
            </div>
            @endforeach
            <!-- Single Popular Post -->
        </div>
    </div>
</div>
