import {createRouter, createWebHistory} from "vue-router/dist/vue-router";
import HomePage from "./components/HomePage.vue";
import SinglePost from "./components/SinglePost.vue";
import CategoryPage from "./components/CategoryPage.vue";
import CategoryPosts from "./components/CategoryPosts.vue";

export default createRouter({
    history: createWebHistory(),
    routes: [
        {
            path: '/posts',
            component: HomePage,
            name: 'post.index'
        },
        {
            path: '/posts/:id',
            component: SinglePost,
            name: 'post.show'
        },
        {
            path: '/categories/',
            component: CategoryPage,
            name: 'category.index'
        },
        {
            path: '/categories/:id/posts',
            component: CategoryPosts,
            name: 'category.post.index'
        },
    ]
});
