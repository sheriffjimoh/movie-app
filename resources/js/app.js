
require('./bootstrap');

//Import progressbar
require('./progressbar'); 

// Import sweet alert

require('./sweetalert');

// my Custom Event

 require('./customEvent');


window.Vue = require('vue').default;
Vue.component('app-component', require('./components/App.vue').default);
Vue.component('dashboard-component', require('./components/dashboard/Dashboard.vue').default);

// vue progress bar

// const options = {
//   color: '#bffaf3',
//   failedColor: '#874b4b',
//   thickness: '5px',
//   transition: {
//     speed: '0.2s',
//     opacity: '0.6s',
//     termination: 300
//   },
//   autoRevert: true,
//   location: 'left',
//   inverse: false
// }



const app = new Vue({
    el: '#app',
});

