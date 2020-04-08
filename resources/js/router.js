import Vue from 'vue'
import VueRouter from 'vue-router'
import routes from './routes'
import store from './store/store'

Vue.use(VueRouter);

const router =  new VueRouter({
    mode: 'history',
    routes
});


router.beforeEach((to, from, next) => {
    if(to.matched.some(record => record.meta.requiresAuth)) {
        if (store.getters.isLoggedIn) {
            next();
            return
        }
        next('/login')
    } else {
        next()
    }
});

export default router;
