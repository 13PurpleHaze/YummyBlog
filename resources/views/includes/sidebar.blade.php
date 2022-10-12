<!-- ****** Blog Sidebar ****** -->
<div class="col-12 col-sm-8 col-md-6 col-lg-4">
    <div class="blog-sidebar mt-5 mt-lg-0">
        <!-- Single Widget Area -->
        <div class="single-widget-area about-me-widget text-center">
            <div class="widget-title">
                <h6>About Me</h6>
            </div>
            <div class="about-me-widget-thumb">
                <img src="{{ asset('assets/img/about-img/1.jpg') }}" alt="">
            </div>
            <h4 class="font-shadow-into-light">Shopia Bernard</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt</p>
        </div>

        <!-- Single Widget Area -->
        <div class="single-widget-area subscribe_widget text-center">
            <div class="widget-title">
                <h6>Subscribe &amp; Follow</h6>
            </div>
            <div class="subscribe-link">
                <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-google" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-vimeo" aria-hidden="true"></i></a>
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
                <img src="{{ 'storage/' . $post->preview_image }}" alt="">
                <div class="post-content">
                    <a href="#">
                        <h6>{{ $post->title }}</h6>
                    </a>
                    <p>{{ $post->created_at }}</p>
                </div>
            </div>
            @endforeach
            <!-- Single Popular Post -->
        </div>

        <!-- Single Widget Area -->
        <div class="single-widget-area add-widget text-center">
            <div class="add-widget-area">
                <img src="{{ asset('assets/img/sidebar-img/6.jpg') }}" alt="">
                <div class="add-text">
                    <div class="yummy-table">
                        <div class="yummy-table-cell">
                            <h2>Cooking Book</h2>
                            <p>Buy Book Online Now!</p>
                            <a href="#" class="add-btn">Buy Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Single Widget Area -->
        <div class="single-widget-area newsletter-widget">
            <div class="widget-title text-center">
                <h6>Newsletter</h6>
            </div>
            <p>Subscribe our newsletter gor get notification about new updates, information discount, etc.</p>
            <div class="newsletter-form">
                <form action="#" method="post">
                    <input type="email" name="newsletter-email" id="email" placeholder="Your email">
                    <button type="submit"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
                </form>
            </div>
        </div>
    </div>
</div>
