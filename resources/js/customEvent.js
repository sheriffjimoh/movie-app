//Vue Filter to make first letter Capital
Vue.filter("strToUpper", function(text) {

    return text.charAt(0).toUpperCase() + text.slice(1);

});

//Import Moment
import moment from "moment"; 

//Vue moment js to show human readable date

Vue.filter("formatDate", function(date) {

    return moment(date).format('MMMM Do YYYY');

}); 


// fire 
let Fire = new Vue()
window.Fire = Fire;

//Import v-from
import { Form, HasError, AlertError } from 'vform';
window.Form = Form;
Vue.component('vform', require('vue-vform'));
Vue.component(HasError, HasError)
Vue.component(AlertError, AlertError)
