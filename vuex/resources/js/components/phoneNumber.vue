<template>
    <div class="form-group row">
            <label for="number" class="col-sm-3 control-label text-md-left">お電話番号 </label>
        <div class="col-sm-9">
            <input type="number" id="phone_number" v-model="phone_number" placeholder="03-6459-0300" @keyup="capitalize" @blur="capitalize" class="form-control"> 
        </div>
    </div>      
</template>
<script>
    export default {
        filters: {
        capitalize: function (value) {
            if (!value) return '03-6459-0300'
            value = value.toString()
            return value.replace(/[^0-9]/g, '')
                .replace(/(\d{2})(\d{4})(\d{4})/, '($1) $2-$3');
        }
        },
    }
</script>
<style>
.edit {
    border : none;
}
</style>