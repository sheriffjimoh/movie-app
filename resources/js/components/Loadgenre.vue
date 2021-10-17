<template>
  <vue-horizontal-list :items="categories" :options="options">
     <template v-slot:nav-prev >
        <div ><i class="fa fa-angle-left"></i></div>
      </template>

      <template v-slot:nav-next>
        <div ><i class="fa fa-angle-right"></i></div>
      </template>

      <template v-slot:default="{ item }">
      <div class="header-section">
          <div class="category-items-list" :class="{'active': valueAsign == item.name}">
              <button class="category-item " @click="props.Amethod(item.id)">
                  {{item.name}}
              </button>
          </div>
      </div>
      
      </template>
     </vue-horizontal-list>
</template>
<script>

  import VueHorizontalList from "vue-horizontal-list";
export default {
  props:{
    Amethod
  },
  components: {
        VueHorizontalList
    },
    data(){
        return{
        categories:[],
         valueAsign:"",
        API_KEY:'api_key=1cf50e6248dc270629e802686245c2c8',

         options: {
                 
                 navigation: {
                    // when to show navigation
                    start: 250,
                    color: "red",
                },
                 responsive: [
                       {end: 576, size: 3},
                        {start: 576, end: 768, size: 4},
                        {start: 768, end: 992, size: 6},
                        {start: 992, end: 1200, size: 6},
                        {start: 1200, size: 6}
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
             async  Loadcategories(){
                            const response = await fetch("https://api.themoviedb.org/3/genre/movie/list?&api_key=1cf50e6248dc270629e802686245c2c8");
                            const dataRow = await response.json();
                            this.categories = dataRow.genres;
            },
             async  FilterCategories(param){
             if(param!= null){
                            const response = await fetch(`http://localhost:3000/api/movie/bycategory/${param}`);
                            const dataRow = await response.json();
                            this.movies = dataRow.data;
             }else{
                 console.log(param);
             }

         }
    },
    created(){

        this.Loadcategories();

    }
    
}
</script>

<style scoped>

</style>