<template>
     <div class="container-m" >
        <nav class="search-page-header">

         <div class="back-btn">
            
            <router-link  to="router.back()">   <vue-fontawesome icon="chevron-left" class="icon-color icon-styles" ></vue-fontawesome>   Back</router-link>
              <!-- <a href="#" to="router.back()"></a> -->
        </div>
          
        <div class="search-form">
            <form action="#">
              <input type="text" v-model="searchValue"  @change="handleSearch()" placeholder="Search movie by title">
            </form>
        </div>
       
        <div class="user-area">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Account
                </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="#">Dashboard</a>
                <a class="dropdown-item" href="#">Edit Profile</a>
                <a class="dropdown-item" href="#">Log Out</a>
              </div> 
  
        </div>
      </nav>
     <!-- search result -->
      <div  class="row-movies">
         <div class="movie-box"   v-for="(item, index) in movies"  :key="index">
              <movieContainer :item="item"/>
        </div>
      </div>
         
     </div>
</template>
<script>
import MovieContainer from "../../components/MovieContainer.vue"
export default {
  components:{
     MovieContainer
  },
   data(){
     return{
        movies:[],
        searchValue : "",
        API_KEY:'api_key=1cf50e6248dc270629e802686245c2c8',
     }
   },
   methods:{
                async Loadmovies(){
                  const response = await fetch(`https://api.themoviedb.org/3/discover/movie?sort_by=popularity.desc&?&${this.API_KEY}`);
                            const dataRow = await response.json();
                            this.movies = dataRow.results;
                   }, 
                     getColor(vote) {
                          if(vote>= 8){
                            return 'green'
                          }else if(vote >= 5){
                            return "orange"
                         }else{
                        return 'red'
                        }
                  },

              async    handleSearch(){
                    
                     const response = await fetch(`https://api.themoviedb.org/3/search/movie?api_key=${this.API_KEY}&language=en-US&query=${this.searchValue}&include_adult=false`);
                            const dataRow = await response.json();
                            this.movies = dataRow.results;
                            console.log(dataRow.results);
                    console.log(this.searchValue)
                  }
   },
   
   created(){

     console.log("created")
                  this.Loadmovies();    
                 console.log(this.movies)
        }
    
}
</script>
<style scoped>

</style>