import {createRouter, createWebHistory} from "vue-router/dist/vue-router";
import HomePage from "./components/HomePage.vue";
import CategoriesPage from "./components/CategoriesPage.vue";
import SinglePost from "./components/SinglePost.vue";

export default createRouter({
    history: createWebHistory(),
    routes: [
        {
            path: '/posts',
            component: HomePage,
            name: 'post.index'
        },
        {
            path: '/categories',
            component: CategoriesPage,
            name: 'category.index'
        },
        {
            path: '/posts/:id',
            component: SinglePost,
            name: 'post.show'
        },
    ]
});
