<template>
  <div class="container">
    <form class="register_form" @submit.prevent="add">
      <h2 style="margin-top: 5%; text-align:center">ご登録画面</h2>
      <p class="hint-text" style="text-align:center; color: green">アカウントを作成。無料でー分しかかかりません.</p>
      <div v-for="field in fieldInputs" v-bind:key="field.vModel">
        <text-input :field="field" @updateField="updateValue"></text-input>
      </div>
      <div class="form-group row">
        <label for="number" class="col-sm-3 control-label text-md-left">お電話番号</label>
        <div class="col-sm-9">
          <input
            type="text"
            v-validate="'required|numeric|min:10' "
            name="phone_number"
            v-model="phone_number"
            id="phone_number"
            placeholder="03-6459-0300"
            class="form-control"
            @keyup="number_format"
            @blur="number_format"
          >
          <span
            v-show="errors.has('phone_number')"
            class="help is-danger"
          >{{ errors.first('phone_number') }}</span>
        </div>
      </div>
      <div class="form-group" style="float: left">
        <label class="checkbox-inline">
          <input type="checkbox" required="required">
          <a href="#">利用規約</a> に同意の上、返信します
        </label>
      </div>
      <div class="form-group">
        <button class="btn btn-success btn-lg btn-block">登録する</button>
      </div>
      <div class="form-group">
        <button class="btn btn-none btn-lg btn-block" style="color: green">
          <router-link to="/users/login">ログイン画面へ戻る</router-link>
        </button>
      </div>
    </form>
  </div>
</template>
<script>
import VeeValidate from "vee-validate";
import Vue from "vue";
import TextInput from "./TextInput";
import VueToast from "vue-toast-notification";
Vue.use(VeeValidate);
Vue.use(VueToast);

export default {
  // filters: {
  // number_format: function (value) {
  //     if (!value) return '03-6459-0300'
  //     value = value.toString()
  //     var phone_number1 =  value.replace(/[^0-9]/g, '')
  //         .replace(/(\d{2})(\d{4})(\d{4})/, '$1-$2-$3');
  //     return phone_number1;
  // }
  // },
  components: { TextInput },
  data: function() {
    return {
      name: "",
      phone_number: "",
      email: "",
      password: "",
      company_name: "",
      post: "",
      address: "",
      address2: "",
      phoneValue: 0,
      preventNextIteration: false,
      fieldInputs: [
        {
          placeholder: "風庭太郎",
          label: "ご担当者様お名前",
          nameInput: "name",
          vModel: "name",
          type: "text",
          validate: "required"
        },
        {
          placeholder: "会社名",
          label: "会社名",
          nameInput: "company_name",
          vModel: "company_name",
          type: "text",
          validate: "required"
        },
        {
          placeholder: "admin@gmail.com",
          label: "Email",
          nameInput: "email",
          vModel: "email",
          type: "email",
          validate: "required|email"
        },
        {
          placeholder: "パスワード",
          label: "パスワード",
          nameInput: "password",
          vModel: "password",
          type: "password",
          validate: "required|min:3"
        },
        {
          placeholder: "パスワード",
          label: "パスワード（確認）",
          nameInput: "password_confirmation",
          vModel: "",
          type: "password",
          validate: "required|confirmed:password"
        },
        {
          placeholder: "123456",
          label: "会社郵便番号（ハイフンなし）",
          nameInput: "post",
          vModel: "post",
          type: "text",
          validate: "required"
        },
        {
          placeholder: "例）東京都港区",
          label: "会社ご住所",
          nameInput: "address",
          vModel: "address",
          type: "text",
          validate: "required"
        },
        {
          placeholder: "新橋5-26-8新橋加藤",
          label: "会社ご住所２",
          nameInput: "address2",
          vModel: "address2",
          type: "text",
          validate: "required"
        }
      ]
    };
  },
  methods: {
    number_format: function(event) {
      if (["Arrow", "Backspace", "Shift"].includes(event.key)) {
        this.preventNextIteration = true;
        return;
      }
      if (this.preventNextIteration) {
        this.preventNextIteration = false;
        return;
      }
      this.phoneValue = this.phone_number
        .replace(/-/g, "")
        .match(/(\d{1,10})/g)[0];
      this.phone_number = this.phoneValue.replace(
        /(\d{1,2})(\d{1,4})(\d{1,4})/g,
        "$1-$2-$3"
      );
    },
    updateValue: function(field, value) {
      this.name = value;
      switch (field) {
        case "name":
          this.name = value;
          break;
        case "company_name":
          this.company_name = value;
          break;
        case "email":
          this.email = value;
          break;
        case "password":
          this.password = value;
          break;
        case "post":
          this.post = value;
          break;
        case "address":
          this.address = value;
          break;
        case "address2":
          this.address2 = value;
          break;
        case "phone_number":
          this.phone_number = value;
          break;
      }
    },

    add: function() {
      this.$store.dispatch("addUser", {
        name: this.name,
        email: this.email,
        password: this.password,
        phone_number: this.phone_number,
        company_name: this.company_name,
        address: this.address,
        address2: this.address2,
        post: this.post,
        start: this.start,
        close: this.close,
        status: this.status
      });
      this.$router.push({ name: "users.index" });
      Vue.$toast.success("新しいユーザーは追加。", {
        // override the global option
        position: "top"
      });
    }
  },
};
</script>
<style>
body {
  color: black;
  font-family: "Roboto", sans-serif;
}
.register_form {
  width: 50%;
  margin-left: 25%;
}
.form-control {
  height: 40px;
  box-shadow: none;
  color: #969fa4;
}
.form-control:focus {
  border-color: #5cb85c;
}
.form-control,
.btn {
  border-radius: 3px;
}
.signup-form {
  width: 400px;
  margin: 0 auto;
  padding: 30px 0;
}
.signup-form h2 {
  color: #636363;
  margin: 0 0 15px;
  position: relative;
  text-align: center;
}
.signup-form h2:before,
.signup-form h2:after {
  content: "";
  height: 2px;
  width: 30%;
  background: #d4d4d4;
  position: absolute;
  top: 50%;
  z-index: 2;
}
.signup-form h2:before {
  left: 0;
}
.signup-form h2:after {
  right: 0;
}
.signup-form .hint-text {
  color: #999;
  margin-bottom: 30px;
  text-align: center;
}
.signup-form form {
  color: #999;
  border-radius: 3px;
  margin-bottom: 15px;
  background: #f2f3f7;
  box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
  padding: 30px;
}
.signup-form .form-group {
  margin-bottom: 20px;
}
.signup-form input[type="checkbox"] {
  margin-top: 3px;
}
.signup-form .btn {
  font-size: 16px;
  font-weight: bold;
  min-width: 140px;
  outline: none !important;
}
.signup-form .row div:first-child {
  padding-right: 10px;
}
.signup-form .row div:last-child {
  padding-left: 10px;
}
.signup-form a {
  color: #fff;
  text-decoration: underline;
}
.signup-form a:hover {
  text-decoration: none;
}
.signup-form form a {
  color: #5cb85c;
  text-decoration: none;
}
.signup-form form a:hover {
  text-decoration: underline;
}
.is-danger {
  border: red;
  color: red;
}
.container {
  background-image: none;
}
</style>




