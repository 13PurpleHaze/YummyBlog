import './bootstrap';
import '../sass/app.scss'


import {createApp} from "vue/dist/vue.esm-bundler";
import router from "./router";
import HomePage from "./components/HomePage.vue";

createApp({
    components: {
        HomePage,
    }
}).use(router).mount('#app');
