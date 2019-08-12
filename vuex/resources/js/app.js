



require('./bootstrap');
import 'vue-toast-notification/dist/index.css';
import 'vuejs-dialog/dist/vuejs-dialog.min.css';

window.Vue = require('vue');

import Vue from 'vue';
import VueRouter from 'vue-router';
import App from './components/App.vue';
import routes from './routes';
import usersStore from './store/usersStore';

Vue.use(VueRouter);

const router = new VueRouter({
    routes,
    // mode: 'history',
});
window.events = new Vue();


new Vue({
    el: '#app',
    render: h => h(App),
    router,
    store: usersStore,
});