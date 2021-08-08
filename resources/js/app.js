import Vue from 'vue';
require('./bootstrap');

//Import progressbar
require('./progressbar'); 

// Import sweet alert

require('./sweetalert');

// my Custom Event

 require('./customEvent');


window.Vue = require('vue').default;

// Default component 
Vue.component('app-component', require('./components/App.vue').default);
Vue.component('dashboard-component', require('./components/dashboard/Dashboard.vue').default);



// router

import router from "./router.js";

const app = new Vue({
    el: '#app',
    router
});

