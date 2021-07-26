<template>
 <div>
      <div class="main">
           <div class="container">
                <header>
                     <div class="title">
                         <h2>Manage Movies</h2>
                         <img src="http://127.0.0.1:8000/images/New Turn Weddings60f583a25c68e.png" alt="">
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
                                  <td>{{movie.created_at | formatDate}}</td>
                                  <td> <a href="#" class="red" @click="deleteMovie(movie.id)">Delete</a>| <a href="#" class="green">Edit</a>|<a href="#">View</a></td>
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
    name:"Dashboard",
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

    created(){
    //   using async
           this.loadmovies();       
           Fire.$on('AfterCreatedMovieLoadIt',()=>{ 
                //custom events fire on
                this.loadmovies();
            });
           
    },
    methods:{
        Activatemodal(){
        this.isactive = true;
        console.log(this.isactive);
        },
        Activatecategorymodal(){
          this.isactiveCategory = true;
        },

        async loadmovies(){
                    const response = await fetch("http://localhost:3000/api/movie/");
                            const dataRow = await response.json();
                            this.movies = dataRow.data;
                },
           

        getDate(param){
        var    date = new Date(param).toISOString().replace('-', '/').split('T')[0].replace('-', '/');
               return date;
        },

        deleteMovie(param){

            Swal.fire({
                    title: 'Are you sure?',
                    text: 'This record and it`s details will be permanantly deleted!',
                    icon: 'warning',
                    buttons: ["Cancel", "Yes!"],
                }).then(function(value) {
                    if (value) {
                         fetch(`/api/movie/${param}`,{
                            method:'delete' })
                            .then((res) => res.json())
                            .then(()=> {
                            //  this.movies = this.movies.filter((movie) => movie.id !== param)
                         Fire.$emit('AfterCreatedMovieLoadIt');
                 });
                    }
                });
           
        }

    }
       
   

 
    
}
</script>
<style scoped>

</style>
