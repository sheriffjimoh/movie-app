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
                      
                         <form >
                              <div>
                                 <input type="text"  placeholder="Movie Title" id="title">
                             </div>
                             <div>
                                 <select name="category" id="category">
                                     <option value="" selected>select--</option>
                                     <option value="nollywood">Nollywood</option>
                                     <option value="bollywood">Bollywood</option>
                                     <option value="Musicvideo">Music Video</option>
                                 </select>
                             </div>
                              <div>
                                <textarea name="description" id="description" placeholder="Describe this movie..." cols="30" rows="5"></textarea>
                             </div>
                             <div>
                                <textarea name="artist" id="artist" placeholder="Add most popular artist name in movie, seperate with comma..." cols="30" rows="5"></textarea>
                             </div>
                              <div class="file">
                                   <div>
                                  <input type="file" >     
                                  </div>
                                
                                 <div>
                                      <img src="https://lumiere-a.akamaihd.net/v1/images/p_cruella_disneyplus_21093_6184d4aa.jpeg" alt="">
                                 </div>
                             </div>
                             
                              <div class="div-submit">
                                 <input type="submit" name="" id=""  value="Create">
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
        isactive:true
            
        }

     },

     props:{
        check :Boolean
     },

      methods:{
           ModalDeactivate(){
             window.location.reload();

           }
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
    .alert  .alert_error{
    background-color: firebrick;
    color: white;
    font-weight: bolder;
    width: 600px;
    padding: 10px;
     
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