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
                      
                         <form >
                            <div class="row">
                                <div>
                                    <input type="text"  placeholder="Movie Category" id="title">
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
                                 <tr>
                                     <td>Music</td>
                                     <td>05-06-2021</td>
                                <td> <a href="#" class="red">Delete</a>| <a href="#" class="green">Edit</a>|<a href="#">View</a></td>
                         
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
        isactiveCategory:true
            
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

     .modal .modal-body form div{
         padding: 10px;
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