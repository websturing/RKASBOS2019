
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import './bootstrap';

import Vue from 'vue';
import Vuetify from 'vuetify';
import VueRouter from 'vue-router';
import vueHeadful from 'vue-headful';
import VueProgressBar from 'vue-progressbar';
import axios from 'axios';
import VueAxios from 'vue-axios';
import Vuelidate from 'vuelidate';
import VueNoty from 'vuejs-noty';
import VuejsDialog from "vuejs-dialog";
import 'vuejs-dialog/dist/vuejs-dialog.min.css';
import vueXlsxTable from 'vue-xlsx-table'
// Tell Vue to install the plugin.


//Route information for Vue Router
import Dashboard from '@/js/components/Dashboard';
import Breadcums from '@/js/components/template/breadcums';
import Sekolah from '@/js/components/sekolah/sekolah';
import SekolahForm from '@/js/components/sekolah/form';


/* USERS */
import usersRegistrasi from '@/js/components/users/registrasi';



import urlBase from '@/js/setting/urlBase';
import Affix from 'vue-affix';


Vue.component('pagination', require('laravel-vue-pagination'));


    
const optionsVueProgressBar = {
  color: '#FC6600',
  failedColor: '#874b4b',
  thickness: '5px',
  transition: {
    speed: '0.2s',
    opacity: '0.6s',
    termination: 300
  },
  autoRevert: true,
  location: 'top',
  inverse: false
}

Vue.component('vue-headful', vueHeadful);
Vue.use(VueRouter,vueHeadful);
Vue.use(VueProgressBar,optionsVueProgressBar);
Vue.use(VueAxios,axios);
Vue.use(Affix);
Vue.use(Vuelidate);
Vue.use(VueNoty);
Vue.use(VuejsDialog)
Vue.use(vueXlsxTable, {rABS: false})
const UrlBaseVue = 'SJ1.0';

const router = new VueRouter({
    mode: 'history',
    base: urlBase.urlBase,
    linkActiveClass: 'active',
    routes: [
        {
            path: '/dashboard',
            name: 'Dashboard',
            meta:{
              title: "title"  
            },
            components: {
                default: Dashboard,
            },
            props: {
                default: true,
              }
        },
        {
            path: '/sekolah',
            name: 'Sekolah',
            components: {
                default: Sekolah,
            },
            props: {
                default: true,
              }
        },
        {
            path: '/sekolah/form',
            name: 'SekolahForm',
            components: {
                default: SekolahForm,
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
    created () {
            //  [App.vue specific] When App.vue is first loaded start the progress bar
            this.$Progress.start()
            //  hook the progress bar to start before we move router-view
            this.$router.beforeEach((to, from, next) => {
              //  does the page we want to go to have a meta.progress object
              if (to.meta.progress !== undefined) {
                let meta = to.meta.progress
                // parse meta tags
                this.$Progress.parseMeta(meta)
              }
              //  start the progress bar
              this.$Progress.start()
              //  continue to next page
              next()
            })
            //  hook the progress bar to finish after we've finished moving router-view
            this.$router.afterEach((to, from) => {
              //  finish the progress bar
              this.$Progress.finish()
            })
          }
});

export default app;



