<template>
     <div class="container-m" >
         <headerComponent />
         <loadmovies/>
     </div>
</template>

<script>

import Loadmovies from '../Loadmovie.vue';
import HeaderComponent from '../HeaderComponent.vue';
export default {
    name:'Home',
    components:{
      Loadmovies,
      HeaderComponent
    },
    data(){
        return{
         isActive:false,
         categories:[],
         movies:[],
         valueAsign:""
        }
    },
    methods:{
            async  Loadcategories(){
                            const response = await fetch("http://localhost:3000/api/category/");
                            const dataRow = await response.json();
                            this.categories = dataRow.data;
         },

         async Loadmovies(){
                            const response = await fetch("http://localhost:3000/api/movie/");
                            const dataRow = await response.json();
                            this.movies = dataRow.data;
         },
        async  FilterCategories(param){
             if(param!= null){
                            const response = await fetch(`http://localhost:3000/api/movie/bycategory/${param}`);
                            const dataRow = await response.json();
                            this.movies = dataRow.data;
                            this.valueAsign = param;
             }else{
                 console.log(param);
             }

         }
    },
    created(){
       this.Loadcategories();
       this.Loadmovies();
       console.log('created');
    }
}
</script>
