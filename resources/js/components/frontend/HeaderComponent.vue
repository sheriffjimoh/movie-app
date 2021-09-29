<template>

<div class="app-header">
        <nav class="navbar  navbar-expand-sm">
        <a class="navbar-brand" href="#">
          <span class="white-badge">Movie</span> <span class="red">Zec</span> 
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-list-4" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar-list-4">
          <ul class="navbar-nav ml-auto nav-right mr-10">
            <li class="nav-item ">
                <form class="form-inline my-2 my-lg-0">
                  <input class="form-control mr-sm-2" type="search" @focus="inputChange"  placeholder="Search" aria-label="Search">
                </form>
                  </li>
              <li class="nav-item dropdown user-drop">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Account
                </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="#">Dashboard</a>
                <a class="dropdown-item" href="#">Edit Profile</a>
                <a class="dropdown-item" href="#">Log Out</a>
              </div>
            </li>   
          </ul>
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
.app-header{
  margin-top: 0px !important;
  padding: 0px;
}

.navbar-brand {
  font-size: 35px;
}
.white-badge {
  color: #fff;
}


@media(min-width:999px){
  .form-inline{
  padding-right: 20px;
}

.form-inline input{
  border-radius: 0%;
  width: 330px  !important;
}

  .user-drop{
    border-radius: 30%;
    
    box-shadow: 28px 23px 75px -2px rgba(11, 9, 9, 0.75);
    -webkit-box-shadow: 28px 23px 75px -2px rgba(11, 9, 9, 0.75);
    -moz-box-shadow: 28px 23px 75px -2px rgba(11, 9, 9, 0.75);
  }
  .user-drop a {
    padding: 10px;
  }
}

.user-drop .dropdown-toggle{
  color: #fff !important;
}
.form-inline input{
  border-radius: 0%;
}
.form-inline input{
  border:none;
}

.navbar-toggler{
  background-color: #fff  !important;
  color: ;
}
.navbar-toggler-icon{
  color: red;
}

</style>