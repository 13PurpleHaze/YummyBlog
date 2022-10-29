<template>
    <!-- ****** Blog Sidebar ****** -->
    <div class="col-12 col-sm-8 col-md-6 col-lg-4">
        <div class="blog-sidebar mt-5 mt-lg-0">
            <!-- Single Widget Area -->
            <div class="single-widget-area subscribe_widget text-center">
                <div class="widget-title">
                    <h6>Subscribe &amp; Follow</h6>
                </div>
                <div class="subscribe-link">
                    <template v-for="social in socials">
                        <a :href="social.link"><i :class="`fa fa-${social.title}`" aria-hidden="true"></i></a>
                    </template>
                </div>
            </div>

            <!-- Single Widget Area -->
            <div class="single-widget-area popular-post-widget">
                <div class="widget-title text-center">
                    <h6>Popular Posts</h6>
                </div>
                <!-- Single Popular Post -->
                <!--                @foreach($popularPosts as $post)
                                <div class="single-populer-post d-flex">
                                    <img src="{{ asset('storage/' . $post->preview_image) }}" alt="">
                                    <div class="post-content">
                                        <a href="{{ route('post.show', $post) }}">
                                            <h6>{{ $post->title }}</h6>
                                        </a>
                                        <p>{{ $post->dateAsCarbon->format('l, F d, Y') }}</p>
                                    </div>
                                </div>
                                @endforeach-->
                <!-- Single Popular Post -->
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
    name: "SideBar",
    data() {
        return {
            posts: [],
            socials: [],
        }
    },
    mounted() {
        this.getSocials();
        this.getPopularPosts()
    },
    methods: {
        async getPopularPosts() {
            const responce = await axios.get('/api/posts');
            this.posts = responce.data.data;
        },
        async getPostUserLikes() {
            const responce = axios.get('/api/posts');
        },
        async getSocials() {
            const responce = await axios.get('/api/socials');
            this.socials = responce.data.data;
        }
    },
    computed: {
        popularPosts() {

        }
    }
}
</script>

<style scoped>

</style>
