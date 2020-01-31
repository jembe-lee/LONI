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
                                    <h5 class="mb-5 text-center">Register Account</h5>
                                    <form class="form-horizontal" v-on:submit.prevent="submitRegister()">

                                        <div class="row">
                                            <div class="col-md-12">
                                                
                                                <div class="form-group mt-4">
                                                    <label for="name">Full Name</label>
                                                    <input type="text" class="form-control" id="name" placeholder="Enter Name" v-model="name">
                                                </div>

                                                <div class="form-group mt-4">
                                                    <label for="email">Email</label>
                                                    <input type="email" class="form-control" id="email" placeholder="Enter email" v-model="email">
                                                </div>

                                                <div class="form-group mt-4">
                                                    <label for="password">Password</label>
                                                    <input type="password" class="form-control" id="password" placeholder="Enter Password" autocomplete="" v-model="password">
                                                </div>

                                                <div class="form-group mt-4">
                                                    <label for="confirm-password">Confirm Password</label>
                                                    <input type="password" class="form-control" id="confirm-password" placeholder="Enter Password" autocomplete="" v-model="confirmPassword">
                                                </div>
                                                <div class="mt-4">
                                                    <button class="btn btn-primary btn-block waves-effect waves-light" type="submit">Sign in</button>
                                                </div>
                                                
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
export default {
    data() {
        return {
            registerError: false,
            name: '',
            email: '',
            password: '',
            confirmPassword: '',
            registerErrors: {},
        }
    },
    methods: {
        submitRegister() {
            axios.post('api/register', {
                name: this.name,
                email: this.email,
                password: this.password,
                password_confirmation: this.confirmPassword,
            })
            .then(response => {
                console.log(response)
            })
        }
    }
}
</script>

<style scoped>

</style>