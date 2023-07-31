import Vue from "vue";
import VueRouter from "vue-router";
import Product from "./components/Product.vue";
import Post from "./components/Post.vue";
import Body from './components/Body.vue';
import Login from './components/Login.vue';
import Register from './components/Register.vue';
import ErrorPage from './components/ErrorPage.vue';

Vue.use(VueRouter)

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/product/:id',
            component: Product,
            name: 'product',
        },
        {
            path: '/post/:id',
            component: Post,
            name: 'post',
        },
        {
            path: '/',
            component: Body,
            name: 'home'
        },
        {
            path: '/login',
            component: Login,
            name: 'login',
        },
        {
            path: '/register',
            component: Register,
            name: 'register',
        },
        {
            path: '/404-not-found',
            component: ErrorPage,
            name: 'error',
        }
    ]
});

export default router;