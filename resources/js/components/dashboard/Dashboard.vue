<template>
 <div>
      <div class="main">
           <div class="container">
                <header>
                     <div class="title">
                         <h2>Manage Movies</h2>
                     </div>
                      <div class="button">
                          <button @click="Activatecategorymodal">
                              Movie Categories
                          </button>
                     </div>
                     <div class="button">
                          <button @click="Activatemodal">
                              Create New
                          </button>
                     </div>
                </header>
                <section>

                     <table>
                         <thead>
                             <tr>
                                 <th>S/N</th>
                                 <th>Image</th>
                                 <th>Movie Title </th>
                                 <th>Movie Category</th>
                                 <th>Description</th>
                                 <th>Popular Artist</th>
                                 <th>Rate</th>
                                 <th>Created Date</th>
                                 <th>Action</th>
                             </tr>
                         </thead>
                         <tbody>
                             <tr v-for="(movie, index) in movies" :key="movie.id">
                                 <td >{{index+1}}</td>
                                 <td><img :src="movie.image" alt=""></td>
                                 <td>{{movie.title}}</td>
                                 <td>{{movie.category_id}}</td>
                                 <td>{{movie.description}}</td>
                                  <td>{{movie.artist}}</td>
                                  <td>5</td>
                                  <td>{{movie.created_at}}</td>
                                  <td> <a href="#" class="red">Delete</a>| <a href="#" class="green">Edit</a>|<a href="#">View</a></td>
                             </tr>
                         </tbody>
                     </table>
                      
                </section>
           </div>
      </div>
       
       <!--Add Movies Modal  -->
     <addmovies :check="isactive" />
     <addcategory :check="isactiveCategory" />
    </div>
</template>

<script>
import Addmovies from './Addmovies.vue';
import Addcategory from './Addcategory.vue';
export default {

    components:{
        Addmovies,
        Addcategory
    },

    data(){
        return{
            srn:1,
        isactive:false,
        isactiveCategory:false,
        movies:[]
            
        }
    },

    async created(){
    //   using async

           const response = await fetch("http://localhost:3000/api/movie/");
           const dataRow = await response.json();
           this.movies = dataRow.data;
           
    },
    methods:{
        Activatemodal(){
        this.isactive = true;
        console.log(this.isactive);
        },
        Activatecategorymodal(){
          this.isactiveCategory = true;
        }
    }
       
   

 
    
}
</script>
<style scoped>

</style>
