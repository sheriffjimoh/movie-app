
import VueProgressBar from 'vue-progressbar';
window.Vue = require('vue').default;
Vue.use(VueProgressBar, {
  color: 'rgb(255, 0, 55)',
  failedColor: 'red',
  height: '4px',
  transition: {
    speed: '0.4s',
    opacity: '0.6s',
    termination: 300
  },
});