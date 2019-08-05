<template>
    <div class="contact">
        <div class="container" style="margin-top: 10px;">

            <div style="padding:8px;margin-top:10px">
                <h2> Customer {{ title }}</h2>
                <hr>
                <form action="">
                    <h3>株式会社テスト</h3>
                    <table class="" style="color:black;">
                        <tbody>
                            <tr>
                                <td style="width:20%">ID</td>
                                <td>
                                    <div class="form-group" style="border: none">
                                        <input type="text" class="form-control" id="id" placeholder="" v-model="profile.ID" readonly>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td> メールアドレス</td>
                                <td>
                                    <div class="form-group">
                                        <input type="email" class="form-control" id="email" name="email" v-model="profile.email" placeholder="test@gmail.com">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>ご担当者様お名前</td>
                                <td>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="name" name="name" placeholder="テスト" v-model="profile.name">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>会社名</td>
                                <td>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="name" name="company_name" placeholder="会社名" v-model="profile.company_name">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>会社ご住所</td>
                                <td>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="company_address" name="company_address" placeholder="テスト" v-model="profile.address">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>会社ご住所2</td>
                                <td>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="company_address2" name="company_address2" placeholder="テスト" v-model="profile.address2">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>会社郵便番号（ハイフンなし）</td>
                                <td>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="post" name="post" placeholder="テスト" v-model="profile.post">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>お電話番号</td>
                                <td>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="phone_number" v-model="profile.phone_number" name="phone_number" placeholder="12345678">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>契約開始日</td>
                                <td>
                                    <div class="form-group" style="width:30%">
                                        <input type="datetime" class="form-control" id="start_date" placeholder="dd/mm/yy" name="start_date" v-model="profile.start">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>契約終了日</td>
                                <td>
                                    <div class="form-group" style="width:30%">
                                        <input type="datetime" class="form-control" placeholder="dd/mm/yy" id="end_date" name="end_date" v-model="profile.close">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>ステータス</td>
                                <td class="radio">
                                    <input type="radio" name="status" :checked="1 == this.$route.params.Pid.status" id="status1" value="1" v-model="profile.status" style="margin-right: 5px"><span style="margin-right: 15px">稼働中</span>
                                    <input type="radio" name="status" :checked="0 == this.$route.params.Pid.status" id="status2" value="0" v-model="profile.status" style="margin-right: 5px">配信停止

                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <br>
                    <button @click="updated()" class="btn btn-success" style="width: 100px;border-color: black ">保存</button>
                </form>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        name: 'contact',
        data() {
            return {
                title: 'contact',
                profile: {
                    name: this.$route.params.Pid.name,
                    phone_number: this.$route.params.Pid.phone_number,
                    email: this.$route.params.Pid.email,
                    company_name: this.$route.params.Pid.company_name,
                    post: this.$route.params.Pid.post,
                    address: this.$route.params.Pid.address,
                    address2: this.$route.params.Pid.address2,
                    start: this.$route.params.Pid.start,
                    close: this.$route.params.Pid.close,
                    status: this.$route.params.Pid.status,
                    ID: this.$route.params.Pid.ID
                }
            }
        },
        methods: {
            updated: function() {
                this.$router.push({
                    name: 'Home',
                    params: {
                        updateuser: this.profile
                    }
                })
            },
        }
    }
</script>
<style scoped>
    input {
        color: black;
    }
    
    .radio {
        float: left;
    }
    
    button {
        float: left;
        margin-left: 10%;
    }
    
    h3 {
        margin-left: -80%;
    }
</style>