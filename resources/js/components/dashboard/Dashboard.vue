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
                             <tr>
                                 <td>1</td>
                                 <td><img src="https://lumiere-a.akamaihd.net/v1/images/p_cruella_disneyplus_21093_6184d4aa.jpeg" alt=""></td>
                                 <td>New Era Jack</td>
                                 <td>Nollywood</td>
                                 <td>Duis aute irure dolor in reprehendeit in voluptate velit esse....</td>
                                  <td>Yemi Lare, Badmus Thomas, Eld Cuper</td>
                                  <td>5</td>
                                  <td>02/03/2030</td>
                                  <td> <a href="#" class="red">Delete</a>| <a href="#" class="green">Edit</a>|<a href="#">View</a></td>
                             </tr>
                               <tr>
                                 <td>2</td>
                                 <td><img src="https://lumiere-a.akamaihd.net/v1/images/p_cruella_disneyplus_21093_6184d4aa.jpeg" alt=""></td>
                                 <td>New Era Jack</td>
                                 <td>Nollywood</td>
                                 <td>Duis aute irure dolor in reprehendeit in voluptate velit esse....</td>
                                  <td>Yemi Lare, Badmus Thomas, Eld Cuper</td>
                                  <td>5</td>
                                  <td>02/03/2030</td>
                                  <td> <a href="#" class="red">Delete</a>| <a href="#" class="green">Edit</a>|<a href="#">View</a></td>
                             </tr>
                               <tr>
                                 <td>3</td>
                                 <td><img src="https://d2j1wkp1bavyfs.cloudfront.net/admin-uploads/posters/f9-movie-poster_1618415923.jpg?d=360x540&q=50" alt=""></td>
                                 <td>New Era Jack</td>
                                 <td>Nollywood</td>
                                 <td>Duis aute irure dolor in reprehendeit in voluptate velit esse....</td>
                                  <td>Yemi Lare, Badmus Thomas, Eld Cuper</td>
                                  <td>5</td>
                                  <td>02/03/2030</td>
                                  <td> <a href="#" class="red">Delete</a>| <a href="#" class="green">Edit</a>|<a href="#">View</a></td>
                             </tr>
                         </tbody>
                     </table>
                      
                </section>
           </div>
      </div>
       
       <!--Add Movies Modal  -->
     <modal :check="isactive" ></modal>
    </div>
</template>

<script>
import modal from '../../components/modal.vue';
export default {

    components:{
        modal
    },

    data(){
        return{
        isactive:false
            
        }
    },
    methods:{
        Activatemodal(){
        this.isactive = true;
        console.log(this.isactive);
        }
    }
       
   

 
    
}
</script>
<style scoped>

</style>
