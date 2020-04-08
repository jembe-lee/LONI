import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex);

export default new Vuex.Store({
    state: {
        status: '',
        user: {},
        token: localStorage.getItem('token') || '',
        isLoggedIn: !!localStorage.getItem('token'),
    },

    mutations: {
        loginUser (state) {
            state.isLoggedIn = true
        },

        logoutUser (state) {
            state.isLoggedIn = false
        },
        auth_request(state) {
            state.status = 'loading'
        },
        auth_success (state, token, user) {
            state.status = 'success';
            state.token = token;
            state.user = user;
        },
        auth_error(state) {
            state.status = 'error'
        },
        logout(state) {
            state.status = '';
            state.token = '';
        }
    },
    getters: {
        isLoggedIn: state => !!state.token,
        authStatus: state => state.status,
    },

    actions: {
        login: function ({commit}, user) {
            //    process login here
            return new Promise((resolve, reject) => {
                commit('auth_request');
                axios({url: 'api/login', data: user, method: 'POST'})
                    .then(response => {
                        // if (response.data.token) {
                        const token = response.data.token;
                        const user = response.data.user;
                        localStorage.setItem('token', token);
                        axios.defaults.headers.common['Authorization'] = token;
                        commit('auth_success', token, user);
                        resolve(response)
                        // }else {
                        //     commit('auth_error');
                        // }
                    })
                    .catch(err => {
                        commit('auth_error');
                        localStorage.removeItem('token');
                        reject(err);
                    })
            })

        },
        register: function ({commit}, user) {
            return new Promise((resolve, reject) => {
                commit('auth_request');
                axios({url: 'http://127.0.0.1:8000/api/register', data:user, method:  'POST'})
                    .then(response => {
                        const token = response.data.token;
                        const user = response.data.user;
                        localStorage.setItem('token', token);
                        axios.default.headers.common['Authorization'] = token;
                        commit('auth_success', token, user);
                        resolve(response)
                    })
                    .catch( err => {
                        commit('auth_error');
                        localStorage.removeItem('token');
                        reject(err);
                    })
            })
        },
        logout: function ({commit}) {
            return new Promise((resolve, reject) => {
                commit('logout');
                localStorage.removeItem('token');
                delete axios.defaults.headers.common['Authorization'];
                resolve();
            })
        }
    }
})
