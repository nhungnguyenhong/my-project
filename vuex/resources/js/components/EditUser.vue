<template>
    <div>
        <div class="container" style="margin-top: 10px;">

            <div style="padding:8px;margin-top:10px">
                <h1>改正ユーザー</h1>
                <hr>
                <form @submit.prevent="edit">
                    <h3>株式会社テスト</h3>
                    <table class="" style="color:black;">
                        <tbody>
                            <tr>
                                <td style="width:20%">ID</td>
                                <td>
                                    <div class="form-group" style="border: none">
                                        <input type="text" class="form-control" id="id" placeholder="" v-model="user.id" readonly>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td> メールアドレス</td>
                                <td>
                                    <div class="form-group">
                                        <input type="email" class="form-control" id="email" name="email" v-model="user.email" placeholder="test@gmail.com">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>ご担当者様お名前</td>
                                <td>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="name" name="name" placeholder="テスト" v-model="user.name">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>会社名</td>
                                <td>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="name" name="company_name" placeholder="会社名" v-model="user.company_name">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>会社ご住所</td>
                                <td>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="company_address" name="company_address" placeholder="テスト" v-model="user.address">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>会社ご住所2</td>
                                <td>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="company_address2" name="company_address2" placeholder="テスト" v-model="user.address2">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>会社郵便番号（ハイフンなし）</td>
                                <td>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="post" name="post" placeholder="テスト" v-model="user.post">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>お電話番号</td>
                                <td>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="phone_number" v-model="user.phone_number" name="phone_number" placeholder="12345678">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>契約開始日</td>
                                <td>
                                    <div class="form-group" style="width:30%">
                                        <input type="datetime" class="form-control" id="start_date" placeholder="dd/mm/yy" name="created_at" v-model="user.created_at">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>契約終了日</td>
                                <td>
                                    <div class="form-group" style="width:30%">
                                        <input type="datetime" class="form-control" placeholder="dd/mm/yy" id="end_date" name="updated_at" v-model="user.updated_at">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>ステータス</td>
                                <td class="radio">
                                    <input type="radio" name="status" style="margin-right: 5px" checked><span style="margin-right: 15px">稼働中</span>
                                    <input type="radio" name="status" style="margin-right: 5px">配信停止

                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <br>
                    <button type="submit" class="btn btn-success" style="width: 100px;border-color: black ">保存</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    import { mapState } from 'vuex';
    export default {
        methods: {
            edit: function () {
                this.$store.dispatch('editUser', this.user);
                this.$router.push({name: 'users.index'});
            }
        },
        beforeCreate: function () {
            this.$store.dispatch('fetchOne', this.$route.params.id);
        },
        computed: {
            ...mapState(['user']),
        }
    }
</script>