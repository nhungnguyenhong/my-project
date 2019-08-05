// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
import Vue from 'vue'
import App from './App'
import router from './router'
import "bootstrap";
import "../config/bootstrap.min.css";
import "jquery";
import "popper.js";
import '@deveodk/vue-toastr/dist/@deveodk/vue-toastr.css'

Vue.config.productionTip = false;

/* eslint-disable no-new */
new Vue({
  el: '#app',
  router,
  components: { App },
  template: '<App/>'
})

