<template>
     <div class="container-m" >
        <nav class="search-page-header">

         <div class="back-btn">
            
            <router-link  to="router.back()">   <vue-fontawesome icon="chevron-left" class="icon-color icon-styles" ></vue-fontawesome>   Back</router-link>
              <!-- <a href="#" to="router.back()"></a> -->
        </div>
          
        <div class="search-form">
            <form action="#">
              <input type="text" v-model="searchValue"  placeholder="Search movie by title">
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

        <div>
         <main id="main" v-for="(item, index) in movies"  :key="index">
          <div class="movie" >
               <img :src="item.poster_path ? IMG_URL+item.poster_path: DEMO_IMG_URL " alt="Some Movie">

            <div class="movie-info">
                 <h3>{{item.title.length > 9 ? item.title.slice(0,13)+'...': item.title}}</h3>
                <span :class="getColor(item.vote_average)">{{item.vote_average}}</span>
            </div>

            <div class="overview">

                <h3>Overview</h3>
                  {{item.overview.length > 200 ? item.overview.slice(0,200)+'...': item.overview }}
                <br/> 
                <button class="know-more" id="567765">Watch Now</button>
            </div>
          </div>
     </main>    
        </div>
     </div>
</template>
<script>
export default {

   data(){
     return{
        movies:[],
        searchValue : "",
        API_KEY:'api_key=1cf50e6248dc270629e802686245c2c8',
     }
   },
   methods:{
                async Loadmovies(){
                                  await fetch(`https://api.themoviedb.org/3/discover/movie?sort_by=popularity.desc&?&${this.API_KEY}`)
                                 .then( (response)=> {
                                         const dataRow = response.json();
                                          this.movies = dataRow.results;  
                                 })
                                 .catch((error) =>{
                                         console.log(error)
                                 })
                         
                         

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
                 console.log(this.movies)
        }
    
}
</script>
<style scoped>

</style>