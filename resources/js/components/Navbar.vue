<template>
    <div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Evil Root</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
         <router-link :to="{name: 'home'}" class="nav-link" >home</router-link>
      </li>
      <li class="nav-item">
        <router-link :to="{name: 'login'}" class="nav-link" >Login</router-link>
       
      </li>
      <li class="nav-item">
        <router-link :to="{name: 'register'}" class="nav-link" >Register</router-link> 
     
      </li>
 
    </ul>
 
  </div>
</nav>
<div>
    <router-view></router-view>
</div>
    </div>

</template>

<script>
export default {
    
}
</script>