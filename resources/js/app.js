
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import './bootstrap';
import Vue from 'vue';
import Vuetify from 'vuetify';
import VueRouter from 'vue-router';
//Route information for Vue Router

import Home from '@/js/components/Home';
import About from '@/js/components/About';
import Dashboard from '@/js/components/Dashboard';
import Breadcums from '@/js/components/template/breadcums';
Vue.use(VueRouter);

const UrlBaseVue = 'SJ1.0';

const router = new VueRouter({
    mode: 'history',
    base: UrlBaseVue,
    linkActiveClass: 'active',
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home
        },
        {
            path: '/about',
            name: 'About',
            component: About
        },
        {
            path: '/dashboard',
            name: 'Dashboard',
            components: {
                default: Dashboard,
            },
            props: {
                default: true,
              }
        },
    ]
});


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    router:router,
});

export default app;



