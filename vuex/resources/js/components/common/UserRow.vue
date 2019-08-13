<template>
  <tr>
    <td>{{ user.id }}</td>
    <td>{{ user.name }}</td>
    <td>{{ user.email }}</td>
    <td>{{ user.phone_number | number_format }}</td>
    <td>{{ user.post }}</td>
    <td>{{ user.address }}</td>
    <td>{{ user.address2 }}</td>
    <td>{{ user.company_name }}</td>
    <td class="edit">
      <router-link class="btn btn-primary" :to="`/users/edit/${user.id}`">改正</router-link>
    </td>
    <td class="edit">
      <button
        class="btn btn-danger"
        v-confirm="{
            ok: deleteUser,
            message: '削除しますか。',
            okText: '続ける',
            cancelText: '取り消す',
            }"
      >解消</button>
    </td>
  </tr>
</template>

<script>
import Vue from "vue";
import VueToast from "vue-toast-notification";
import VuejsDialogMixin from "vuejs-dialog/dist/vuejs-dialog-mixin.min.js";
import VuejsDialog from "vuejs-dialog";
Vue.use(VuejsDialog);
Vue.use(VueToast);
export default {
  filters: {
    number_format: function(value) {
      if (!value) return "03-6459-0300";
      value = value.toString();
      var phone_number = value
        .replace(/[^0-9]/g, "")
        .replace(/(\d{2})(\d{4})(\d{4})/, "$1-$2-$3");
      return phone_number;
    }
  },
  props: {
    user: Object,
    handleDelete: Function
  },
  methods: {
    deleteUser: function() {
      this.$store.dispatch("deleteUser", this.user.id);
      Vue.$toast.error("削除した。", {
        position: "top"
      });
    }
  }
};
</script>
<style>
.edit {
  border: none;
}
</style>
