<template>
  <div>
    <div class="media mt-1">
      <h3 class="h3-responsive font-weight-bold mr-3 pt-0">{{ name }}</h3>
      <div class="media-body mb-3 mb-lg-3">
        <mdb-badge @click.native="onDelete" tag="a" color="danger-color" class="ml-2 float-right">-</mdb-badge>
        <h6 v-if="phone_number" class="mt-0 font-weight-bold">{{ phone_number }}</h6>
        <h6 v-if="email" class="mt-0 font-weight-bold">{{ email }}</h6>
        <hr class="hr-bold my-2">
        <p v-if="address" class="font-smaller mb-0">
          <mdb-icon icon="location-arrow"/>
          {{ address }}
        </p>
      </div>
    </div>
    <p v-if="company_name" class="p-2 mb-4 blue-grey lighten-5">会社 : {{ company_name }}</p>
  </div>
</template>

<script>
import { mdbBadge, mdbIcon } from "mdbvue";

export default {
  name: "Event",
  components: {
    mdbBadge,
    mdbIcon
  },
  props: {
    index: {
      type: Number
    },
    name: {
      type: String
    },
    company_name: {
      type: String
    },
    email: {
      type: String
    },
    address: {
      type: String
    },
    phone_number: {
      type: String
    }
  },
  methods: {
    onDelete() {
      this.$emit("delete", this.index);
    }
  }
};
</script>

<style scoped>
</style>
