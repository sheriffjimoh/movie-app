<template>
<div>
    
       <!-- Categroy -->
      <vue-horizontal-list :items="categories" :options="Categoryoptions">
     <template v-slot:nav-prev >
        <div ><vue-fontawesome icon="angle-left" class="icon-color icon-styles"/></div>
      </template>

      <template v-slot:nav-next>
         <div ><vue-fontawesome icon="angle-right" class="icon-color icon-styles"/></div>
      </template>

      <template v-slot:default="{ item }">
      <div class="header-section">
          <div class="category-items-list" >
              <button class="category-item  btn  " :class="{'active': valueAsign == item.id}"
               @click="FilterCategories(item.id)">
                  {{item.name}}
              </button>
          </div>
      </div>
      
      </template>
     </vue-horizontal-list>
        <!-- Middle Block -->
        <div class="middle-area">
          <div>
            <h2>Top  <span class="red">Rated HD</span> Movies</h2>
            <p>New block buster released await you!</p>
             </div>
           <div class="seemore">
             <a href="http://">See More</a>
           </div>
        </div>

        <!-- movie list -->
     <vue-horizontal-list :items="movies" :options="options">
     <template v-slot:nav-prev>
     <div ><vue-fontawesome icon="angle-left" class="icon-color icon-styles"/></div>
      </template>

      <template v-slot:nav-next>
         <div ><vue-fontawesome icon="angle-right" class="icon-color icon-styles"/></div>
      </template>

      <template v-slot:default="{ item }">
             <movieContainer :item="item" />
      </template>
     </vue-horizontal-list>


     <!-- Triller Movies -->

      <!-- Middle Block -->
        <div class="middle-area">
           <div>
             <h2>Top  <span class="red">Triller</span> Movies</h2>
            <p>The trillers you can't miss!</p>
           </div>
           <div class="seemore">
             <a href="http://">See More</a>
           </div>
            
        </div>

        <!-- movie list -->
     <vue-horizontal-list :items="trillerMovies" :options="options">
     <template v-slot:nav-prev>
         <div ><vue-fontawesome icon="angle-left" class="icon-color icon-styles"/></div>
      </template>

      <template v-slot:nav-next>
        <div ><vue-fontawesome icon="angle-right" class="icon-color icon-styles"/></div>
      </template>

      <template v-slot:default="{ item }">
        <movieContainer :item="item" />
      </template>
     </vue-horizontal-list>
</div>
</template>

<script> 

 import VueHorizontalList from "vue-horizontal-list";
 import MovieContainer from './MovieContainer.vue'
export default {

  components: {
    VueHorizontalList,
    MovieContainer
    },
    data(){
        return{
             isActive:false,
             movies:[],
             trillerMovies:[],
             valueAsign:"",
             API_KEY:'api_key=1cf50e6248dc270629e802686245c2c8',
             options: {
                 
                 navigation: {
                    // when to show navigation
                    start:250,
                    color: "red",
                },
                 responsive: [
                       {end: 576, size: 1},
                        {start: 576, end: 768, size: 2},
                        {start: 768, end: 992, size: 3},
                        {start: 992, end: 1200, size: 4},
                        {start: 1200, size: 5}
                 ],
                  list: {
                    // 1200 because @media (min-width: 1200px) and therefore I want to switch to windowed mode
                    windowed: 1200,
                    
                    // Because: #app {padding: 80px 24px;}
                    padding: 24
        },
         autoplay: {
                    // enable/disable playing slideshow
                    play: true,
                    // the delay duration between slides in milliseconds
                    speed: 1800,
                    // if setup, the slideshow will be in the loop.
                    repeat: true,
                },
                                
            },
        //    category
        categories:[],
        valueAsign:0,
        API_KEY:'api_key=1cf50e6248dc270629e802686245c2c8',

         Categoryoptions: {
                 
                 navigation: {
                    // when to show navigation
                    start: 250,
                    color: "red",
                },
                 responsive: [
                       {end: 576, size: 3},
                        {start: 576, end: 768, size: 4},
                        {start: 768, end: 868, size: 5},
                        {start: 868, end: 992, size: 6},
                        {start: 992, end: 1200, size: 6},
                        {start: 1200, size: 8}
                 ],
                  list: {
                    // 1200 because @media (min-width: 1200px) and therefore I want to switch to windowed mode
                    windowed: 1200,
                    
                    // Because: #app {padding: 80px 24px;}
                    padding: 24
        },
               
            },
          
          }
        },
       
     methods:{
                 async Loadmovies(){
                            const response = await fetch(`https://api.themoviedb.org/3/discover/movie?sort_by=popularity.desc&?&${this.API_KEY}`);
                            const dataRow = await response.json();
                            console.log(dataRow);
                            this.movies = dataRow.results;
         }, 
          async  Loadcategories(){
                            const response = await fetch(`https://api.themoviedb.org/3/genre/movie/list?&${this.API_KEY}`);
                            const dataRow = await response.json();
                            this.categories = dataRow.genres;
            },

          async  FilterCategories(param){
             if(param!= null){
                            const response = await fetch(`https://api.themoviedb.org/3/discover/movie?sort_by=popularity.desc&${this.API_KEY}&with_genres=${param}`);
                            const dataRow = await response.json();
                            this.movies = dataRow.results;
                            this.valueAsign = param; 
                            
             }else{
                 console.log(param);
             }

            console.log(param);
            console.log(this.valueAsign);
            },
            
          async  TrillerMovies(){
             
                            const response = await fetch(`https://api.themoviedb.org/3/discover/movie?sort_by=popularity.desc&${this.API_KEY}&with_genres=53`);
                            const dataRow = await response.json();
                            this.trillerMovies = dataRow.results;
                 
            },
         
         
          getColor(vote) {
                        if(vote>= 8){
                            return 'green'
                        }else if(vote >= 5){
                            return "orange"
                        }else{
                            return 'red'
                        }
                    }
        },


        created(){
                  this.Loadmovies();
                  this.Loadcategories();
                  this.TrillerMovies();
                 
        }
    
}
</script>

<style scoped>

</style>