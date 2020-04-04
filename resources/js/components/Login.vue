<template>

    <div class="account-pages my-5 pt-5">
            <div class="container">
                <div class="row">
                    
                </div>
                <!-- end row -->

                <div class="row justify-content-center">
                    <div class="col-lg-5">
                        <div class="card">
                            <div class="card-body p-4">
                                <div class="p-2">
                                    <h5 class="mb-5 text-center">Login To Your Account</h5>
                                    <form class="form-horizontal" v-on:submit.prevent="submitLogin()">

                                        <div class="row">
                                            <div class="col-md-12">
                                                

                                                <div class="form-group mt-4">
                                                    <label for="email">Email</label>
                                                    <input type="email" class="form-control" id="email" placeholder="Enter email" v-model="email">
                                                </div>

                                                <div class="form-group mt-4">
                                                    <label for="password">Password</label>
                                                    <input type="password" class="form-control" id="password" placeholder="Enter Password" autocomplete="" v-model="password">
                                                </div>
                                                <div class="mt-4">
                                                    <button class="btn btn-primary btn-block waves-effect waves-light" type="submit">Sign in</button>
                                                </div>

                                                <br>
                                                <p>Dont have an account <router-link to="/register"> Register Here</router-link> </p>
                                                
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div>
        </div>
        <!-- end Account pages -->

</template>

<script>
import store from '../store/store'
export default {

    data(){
        return {
            email: '',
            password: '',
            loginError: false,
            loginErrors: {},
        }
    },
    methods: {
        // method to login
        submitLogin() {
            this.loginError = false;
            axios.post('api/login', {
                email: this.email,
                password: this.password
            })
            .then(response => {
                // after login is successful print data.
                console.log(response.data.token)
                store.commit('loginUser')
                localStorage.setItem('token', response.data.token)
                // this.$router.push({name: 'article'})
            }).catch(response => {
                this.loginError = true
                this.loginErrors = response.data.errors
                console.log(this.loginErrors)
            })
        }
        
    }
}
</script>

<style scoped>

</style>