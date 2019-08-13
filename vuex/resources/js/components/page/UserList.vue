<template>
  <div class="container">
    <div class="client">
      <h2>クラアント一覧</h2>
    </div>
    <text-search style="width: 100%" @search="search"></text-search>
    <div style=" border-radius: 5px; border: ridge;padding:8px;margin-top:20px; width:106%;">
      <div style="margin:5px 0px">
        <span>1件中1-1表示</span>
        <div style="float:right" class>
          <div style="float: left;margin-right: 5px">
            <select-input :optionSelect="optionSelectQuantity"></select-input>
          </div>
          <div style="float: left">件ずつ表示</div>
        </div>
      </div>
    </div>
    <table class="table table-hover">
      <thead>
        <tr>
          <th>ID</th>
          <th>会社名担当者名</th>
          <th>メールアドレス</th>
          <th>電話番号</th>
          <th>郵便番号</th>
          <th>住所</th>
          <th>住所2</th>
          <th>会社名</th>
          <th></th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <user-row style="width: 100%" v-for="user in users" :user="user" :key="user.id"></user-row>
      </tbody>
    </table>
  </div>
</template>

<script>
import { mapState } from "vuex";
import UserRow from "./common/UserRow";
import TextSearch from "./common/TextSearch";
import SelectInput from "./common/SelectInput";
import VueSession from "vue-session";
export default {
  components: { SelectInput, TextSearch, UserRow },
  computed: {
    ...mapState(["users"])
  },
  data: function() {
    return {
      optionSelectQuantity: {
        listOption: [
          { text: "10", value: "10" },
          { text: "20", value: "20" },
          { text: "30", value: "30" },
          { text: "40", value: "40" }
        ],
        optionSelected: "10"
      }
    };
  },
  methods: {
    search: function(optionSearch, keyword) {
      this.$store.dispatch("search", [optionSearch, keyword]);
      this.$router.push({ name: "users.index" });
    }
  },
  created: function() {
    if (this.$session.get("checkLogin") == true) {
      this.$store.dispatch("fetch");
    } else {
      this.$router.push({ name: "users.login" });
    }
  }
};
</script>
<style>
tbody {
  border: 1px solid #dee2e6;
  background-image: none;
}
table tr th {
  background: rgba(0, 145, 234, 1);
  padding: 10px;
  color: #ffffff;
}

table tr td {
  padding: 10px;
  border-right: 1px solid rgba(0, 0, 0, 0.1);
  font-size: 16px;
}
.list {
  margin: 5% 5% 5% 5%;
}
.container {
  margin-top: 5%;
  width: 100%;
}
.table {
  width: 106%;
}
</style>
