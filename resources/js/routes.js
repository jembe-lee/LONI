import Home from './components/Home'
import Article from './components/Article'
import Login from './components/Login'
import Navbar from './components/Navbar'
import Profile from './components/Profile'
import Register from './components/Register'

export default [
    {path: '/', component: Home, name:'home'},
    {path: '/articles', component: Article, name:'article'},
    {path: '/login', component: Login, name:'login'},
    {path: '/profile', component: Profile, name:'profile'},
    {path: '/register', component: Register, name:'register'},

]