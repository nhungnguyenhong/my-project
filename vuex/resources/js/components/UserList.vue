<template>
    
    <div class="container">
                <div class="client">
                <h2>クラアント一覧</h2>
            </div>

            <div class="form-group" style=" border-radius: 5px; border: ridge;padding:8px; width:106%; ">
                <div class="form-group" style="margin-top: 1%">
                    <div class="col-sm-3" style="float:left">
                        <select class="form-control" >
                            <option value="company_name">会社名</option>
                            <option value="name">会社名担当者名</option>
                            <option value="email">メールアドレス</option>
                            <option value="phone_number">電話番号</option>
                        </select>
                    </div>
                    <div class="col-sm-7" style="float:left">
                        <input type="text" class="form-control" id="keys" name="keys" placeholder="キーワードで検索" >
                    </div>
                    <div>
                        <button class="btn btn-default" style="width: 100px;border-color: black">検索</button>
                    </div>
                </div>
            </div>
            <br/>
            <div class="clearfix">
            <router-link class="btn btn-success pull-righ" :to="{name: 'users.create'}">+登録</router-link>
        </div><br />
            <div style=" border-radius: 5px; border: ridge;padding:8px;margin-top:20px; width:106%;">
                <div style="margin:5px 0px">
                    <span>1件中1-1表示</span>
                    <div style="float:right">
                        <select name="" id="" style="border-radius:5px">
                            <option value="">10</option>
                            <option value="">20</option>
                            <option value="">30</option>
                        </select> 件ずつ表示
                    </div>
                </div>
            </div>
        <table class='table table-hover'>
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
    import { mapState } from 'vuex';
    import UserRow from "./UserRow";
    export default {
        components: { UserRow },
        computed: {
            ...mapState(['users']),
        },
        created: function () {
            this.$store.dispatch('fetch');
        },
     
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