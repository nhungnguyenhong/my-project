<template>
  <div class="container">
    <div class="form-group" style=" border-radius: 5px; border: ridge;padding:8px; width: 100%; ">
      <div class="form-group" style="margin-top: 1%;">
        <div class="col-sm-3" style="float:left">
          <select-input :optionSelect="optionSelectSearch" @changeOption="changeOption"></select-input>
        </div>
        <div class="col-sm-7" style="float:left">
          <input
            type="text"
            class="form-control"
            id="keys"
            name="keys"
            v-model="keyword"
            placeholder="キーワードで検索"
          >
        </div>
        <div>
          <button
            class="btn btn-default"
            style="width: 100px;border-color: black"
            @click="search()"
          >検索</button>
        </div>
      </div>
    </div>
    <br>
  </div>
</template>

<script>
import SelectInput from "./SelectInput";
export default {
  components: { SelectInput },
  props: {},
  data: function() {
    return {
      keyword: "",
      optionSelected: "company_name",
      optionSelectSearch: {
        listOption: [
          { text: "会社名", value: "company_name" },
          { text: "会社名担当者名", value: "name" },
          { text: "メールアドレス", value: "email" },
          { text: "電話番号", value: "phone_number" }
        ],
        optionSelected: "company_name"
      }
    };
  },
  methods: {
    changeOption: function(value) {
      this.optionSelected = value;
    },
    search: function() {
      this.$emit("search", this.optionSelected, this.keyword);
    }
  }
};
</script>
<style>
tbody {
  border: 1px solid #dee2e6;
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
</style>
