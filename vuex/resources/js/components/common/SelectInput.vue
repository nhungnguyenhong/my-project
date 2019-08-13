<template>
    <select class="form-control" :v-model="optionSelect.optionSelected"  @change="changeOption($event.target.value)">
        <option v-for="option in optionSelect.listOption" v-bind:value="option.value" v-bind:key="option.value">
            {{ option.text }}
        </option>
    </select>
</template>

<script>
    export default {
        props: {
           optionSelect: Object

        },
        data: function () {
            return {

            }
        },
        methods: {
            changeOption: function(value) {
                this.$emit("changeOption", value);
            }
        }
    }
</script>
<style>
    tbody {
        border: 1px solid #dee2e6;
    }
    table tr th{
        background: rgba(0, 145, 234, 1);
        padding: 10px;
        color: #ffffff;
    }

    table tr td{
        padding: 10px;
        border-right: 1px solid rgba(0, 0, 0, 0.1);
        font-size:16px;
    }
</style>
