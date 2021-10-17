<template>
   <main id="main">
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
</template>
<script>
export default {
  props: ['item'],
    data(){

        return{
           DEMO_IMG_URL:'http://via.placeholder.com/1080x1580',
           IMG_URL : 'https://image.tmdb.org/t/p/w500',
        }
    },
     methods:{
            getColor(vote) {
                 if(vote>= 8){
                     return 'green'
                 }else if(vote >= 5){
                     return "orange"
                 }else{
                     return 'red'
                 }
             }
     }
}
</script>

<style scoped>

</style>