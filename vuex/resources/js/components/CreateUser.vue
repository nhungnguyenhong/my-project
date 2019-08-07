<template>
    <div class="container">
        <form class="register_form" @submit.prevent="add">
		<h2 style="margin-top: 5%; text-align:center">ご登録画面</h2>
		<p class="hint-text" style="text-align:center; color: green">Create your account. It's free and only takes a minute.</p>
        <div class="form-group row">
            <label for="name" class="col-md-3 col-form-label text-md-left">ご担当者様お名前</label>
            <div class="col-md-9">
			<input type="text" class="form-control" name="name" placeholder="風庭太郎" v-model="name" required="required">  
            </div>   	
        </div>
        <div class="form-group row">
            <label for="company_name" class="col-md-3 col-form-label text-md-left">会社名</label>
            <div class="col-md-9">
			<input type="text" class="form-control" name="company_name" v-model="company_name" placeholder="会社名" required="required">
            </div>     	
        </div>
        <div class="form-group row">
            <label for="email" class="col-sm-3 control-label text-md-left" >Email</label>
            <div class="col-md-9">
        	<input type="email" class="form-control" v-validate="'required|email'" name="email" v-model="email" placeholder="admin@gmail.com" required="required">
            <span v-show="errors.has('email')" class="help is-danger">{{ errors.first('email') }}</span>
            </div>
        </div>
		<div class="form-group row">
            <label for="password" class="col-sm-3 control-label text-md-left">パスワード</label>
            <div class="col-sm-9">
            <input v-validate="'required'" class="form-control" v-model="password" name="password" type="password" :class="{'is-danger': errors.has('password')}" placeholder="Password" ref="password">
            <span v-show="errors.has('password')" class="help is-danger">{{ errors.first('password') }}</span>
            </div>
        </div>
		<div class="form-group row">
            <label for="password2" class="col-sm-3 control-label text-md-left">パスワード（確認）</label>
            <div class="col-sm-9">
            <input v-validate="'required|confirmed:password'" class="form-control" name="password_confirmation" type="password" :class="{'is-danger': errors.has('password_confirmation')}" placeholder="Password, Again" data-vv-as="password">
            <span v-show="errors.has('password_confirmation')" class="help is-danger">{{ errors.first('password_confirmation') }}</span>
            </div>
        </div>
        <div class="form-group row">
            <label for="post" class="col-sm-3 control-label text-md-left">会社郵便番号（ハイフンなし）</label>
            <div class="col-sm-9">
                <input type="text" v-model="post" placeholder="123456" class="form-control">
            </div>
        </div>  
        <div class="form-group row">
            <label for="address" class="col-sm-3 control-label text-md-left">会社ご住所</label>
            <div class="col-sm-9">
            <input type="text" v-model="address" placeholder="例）東京都港区" class="form-control">
            </div>
        </div>
                <div class="form-group row">
                        <label for="address2" class="col-sm-3 control-label text-md-left">会社ご住所２</label>
                    <div class="col-sm-9">
                        <input type="address2" v-model="address2" placeholder="新橋5-26-8新橋加藤" class="form-control">
                    </div>
                </div>
                 <div class="form-group row">
                        <label for="number" class="col-sm-3 control-label text-md-left">お電話番号 </label>
                    <div class="col-sm-9">
                        <input type="number" v-model="phone_number" placeholder="03-6459-0300" class="form-control">
                    </div>
                </div>      
        <div class="form-group" style="float: left" >
			<label class="checkbox-inline"><input type="checkbox" required="required"><a href="#">利用規約</a> に同意の上、返信します</label>
		</div>
		<div class="form-group">
            <button class="btn btn-success btn-lg btn-block">登録する</button>
            </div>
        <div class="form-group">
            <button class="btn btn-none btn-lg btn-block" style="color: green"><router-link to="/"> ログイン画面へ戻る </router-link></button>
            </div>

        </form>
            
        </div>
</template>

 <script src="https://cdn.jsdelivr.net/npm/vee-validate@latest/dist/vee-validate.js"></script>

  <!-- unpkg -->
<script src="https://unpkg.com/vee-validate@latest"></script>
<script>
import VeeValidate from 'vee-validate';

Vue.use(VeeValidate);
import Vue from 'vue';

    export default {
        data: function () {
            return {
                name: "",        
                phone_number: "",
                email: "",
                password: "",
                company_name: "",
                post: "",
                address: "",
                address2: "",
            }
        },
        methods: {
            add: function () {
                this.$store.dispatch('addUser', {
                    name: this.name,
                    email: this.email,
                    password: this.password,
                    phone_number: this.phone_number,
                    company_name: this.company_name,
                    address: this.address,
                    address2: this.address2,
                    post: this.post,
                    start: this.start,
                    close: this.close,
                    status: this.status

                });
                this.$router.push({name: 'users.index'});
            }
        }
    }
</script>
<style>
    body{
		color: black;
		font-family: 'Roboto', sans-serif;
    }
    .register_form {
        width: 50%;
        margin-left: 25%;
    }
    .form-control{
		height: 40px;
		box-shadow: none;
		color: #969fa4;
	}
	.form-control:focus{
		border-color: #5cb85c;
	}
    .form-control, .btn{        
        border-radius: 3px;
    }
	.signup-form{
		width: 400px;
		margin: 0 auto;
		padding: 30px 0;
	}
	.signup-form h2{
		color: #636363;
        margin: 0 0 15px;
		position: relative;
		text-align: center;
    }
	.signup-form h2:before, .signup-form h2:after{
		content: "";
		height: 2px;
		width: 30%;
		background: #d4d4d4;
		position: absolute;
		top: 50%;
		z-index: 2;
	}	
	.signup-form h2:before{
		left: 0;
	}
	.signup-form h2:after{
		right: 0;
	}
    .signup-form .hint-text{
		color: #999;
		margin-bottom: 30px;
		text-align: center;
	}
    .signup-form form{
		color: #999;
		border-radius: 3px;
    	margin-bottom: 15px;
        background: #f2f3f7;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
    }
	.signup-form .form-group{
		margin-bottom: 20px;
	}
	.signup-form input[type="checkbox"]{
		margin-top: 3px;
	}
	.signup-form .btn{        
        font-size: 16px;
        font-weight: bold;		
		min-width: 140px;
        outline: none !important;
    }
	.signup-form .row div:first-child{
		padding-right: 10px;
	}
	.signup-form .row div:last-child{
		padding-left: 10px;
	}    	
    .signup-form a{
		color: #fff;
		text-decoration: underline;
	}
    .signup-form a:hover{
		text-decoration: none;
	}
	.signup-form form a{
		color: #5cb85c;
		text-decoration: none;
	}	
	.signup-form form a:hover{
		text-decoration: underline;
	}  
</style>




