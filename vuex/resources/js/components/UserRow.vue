<template>
    <tr>
        <td>
            {{ user.id }}
        </td>
        <td>
            {{ user.name }}
        </td>
        <td>
            {{ user.email }}
        </td>
        <td>
            {{ user.phone_number }}
        </td>
        <td>
            {{ user.post }}
        </td>
        <td>
            {{ user.address }}
        </td>
        <td>
            {{ user.address2 }}
        </td>
        <td>
            {{ user.company_name }}
        </td>
        <td class="edit">
            <router-link class="btn btn-primary" :to="`/users/edit/${user.id}`">改正</router-link>
        </td>
        <td class="edit">
            <button class="btn btn-danger" @click="deleteUser">解消</button>
        </td>
    </tr>
</template>

<script>
    export default {
        props: {
            user: Object,
            handleDelete: Function,
        },
        methods: {
            deleteUser: function () {
                this.$store.dispatch('deleteUser', this.user.id);
            },
        }
    }
</script>
<style>
.edit {
    border : none;
}
</style>
