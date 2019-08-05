<template>
    <div class="home">
        <h1> {{ title }} </h1>
        <button style="border: none;">
            <router-link to="/ListUsers"> メンバーリスト </router-link>
        </button>
        <br>
        <button style="border: none">
            <router-link to="/register"> メンバー登録</router-link>
        </button>

        <div class="container" style="margin-top: 50px;">
            <div class="client">
                <h2>クラアント一覧</h2>
            </div>

            <div class="form-group" style=" border-radius: 5px; border: ridge;padding:8px ">
                <div class="form-group" style="margin-top: 1%">
                    <div class="col-sm-3" style="float:left">
                        <select class="form-control" @change="getOp($event)">
                            <option value="company_name">会社名</option>
                            <option value="name">会社名担当者名</option>
                            <option value="email">メールアドレス</option>
                            <option value="phone_number">電話番号</option>
                        </select>
                    </div>
                    <div class="col-sm-7" style="float:left">
                        <input type="text" class="form-control" v-model="keys" id="keys" name="keys" placeholder="キーワードで検索" @keyup="keys = $event.target.value">
                    </div>
                    <div>
                        <button v-on:click="search(keys)" class="btn btn-default" style="width: 100px;border-color: black">検索</button>
                    </div>
                </div>
            </div>
            <div style=" border-radius: 5px; border: ridge;padding:8px;margin-top:20px">
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
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">会社名担当者名</th>
                            <th scope="col">電話番号</th>
                            <th scope="col">メールアドレス</th>
                            <th scope="col">会社名</th>
                            <th scope="col">郵便番号</th>
                            <th scope="col">住所</th>
                            <th scope="col">住所2</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(data,index) in result" :key="index">
                            <!-- <span v-if="data.ID === 1"> -->
                            <td @click="goTodetail(data)" style="cursor: pointer; color: blue;">{{ data.name }}</td>
                            <td>{{ data.phone_number }}</td>
                            <td>{{ data.email }}</td>
                            <td>{{ data.company_name }}</td>
                            <td>{{ data.post }}</td>
                            <td>{{ data.address }}</td>
                            <td>{{ data.address2 }}</td>
                            <!-- </span> -->
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'home',
        data() {
            return {
                keys: '',
                op: '',
                title: 'ホームページ',
                result: [],
                profile: [{
                    name: "テスト",
                    phone_number: "123456",
                    email: "test@mail.com",
                    company_name: "テスト",
                    post: "123456",
                    address: "123456",
                    address2: "123456",
                    start: "10/11/2014",
                    close: "13/05/2018",
                    status: "1",
                    ID: 1
                }, {
                    name: "Nhung",
                    phone_number: "123456",
                    email: "nhunghn@gmail.com",
                    company_name: "mirabo",
                    post: "123456",
                    address: "123456",
                    address2: "123456",
                    start: "10/11/2014",
                    close: "13/05/2018",
                    status: "0",
                    ID: 2

                }, {
                    name: "Hai Ngan",
                    phone_number: "123456",
                    email: "nganhn@mail.com",
                    company_name: "mirabo",
                    post: "123456",
                    address: "123456",
                    address2: "123456",
                    start: "10/11/2014",
                    close: "13/05/2018",
                    status: "0",
                    ID: 3
                }, {
                    name: "Hai Trung",
                    phone_number: "123456",
                    email: "trunghn@mail.com",
                    company_name: "ABC",
                    post: "123456",
                    address: "123456",
                    address2: "123456",
                    start: "10/11/2014",
                    close: "13/05/2018",
                    status: "1",
                    ID: 4
                }],
            }
        },
        methods: {
            getOp(event) {
                    this.op = event.target.value;

                },
                search(keys) {
                    switch (this.op) {

                        case 'name':
                            {
                                this.result = this.profile.filter(function(item) {
                                    return item.name.includes(keys);
                                });
                                break;
                            }
                        case 'email':
                            {
                                this.result = this.profile.filter(function(item) {
                                    return item.email.includes(keys);
                                });
                                break;
                            }
                        case 'phone_number':
                            {
                                this.result = this.profile.filter(function(item) {
                                    return item.phone_number.includes(keys);
                                });
                                break;
                            }
                        default:
                            {
                                this.result = this.profile.filter(function(item) {
                                    return item.company_name.includes(keys);
                                });
                                break;
                            }
                    }

                },
                goTodetail(Id) {
                    this.$router.push({
                        name: 'contact',
                        params: {
                            Pid: Id
                        }
                    })
                },
                pushup() {
                    if (this.$route.params.tonewuser != null) {
                        var obj = this.$route.params.tonewuser;
                        var idcurrent = this.profile.length + 1;
                        obj.ID = idcurrent;
                        this.profile.push(obj);
                        this.$toastr('success', '作成した。。', '完成');
                    }
                },
                updateUser: function() {
                    if (this.$route.params.updateuser != null) {
                        var user = this.$route.params.updateuser;
                        var index = Number(user.ID);
                        this.profile[index - 1] = user;
                        this.$toastr('success', '変更した。', '完成')

                    }
                },

        },
 
        mounted() {
            this.pushup();
            this.updateUser();
        },
    }
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
    .client {
        margin-left: -80%;
    }
    
    h1,
    h2 {
        font-weight: normal;
    }
    
    ul {
        list-style-type: none;
        padding: 0;
    }
    
    li {
        display: inline-block;
        margin: 0 10px;
    }
    
    a {
        color: #42b983;
    }
</style>