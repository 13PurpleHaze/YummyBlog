<template>
    <section class="categories_area clearfix" id="about" v-if="posts">
        <div class="breadcumb-nav">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a :href="{name:'post.index'}"><i class="fa fa-home"
                                                                                              aria-hidden="true"></i>Home</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Category
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- ****** Breadcumb Area End ****** -->
    </section>
    <!-- ****** Archive Area Start ****** -->
    <section class="archive-area section_padding_80" v-if="posts">
        <div class="container">
            <div class="row">
                <!-- Single Post -->
                <template v-for="post in posts" :key="post.id">
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="single-post wow fadeInUp" data-wow-delay="0.1s">
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
                                    <!-- Post Comment & Share Area -->
<!--                                    <div class="post-comment-share-area d-flex">
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
                                                    {{ $post->likedUsers->count() }}
                                                </button>
                                            </form>
                                            @endauth
                                            @guest()
                                            <a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i>
                                                {{ $post->likedUsers->count() }}
                                            </a>
                                            @endguest
                                        </div>
                                        &lt;!&ndash; Post Comments &ndash;&gt;
                                        <div class="post-comments">
                                            <a href="#" class="pl-2"><i class="fa fa-comment-o"
                                                                        aria-hidden="true"></i>
                                                {{ $post->comments->count() }}
                                            </a>
                                        </div>
                                    </div>-->
                                </div>
                                <router-link :to="{name: 'post.show', params: {id: post.id}}">
                                    <h4 class="post-headline">{{ post.title }}</h4>
                                </router-link>
                            </div>
                        </div>
                    </div>
                </template>
            </div>
        </div>

    </section>
    <div class="btn" @click="getPosts">m</div>
    <!-- ****** Archive Area End ****** -->
</template>

<script>
import axios from "axios";

export default {
    name: "CategoryPosts",
    data() {
        return {
            posts: [],
            user: [],
        }
    },
    mounted() {
        this.getPosts();
        this.getUser();
    },
    methods: {
        async getPosts() {
            const responce = await axios.get(`/api/categories/${this.$route.params.id}/posts`);
            this.posts = responce.data.data;
        },
        async getUser() {
            const responce = await axios.get('/api/user');
            this.user = responce.data.data;
            console.log(responce)
        }
    },
}
</script>

<style scoped>

</style>
