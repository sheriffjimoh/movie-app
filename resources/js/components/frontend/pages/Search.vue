<template>
     <div class="container-m" >
         <div class="app-header">
        <nav class="navbar  navbar-expand-sm">
        
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
      </nav>
  </div>
     </div>
</template>
<script>
export default {
    setup() {
        
    },
}
</script>
<style scoped>

</style>