<template>
     <div class="container-m" >
         <header class="header-section">
            
            <ul class="category-items-list" v-for="category in categories" :key="category.id">
                
                <li class="category-item " :class="{'active': valueAsign == category.name}">
                    <a href="#" @click="FilterCategories(category.name)">{{category.name}}</a>
                </li>
               
            </ul>
         </header>
         <div class="middle-area">
         <h2>Top rated <span class="secoundary-color">HD</span> movies</h2>
         <p>New block buster released await you!</p>

         </div>
         <div class="div-content">
               <div class="row">
                    <div class="movie-box" v-for="movie in movies " :key="movie.id">
                        <img :src="movie.image" alt="" class="movie-thumbnail">
                        <div class="movie-caption">
                        <h3 class="movie-title">{{movie.title}}</h3>
                        <h6>Movie 2021</h6>
                        {{movie.category_id}}
                        <a href="" class="btn btn-secondary-outline">Wacth Now</a>
                        </div>
                    </div>

               </div>
               
         </div>
     </div>
</template>

<script>
export default {
    name:'Home',
    data(){
        return{
         isActive:false,
         categories:[],
         movies:[],
         valueAsign:" "
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
         FilterCategories(param){
             if(param != null){
                this.valueAsign = param;
                this.movies = this.movies.filter((data) => data.category_id == this.valueAsign);
                console.log(param);
             }
         }
    },
    created(){
       this.Loadcategories();
       this.Loadmovies();
    }
 
}
</script>
