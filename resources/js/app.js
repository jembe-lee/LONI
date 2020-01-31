import App from './components/App'
import Article from './components/Article'
import Login from './components/Login'
import Navbar from './components/Navbar'
import Profile from './components/Profile'
import Register from './components/Register'
import router from './router'

require('./bootstrap');

window.Vue = require('vue');


const app = new Vue({
    el: '#app',
    components: {
        App,
        Article,
        Login,
        Navbar,
        Profile,
        Register,

    },
    router,
});
