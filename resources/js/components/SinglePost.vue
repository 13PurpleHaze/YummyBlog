<template>
    <!-- ****** Breadcumb Area Start ****** -->
<!--    <div class="breadcumb-area" style="background-image: url('assets/img/bg-img/breadcumb.jpg');">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="bradcumb-title text-center">
                        <h2>{{ post->title }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>-->
    <div class="breadcumb-nav" v-if="post">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><router-link :to="{name: 'post.index'}"><i class="fa fa-home"
                                                                                               aria-hidden="true"></i>
                                Home</router-link></li>
                            <li class="breadcrumb-item"><router-link :to="{name: 'post.index'}">Posts</router-link></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ post.title }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ****** Breadcumb Area End ****** -->
    <!-- ****** Single Blog Area Start ****** -->
    <section class="single_blog_area section_padding_80" v-if="post">
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
                                    <img :src="`/storage/${post.preview_image}`" alt="">
                                </div>
                                <!-- Post Content -->
                                <div class="post-content">
                                    <div class="post-meta d-flex">
                                        <div class="post-author-date-area d-flex">
                                            <!-- Post Date -->
                                            <div class="post-date">
                                                <a href="#">{{ post.created_at }}</a>
                                            </div>
                                        </div>
<!--                                        &lt;!&ndash; Post Comment & Share Area &ndash;&gt;
                                        <div class="post-comment-share-area d-flex">
                                            &lt;!&ndash; Post Favourite &ndash;&gt;
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
                                            &lt;!&ndash; Post Comments &ndash;&gt;
                                            <div class="post-comments">
                                                <a href="#" class="pl-2">
                                                    @auth()
                                                    @if(auth()->user()->comments->contains('post_id', $post->id))
                                                    <i class="fa fas fa-comment" aria-hidden="true"></i>
                                                    {{ $post->comments->count() }}
                                                    @else
                                                    <i class="fa fa-comment-o" aria-hidden="true"></i>
                                                    {{ $post->comments->count() }}
                                                    @endif
                                                    @endauth
                                                    @guest()
                                                    <i class="fa fas fa-comment-o" aria-hidden="true"></i>
                                                    {{ $post->comments->count() }}
                                                    @endguest
                                                </a>
                                            </div>
                                            &lt;!&ndash; Post Share &ndash;&gt;
                                            <div class="post-share">
                                                <a href="#"><i class="fa fa-share-alt" aria-hidden="true"></i></a>
                                            </div>
                                        </div>-->
                                    </div>
                                    <a href="#">
                                        <h2 class="post-headline">{{ post.title }}</h2>
                                    </a>
                                    <div v-html="post.content"></div>
                                </div>
                            </div>

                            <!-- Tags Area -->
<!--                            <div class="tags-area">
                                @foreach($post->tags as $tag)
                                <a href="{{ route('tag.post.index', $tag) }}">{{ $tag->title }}</a>
                                @endforeach
                            </div>-->
<!--

                            @if($relatedPosts)
                            &lt;!&ndash; Related Post Area &ndash;&gt;
                            <div class="related-post-area section_padding_50">
                                <h4 class="mb-30">Related post</h4>

                                <div class="related-post-slider owl-carousel">
                                    &lt;!&ndash; Single Related Post&ndash;&gt;
                                    @foreach($relatedPosts as $relatedPost)
                                    <div class="single-post">
                                        &lt;!&ndash; Post Thumb &ndash;&gt;
                                        <div class="post-thumb">
                                            <img src="{{ asset('storage/' . $relatedPost->preview_image) }}" alt="">
                                        </div>
                                        &lt;!&ndash; Post Content &ndash;&gt;
                                        <div class="post-content">
                                            <div class="post-meta d-flex">
                                                <div class="post-author-date-area d-flex">
                                                    &lt;!&ndash; Post Date &ndash;&gt;
                                                    <div class="post-date">
                                                        <a href="#">{{ $relatedPost->dateAsCarbon->format('F d, Y') }}</a>
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
                            @endif
-->

                            <!-- Comment Area Start -->
<!--                            @if($post->comments->count() > 0)
                            <div class="comment_area section_padding_50 clearfix">
                                <h4 class="mb-30">{{ $post->comments->count() > 1 ? $post->comments->count() . ' commments' : $post->comments->count() . ' comment' }}</h4>

                                <ol>
                                    @foreach($post->comments as $comment)
                                    &lt;!&ndash; Single Comment Area &ndash;&gt;
                                    <li class="single_comment_area">
                                        <div class="comment-wrapper d-flex">
                                            &lt;!&ndash; Comment Meta &ndash;&gt;
                                            <div class="comment-author">
                                                <img src="{{ isset($comment->user->photo) ? asset('storage/' . $comment->user->photo) : asset('storage/images/none.png') }}" alt="">
                                            </div>
                                            &lt;!&ndash; Comment Content &ndash;&gt;
                                            <div class="comment-content">
                                                    <span
                                                        class="comment-date text-muted">{{ $comment->dateAsCarbon->diffForHumans() }}</span>
                                                <h5>{{ $comment->user->name }}</h5>
                                                <p>{{ $comment->message }}</p>
                                            </div>
                                        </div>
                                    </li>
                                    @endforeach
                                </ol>
                            </div>
                            @endif
                            @auth()
                            &lt;!&ndash; Leave A Comment &ndash;&gt;
                            <div class="leave-comment-area section_padding_50 clearfix">
                                <div class="comment-form">
                                    <h4 class="mb-30">Leave A Comment</h4>

                                    &lt;!&ndash; Comment Form &ndash;&gt;
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
                            @endauth-->
                        </div>
                    </div>
                </div>

                <!-- ****** Blog Sidebar ****** -->

            </div>
        </div>
    </section>
    <!-- ****** Single Blog Area End ****** -->
</template>

<script>
import axios from "axios";

export default {
    name: "SinglePost",
    data() {
        return {
            post: null,
        }
    },
    mounted() {
        this.getPost();
    },
    methods: {
        async getPost() {
            const responce = await axios.get(`/api/posts/${this.$route.params.id}`);
            this.post = responce.data.data;
        }
    }
}
</script>

<style scoped>

</style>
