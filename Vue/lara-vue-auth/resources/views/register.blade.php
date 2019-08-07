<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register Form</title>

</head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" id= "bootstrap-css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.16/vue.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.min.js"></script>
<link rel="stylesheet" type="text/css" href="/css/register.css">
<!------ Include the above in your HEAD tag ---------->

<body>
<div class="container" >
            <form class="form-horizontal" @submit.prevent="onSubmit" role="form" id="root" action="{{ route('users.register')}}" method="POST">
                @csrf
                <h5 style="text-align:center">ご登録画面</h5>
                <div class="form-group row">
                        <label for="name" class="col-md-3 col-form-label text-md-left">ご担当者様お名前</label>
                        <div class="col-md-9">
                            <input type="text" placeholder="風庭太郎" v-model="name" :class="[name.length < 3 && name.length > 0? 'form-control red' : 'form-control']" name="name" required>
                        </div>
                </div>
                <div class="form-group row">
                    <label for="companyName" class="col-md-3 col-form-label text-md-left">会社名</label>
                    <div class="col-sm-9">
                        <input type="text"  v-model = "company_name" name="company_name" placeholder="会社名" class="form-control" autofocus required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-sm-3 control-label text-md-left" >Email</label>
                    <div class="col-sm-9">
                        <input type="email" placeholder="admin@gmail.com" v-model="email" :class="[email.length  < 2? 'form-control ' : 'form-control done']" name= "email" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password" class="col-sm-3 control-label text-md-left">パスワード</label>
                    <div class="col-sm-9">
                        <input type="password" v-model="password" :class="[password.length  < 2? 'form-control ' : 'form-control done']" placeholder="パスワード" name="password">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password2" class="col-sm-3 control-label text-md-left">パスワード（確認）</label>
                    <div class="col-sm-9">
                        <input type="password" v-model="password2" placeholder="パスワード（確認）" class="form-control" name="password2">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="post" class="col-sm-3 control-label text-md-left">会社郵便番号（ハイフンなし）</label>
                    <div class="col-sm-9">
                        <input type="text" v-model="post" placeholder="123456" class="form-control" name="post">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="address" class="col-sm-3 control-label text-md-left">会社ご住所</label>
                    <div class="col-sm-9">
                        <input type="text" v-model="address" placeholder="例）東京都港区" class="form-control" name="address">
                    </div>
                </div>
                <div class="form-group row">
                        <label for="address2" class="col-sm-3 control-label text-md-left">会社ご住所２</label>
                    <div class="col-sm-9">
                        <input type="text" v-model="address2" placeholder="新橋5-26-8新橋加藤" class="form-control" name="address2">
                    </div>
                </div>
                 <div class="form-group row">
                        <label for="number" class="col-sm-3 control-label text-md-left">お電話番号 </label>
                    <div class="col-sm-9">
                        <input type="number" v-model="phone_number" placeholder="03-6459-0300" class="form-control" name="phone_number">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
                            <label class="form-check-label" for="invalidCheck2">
                                <a style="color:#0288d1">利用規約</a>に同意の上、返信します。
                            </label>
                        </div>
                    </div>
                            
                </div>
                <button type="submit" class="btn btn-success btn-block">登録する</button>
                <p style="color:#0288d1; text-align:center;" >ログイン画面へ戻る</p>
                        
                </div> <!-- /.form-group -->

            </form> <!-- /form -->
        </div> <!-- ./container -->
    </body>
    <script src="https://unpkg.com/vue@2.4.2" type="text/javascript"></script>
    <script type="text/javascript">
        new Vue({
            el: '#root',
            data: {
                err: [],
                name: '',
                company_name: '',
                email: '',
                password: '',
                password2: '',
                post: '',
                address: '',
                address2: '',
                phone_number: ''

            },
            methods: {
                checkForm: function(e) {
                    if(this.password !== this.password2 ) {
                        this.err.push('Mat khau khong trung khop!');
                    }
                    e.preventDefault();

                }
            }
        });
    </script>  
    </html>