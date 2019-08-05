import Vue from 'vue'
import Router from 'vue-router'
import Home from '@/components/Home'
import ListUsers from '@/components/ListUsers'
import register from '@/components/register'
import contact from '@/components/contact'
import VueToastr from '@deveodk/vue-toastr'

Vue.use(Router)
Vue.use(VueToastr)

export default new Router({
  routes: [
    {
      path: '/',
      name: 'Home',
      component: Home
    },
    {
      path: '/ListUsers',
      name: 'ListUsers',
      component: ListUsers
    },
    {
      path: '/register',
      name: 'register',
      component: register
    },
    {
      path: '/contact',
      name: 'contact',
      component: contact
    },
    {      
      path: '/contact/:Pid',      
      name: 'contact',      
      component: contact   
    }
  ]
})
