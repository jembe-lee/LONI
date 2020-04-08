import App from './components/App'
import router from './router'
import store from './store/store'
import Axios from "axios";

require('./bootstrap');

window.Vue = require('vue');

Vue.prototype.$http = Axios;
const token = localStorage.getItem('token');
if (token) {
    Vue.prototype.$http.defaults.headers.common['Authorization'] = "Bearer " + token;
}
const app = new Vue({
    el: '#app',
    router,
    store,
    components: {
        App,
    }

});
