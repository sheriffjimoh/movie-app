<template>
      <div class="modal-datas" v-if="check">
          <section class="modal-section"  >
                <div class="modal">
                    <div class="modal-top">
                       <h1>Add New Movie</h1>
                       <div class="close">
                        <button @click="ModalDeactivate"><span>x</span></button>    
                       </div>
                   </div>
                    
                       
                        
                     <div class="modal-body">
                      
                         <form ref="form" enctype="multipart/form-data"   @submit.prevent="formAction">
                              <div>

                                <input type="text" v-model="form.title"  name="title" placeholder="Movie Title" id="title"
                                :class="{ 'is-invalid': form.errors.has('title') }">
                                <div class="alert_error" v-if="form.errors.has('title')" v-html="form.errors.get('title')" />
                                 
                             </div>
                             <div>
                                 <select name="category" id="category" v-model="form.category"  >
                                     <option value="" selected>select--</option>
                                     <option v-for="category in categories" :value="category.id" :key="category.id">   {{ category.name }}
                                    </option>
                                 </select>
                                  <div class="text-danger" v-if="form.errors.has('category')" v-html="form.errors.get('category')" />
                             </div>
                              <div>
                                <textarea name="description" v-model="form.description" id="description" placeholder="Describe this movie..." cols="30" rows="5"></textarea>
                                  <div class="text-danger" v-if="form.errors.has('description')" v-html="form.errors.get('description')" />
                             </div>
                             <div>
                                <textarea name="artist" id="artist" v-model="form.artist" placeholder="Add most popular artist name in movie, seperate with comma..." cols="30" rows="5"></textarea>
                                  <div class="text-danger" v-if="form.errors.has('artist')" v-html="form.errors.get('artist')" />
                             </div>
                              <div class="file">
                                   <div>
                                  
                                  <input type="file"  name="file"   @change="readFile">  
                                  <br><br>
                                   <div class="text-danger" v-if="form.errors.has('file')" v-html="form.errors.get('file')" />
                                  </div>
                                
                                 <div>
                                      <img v-if=imgUrl :src="imgUrl" alt="">
                                      
                                 </div>
                             </div>
                             
                              <div class="div-submit">
                                 <input type="submit" name="submit" id=""  value="Create">
                             </div>
                         </form>
                    </div>
                     <div class="modal-footer">

                    </div>
            
                </div>
        </section>
    </div>
</template>



<script>
export default {
     data(){
        return{
        isactive:true,
        form: new Form({ title:"",category:"", description:"",file:"",artist:""  }),
        imgUrl:"",
        fileType:['image/jpg','image/png','image/jpeg'],
        errMessage:"",
        categories:[]
            
        }

     },

     props:{
        check :Boolean
     },

      methods:{
           ModalDeactivate(){
             window.location.reload();
            },
            formAction(){
                console.log(this.form.errors);
           this.$Progress.start();
            this.form.post('/api/movie', { headers: {"Content-Type": "multipart/form-data"}
             }).then((data) => {

                this.$Progress.finish();
                if(data.data.status == 404){
                 Swal.fire({'icon':'error', 'text':data.data.message});    
                }else if(data.data.status == 200){
                 this.resetimageUrl();
                 Swal.fire({'icon':'success', 'text':data.data.message});
                  
                }
                })
                .catch((data) => {
                //    console.log(data);
                     Swal.fire({'icon':'error', 'text':data});
                })
            },

            readFile(e){
                   
                const file = e.target.files[0];
                  if(!this.fileType.includes(file.type)){
                     Toast.fire({ icon: 'error', title: 'This file type is not allowed, only png/jpg/jpeg  are allowed'
                            });
                           this.form.file = "";
                           this.imgUrl ="";
                           return false;
                        }
                         this.imgUrl = URL.createObjectURL(file);
                         this.form.file = file;
                         this.errMessage ="";
            },
             async loadcategories(){
                    const response = await fetch("/api/category/");
                            const dataRow = await response.json();
                            this.categories = dataRow.data;
             },

             resetimageUrl(){
                 this.imgUrl = " ";
                 this.$refs.form.reset(); 
             }
    },

    created(){
        this.loadcategories();
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
    height: 100%;
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
      /* flex-wrap: wrap; */
      position: absolute;
      top:10%;
      bottom:0;
      width:620px ;
      height: 100%;
      background-color:#fff;
      opacity: 1;
      overflow-x: scroll;
      
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
       align-items: center;
       padding-top: 20px;
       
    }

    .modal .modal-body form{
        /* width:200px; */
        padding: 10px;
        margin-bottom: 20px;
    }

     .modal .modal-body form div{
         padding-top: 10px;
         padding-bottom: 10px;
         justify-content: center;
         align-items: center;
        
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

   .modal .modal-body form  .file{
        width: 100%;
        display: flex;
        justify-content: space-between; 
    }

    .modal .modal-body form  .file div{
        flex-basis: 50%;
        text-align: end;
    }

 .modal .modal-body form  .file div img{
     width: 60px;
 }
 
  .modal .modal-body form  .file div input[type=file]{
       width: 200px;
    }

      .modal .modal-body form div input[type=submit] {
        padding:10px  50px  10px 50px;
        cursor: pointer;
        background-color: black;
        color: #fff;
        font-weight: 800;
        margin-bottom: 10px;
     
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