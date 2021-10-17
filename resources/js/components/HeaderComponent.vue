<template>

<div class="app-header">
        <nav class="nav-appheader">

          <div class="app-logo">
             <router-link  to="/">    
              <span class="white-badge">Movie</span> <span class="red">Zec</span>
             </router-link>
          </div>
         
         
          <div class="seg">

             <div class="search-icon">
              <router-link  to="/search">   
                <vue-fontawesome icon="search" color="#fff" class="icon-style"></vue-fontawesome> 
              </router-link>
            </div>

            <div class="user-account">
                 <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" 
                    role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Account </a>
                     <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                       <a class="dropdown-item" href="#">Dashboard</a>
                       <a class="dropdown-item" href="#">Edit Profile</a>
                      <a class="dropdown-item" href="#">Log Out</a>
                     </div>
            </div>
          </div>
      </nav>
  </div>
</template>

<script>
export default {

  data(){
    return{
      val: ""
    }
  },

  methods:{

        inputChange(){
           window.location.href = "/search/";
        }
       
  }
    
}
</script>

<style scoped>

.nav-appheader{
  display: flex;
  flex-direction: row;
  justify-content: space-between;
  padding-top: 10px;
}
.seg{
  display: flex;
  flex-direction: row;
  justify-content: space-between;
}

.app-logo a {
   font-size: 30px;
   color: white;
}

.search-icon{
  padding-top: 10px;
  padding-left: 20px;
}


.icon-style{
  font-size: 20px;
}
</style>