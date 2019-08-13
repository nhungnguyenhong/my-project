import Vue from 'vue';
import Vuex from 'vuex';
import axios from 'axios';
import {RESOURCE_USER} from '../api';
import VueSession from 'vue-session'
Vue.use (Vuex);
const usersStore = new Vuex.Store ({
    
  state: {
    users: [],
    user: {},
    error: false,
    userLogin: {}
  },
  mutations: {
    FETCH (state, users) {
      state.users = users;
    },
    FETCH_ONE (state, user) {
      state.user = user;
    },
  },
  actions: {
    fetch({commit}) {
      return axios
        .get (RESOURCE_USER)
        .then (response => commit ('FETCH', response.data))
        .catch ();
    },
    fetchOne ({commit}, id) {
      axios
        .get (RESOURCE_USER + '/' + id + '/edit')
        .then (response => commit ('FETCH_ONE', response.data))
        .catch ();
    },
    deleteUser ({}, id) {
      axios
        .delete (RESOURCE_USER + '/' + id)
        .then (() => this.dispatch ('fetch'))
        .catch ();
    },
    editUser ({}, user) {
      axios
        .put (RESOURCE_USER + '/' + user.id, {
          name: user.name,
          email: user.email,
          password: user.password,
          company_name: user.company_name,
          phone_number: user.phone_number,
          post: user.post,
          address: user.address,
          address2: user.address2,
        })
        .then (() => this.dispatch ('fetch'));
    },
    addUser ({}, user) {
      axios
        .post (RESOURCE_USER, {
          name: user.name,
          email: user.email,
          password: user.password,
          company_name: user.company_name,
          phone_number: user.phone_number,
          post: user.post,
          address: user.address,
          address2: user.address2,
        })
        .then (() => this.dispatch ('fetch'));
    },
    search ({commit}, search) {
      axios
        .post (RESOURCE_USER + '/search', {
          keyword: search[1],
          optionSearch: search[0],
        })
        .then (response => commit ('FETCH', response.data))
        .catch ();
    },
  },
});

export default usersStore;
