import Vue from 'vue';
require('./bootstrap');

//ImportingBootstrapVue
import BootstrapVue from 'bootstrap-vue';

// import { library } from '@fortawesome/fontawesome-svg-core'
// import { faUserSecret } from '@fortawesome/free-solid-svg-icons'
// import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

// library.add(faUserSecret);

// Vue.component('font-awesome-icon', FontAwesomeIcon);

//import material-icon scss
import "font-awesome/css/font-awesome.min.css";
 
//defined as global component
Vue.component('VueFontawesome', require('vue-fontawesome-icon/VueFontawesome.vue').default);
 

Vue.use(BootstrapVue); 

//Import progressbar
require('./progressbar'); 

// Import sweet alert

require('./sweetalert');

// my Custom Event

require('./customEvent');



window.Vue = require('vue').default;

// Default component 
Vue.component('app-component', require('./App.vue').default);
Vue.component('dashboard-component', require('./pages/dashboard/Dashboard.vue').default);



// router

import router from "./router.js";

const app = new Vue({
    el: '#app',
    router
});

