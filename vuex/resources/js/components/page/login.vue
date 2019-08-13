<template>
<div class="background">
  <div class="container">
    <h2 style="margin-left:45%; color: green;">ログイン</h2>
    <form @submit.prevent="login" class="login_form">
      <div v-for="field in fieldInputs" v-bind:key="field.vModel">
        <text-input :field="field" @updateField="updateValue"></text-input>
      </div>
      <div class="form-group" style="margin-left:45%;">
        <button class="btn btn-primary">ログイン</button>
      </div>
      <div lass="form-group" style="margin-left:48%;">
      <router-link class="btn btn-none pull-righ" :to="{name: 'users.create'}">登録</router-link>
      </div>
    </form>
  </div>
</div>
</template>
<script>
import VeeValidate from "vee-validate";
import { mapState, mapActions } from "vuex";
import Vue from "vue";
import TextInput from "./common/TextInput";
import axios from "axios";
import { RESOURCE_USER } from "../api";
import VueSession from "vue-session";
Vue.use(VeeValidate);
Vue.use(VueSession);

export default {
  components: { TextInput },
  data: function() {
    return {
      email: "",
      password: "",
      error: false,
      fieldInputs: [
        {
          placeholder: "メールアドレス",
          label: "メールアドレス",
          nameInput: "email",
          vModel: "email",
          type: "email",
          validate: "required"
        },
        {
          placeholder: "パスワード",
          label: "パスワード",
          nameInput: "password",
          vModel: "password",
          type: "password",
          validate: "required|min:3"
        }
      ]
    };
  },
  methods: {
    login: function() {
      axios
        .post(RESOURCE_USER + "/login", {
          email: this.email,
          password: this.password
        })
        .then(response => {
          var error = response.data.error;
          if (error == true) {
            alert("login fail!!!");
          } else {
            this.$session.start();
            this.$session.set("checkLogin", true);
            this.$session.set("userLogin", response.data.userLogin);
            // this.$router.push({ name: "users.index" });
            window.location.href = '/';

          }
        })
        .catch(e => {
          console.log("loi");
        });
    },
    updateValue: function(field, value) {
      switch (field) {
        case "email":
          this.email = value;
          break;
        case "password":
          this.password = value;
          break;
      }
    }
  },
  created: function() {
    if (this.$session.get("checkLogin") == true) {
      this.$router.push({ name: "users.index" });
    }
  }
};
</script>
<style>
.login_form {
  width: 50%;
  margin-left: 25%;
 }
 .btn-none {
   text-align: center;
   color: green;
 }
</style>
