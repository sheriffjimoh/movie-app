<template>
      <div class="modal-datas" v-if="check">
          <section class="modal-section"  >
                <div class="modal">
                    <div class="modal-top">
                       <h1>Add Categories</h1>
                       <div class="close">
                        <button @click="ModalDeactivate"><span>x</span></button>    
                       </div>
                   </div>
                    
                       
                        
                     <div class="modal-body">
                      
                         <form ref="form" @submit.prevent="formAction">
                            <div class="row">
                                <div>
                                    <input type="text" v-model="form.name"  placeholder="Movie Category" id="name   ">
                               <div class="alert_error" v-if="form.errors.has('name')" v-html="form.errors.get('name')" />
                                 
                                </div>
                                
                                <div class="div-submit">
                                    <input type="submit" name="" id=""  value="Create">
                                </div>
                             </div>
                         </form>
                    </div>
                     <div class="data-section">

                         <h3>Categories List</h3>

                         <table>
                             <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                             </thead>
                             <tbody>
                                 <tr v-for="category in categories" :key="category.id">
                                     <td>{{category.name}}</td>
                                     <td>{{category.created_at| formatDate}}</td>
                                <td> <a href="#" @click="deleteMe(category.id)" class="red">Delete</a>| <a href="#" class="green">Edit</a></td>
                         
                                 </tr>
                             </tbody>

                         </table>

                    </div>
            
                </div>
        </section>
    </div>
</template>



<script>
export default {
     data(){
        return{
        isactiveCategory:true,
        categories:[],
        form: new Form({name:""}),
            
        }

     },

     props:{
        check :Boolean
     },

      methods:{
           ModalDeactivate(){
             window.location.reload();

           },
            async loadcategories(){
                    const response = await fetch("http://localhost:3000/api/category/");
                            const dataRow = await response.json();
                            this.categories = dataRow.data;
             },

             deleteMe(param){
                  Swal.fire({
                    title: 'Are you sure?',
                    text: 'This record and it`s details will be permanantly deleted!',
                    icon: 'warning',
                    buttons: ["Cancel", "Yes!"],
                }).then(function(value) {
                    if (value) {
                         fetch(`/api/category/${param}`,{
                            method:'delete' })
                            .then((res) => console.log(res.json()) )
                            .then(()=> {
                         Fire.$emit('AfterCreatedCategoriesLoadIt');
                 });
                    }
                });
             },
   


            formAction(){
                //  console.log(this.);
             this.form.post('/api/category').then((data) => {
                if(data.data.status == 404){
                 Swal.fire({'icon':'error', 'text':data.data.message});    
                }else if(data.data.status == 200){
                 Swal.fire({'icon':'success', 'text':data.data.message}); 
                 this.form.name =" "; 
                 Fire.$emit('AfterCreatedCategoriesLoadIt');
                  
                }
                })
                .catch((data) => {
                     Swal.fire({'icon':'error', 'text':data.data.message});  
                })
    },
 },
    created(){
             this.loadcategories();       
           Fire.$on('AfterCreatedCategoriesLoadIt',()=>{ 
                //custom events fire on
                this.loadcategories();
            });

           
    }
}
</script>

<style scoped>

.active{
  display: block;
}
.inactive{
  display: none;
}
.modal-datas{
    width: 100%;
    padding: 0px;
    margin: 0px;
    display: flex;
    justify-content: center;
}

.row{
  display: flex;
  flex-direction: row;
}
.modal-section{
      display: flex;
      justify-content: center;
      width:100%;
      height: 100%;
      position: fixed;
      top: 0px;
     opacity: 2;
      background-color: rgb(204, 189, 189);
      transition: 1s;
      transition-delay: 1ms;
  }
.modal{
      display: flex;
      flex-direction: column;
      flex-wrap: wrap;
      position: absolute;
      top:10%;
      bottom:0;
      width:620px ;
      height: 520px;
      background-color:#fff;
      opacity: 1;
      
  }
.modal  .modal-top{
       display: flex;
       flex-direction: row;
       box-shadow:0px 2px 0px 0px lightgrey;
       justify-content: center;
       line-height: 10px;
  }
  .modal  .modal-top h1{
      flex-basis: 70%;
      padding-left: 13px;
      font-size: 20px;
      padding-top: 15px;
     
 }
  .modal  .modal-top .close{
      flex-basis: 30%;
      justify-content: right;
      text-align: right;
      padding-right: 13px;
      font-size:20px;
       padding-top: 25px;
      
 }
 
  .modal  .modal-top .close button{
      font-size:20px;
      background-color: #fff;
      border: none;
      font-weight: 800;
      border-radius: 50%;
      cursor: pointer;
  }
    .modal  .modal-top .close button:hover{
        border: none !important;
    }
   .modal .modal-body{
       display: flex;
       justify-content: center;
       padding-top: 20px;
       
    }

    .modal .modal-body form{
        width: 350px;
    }

     .modal .modal-body form .row{
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items:flex-start;
     }

      .modal .modal-body form .row div{
          padding: 10px;
      }
     
   .modal .modal-body form div input[type=text] {
         width: 300px;
        border-radius: 0%;
        border: 1px solid #15172B;
        padding: 10px;
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    }

     .modal .modal-body form div select{
        width: 319px;
        padding: 10px;
        border-radius: 0%;
        border: 1px solid #15172B;
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;

     }

     .modal .modal-body form div textarea{
         width: 314px;
     }

     .modal .modal-body form  .div-submit{
         justify-content: center;
         align-items: center;
         text-align: center;
     }
      .modal .modal-body form div input[type=submit] {
        padding:10px  50px  10px 50px;
        cursor: pointer;
        background-color: black;
        color: #fff;
        font-weight: 800;
        /* margin-bottom: 10px; */
     
    } 


 .modal-launch{
  padding-top: 13rem;
 }
    .modal-launch button{
         padding:10px  50px  10px 50px;
       cursor: pointer;
        background-color: black;
        color: #fff;
        font-weight: 800;
    }
    .alert{
        display: flex;
        flex-direction: column;
        width: 100%;
        justify-content: center;
        text-align: center;
        padding-top: 10px;
    }
.alert  .alert_success{
    background-color: rgb(10, 82, 10);
    color: white;
    font-weight: bolder;
    width: 600px;
    padding: 10px;
    }
    .alert_error{
    background-color: firebrick;
    color: white;
    font-weight: bolder;
    /* width: 600px;
    padding: 10px; */
     
     }
     .user_card{
         display: flex;
         flex-direction: column;
         justify-content: center;
         margin-top: 40px;
         box-shadow: 3px 3px 6px 6px #ccc;
         padding: 60px;
   }
   .user_card span{
       /* border-bottom:1px solid grey; */
       padding-top: 20px;;
   }
   .user_card button{
         padding:10px  50px  10px 50px;
       cursor: pointer;
        background-color: black;
        color: #fff;
        font-weight: 800;
       margin-top: 20px;;
   }

</style>