<template>
    <div class="form-group row">
        <label for="" class="col-md-3 col-form-label text-md-left">{{field.label}}</label>
        <div class="col-md-9">
            <input v-validate="field.validate" :type="field.type" class="form-control" :name="field.nameInput" :placeholder="field.placeholder" :v-model="field.vModel" required="required" @input="changeValueInput(field.vModel,$event.target.value)">
            <span  v-show="errors.has(field.nameInput)" class="help is-danger">{{ errors.first(field.nameInput) }}</span>
        </div>
    </div>
</template>

<script>
    import VeeValidate from 'vee-validate';
    import Vue from 'vue';
    import VueTelInput from 'vue-tel-input'
    Vue.use(VueTelInput)
    Vue.use(VeeValidate);
    export default {
        props: {
           field: Object,

        },
        data: function () {
            return {

            }
        },
        methods: {
            changeValueInput: function(field, value) {
                this.$emit("updateField", field, value);
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
