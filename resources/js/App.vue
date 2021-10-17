<template>
  <div class="app">
      <router-view></router-view>
      <vue-progress-bar></vue-progress-bar>  
  </div>

</template>

<script>
import Dashboard from './pages/dashboard/Dashboard.vue';
    export default {  
       name:'App',
       components:{
          Dashboard
       },
       beforeCreate(){
          this.$Progress.start();
       },
       created(){
           

          
       },
       mounted(){
            this.$Progress.finish();
       }
      
    }
</script>
