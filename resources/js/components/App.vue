<template>
  <div>
     <dashboard-component></dashboard-component>
      <vue-progress-bar></vue-progress-bar>  
  </div>

</template>

<script>
import Dashboard from './dashboard/Dashboard.vue';
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
