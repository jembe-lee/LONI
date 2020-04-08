<template>
    <a href=""  class="nav-link" @click="logoutUser">Logout</a>
</template>

<script>
import store from '../store/store'
export default {
   methods: {
    logoutUser: function () {
        localStorage.removeItem('token');
        this.$store.commit("logoutUser");
        this.$router.push("/login");
    }
   }
}
</script>
