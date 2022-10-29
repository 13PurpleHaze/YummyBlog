<template>
    <!-- ****** Categories Area Start ****** -->
    <section class="categories_area clearfix" id="about">
        <div class="container">
            <div class="row">
                <template v-for="category in categories" :key="category.id">
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="single_catagory wow fadeInUp" data-wow-delay=".3s">
                            <img :src=" category.picture ? `/storage/${category.picture}` : '/storage/images/none.png'"
                                 alt="">
                            <div class="catagory-title">
                                <router-link :to="{name: 'category.post.index', params: {id: category.id}}">
                                    <h5>{{ category.title }}</h5>
                                </router-link>
                            </div>
                        </div>
                    </div>
                </template>
            </div>
        </div>
    </section>
    <!-- ****** Categories Area End ****** -->
</template>

<script>
import axios from "axios";

export default {
    name: "CategoryPage",
    data() {
        return {
            categories: [],
        }
    },
    mounted() {
        this.getCategories();
    },
    methods: {
        async getCategories() {
            const responce = await axios.get('/api/categories');
            this.categories = responce.data.data;
        }
    }
}
</script>

<style scoped>

</style>
