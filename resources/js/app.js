require('./bootstrap');
import Vue from 'vue/dist/vue';
window.Vue = require('vue');
 
import App from './App.vue';
import * as VueAxios from 'vue-axios';
import axios from 'axios';
import {routes} from './routes';
import VueRouter from 'vue-router';
 
Vue.use(VueRouter);
Vue.prototype.$axios = axios
 
const router = new VueRouter({
    mode: 'history',
    routes: routes
});
 
const app = new Vue({
    el: '#app',
    router: router,
    render: h => h(App),
});