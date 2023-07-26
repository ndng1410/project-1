import Vue from "vue";
import VueRouter from "vue-router";
import Product from "./components/Product.vue";
import Body from './components/Body.vue';
import Login from './components/Login.vue';

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
            path: '/',
            component: Body,
            name: 'home'
        },
        {
            path: '/login',
            component: Login,
            name: 'login',
        }
    ]
});

export default router;