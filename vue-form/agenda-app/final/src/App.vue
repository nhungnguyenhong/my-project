<template>
  <mdb-container>
    <mdb-row>
      <mdb-col col="12">
        <h2 class="text-upprcase my-3" style="text-align:center">ご登録結果画面</h2>
        <br>
        <br>
        <Event
          v-for="(event, index) in events"
          :index="index"
          :name="event.name"
          :company_name="event.company_name"
          :email="event.email"
          :address="event.address"
          :phone_number="event.phone_number"
          :key="index"
          @delete="handleDelete"
        />
        <mdb-row>
          <mdb-col xl="3" md="6" class="mx-auto text-center">
            <mdb-btn color="info" @click.native="modal = true">登録</mdb-btn>
          </mdb-col>
        </mdb-row>
      </mdb-col>
    </mdb-row>
    <mdb-modal v-if="modal" @close="modal = false">
      <mdb-modal-header>
        <mdb-modal-title tag="h4" class="w-100 text-center font-weight-bold">ご登録画面</mdb-modal-title>
      </mdb-modal-header>
      <mdb-modal-body>
        <form class="mx-3 grey-text">
          <mdb-input
     
            name="name"
            label="ご担当者様お名前"
            icon="smile"
            placeholder="風庭太郎"
            type="text"
            @input="handleInput($event, 'name')"
          />
          <span class="alert alert-danger" v-show="errors.has('name')">{{ errors.first('name') }}</span>
          <mdb-input
       
            name="company_name"
            label="会社名"
            icon="house-damage"
            placeholder="会社名"
            type="text"
            @input="handleInput($event, 'company_name')"
          />
          <span class="alert alert-danger" v-show="errors.has('company_name')">{{ errors.first('company_name') }}</span>
          <mdb-input
            v-validate="'email'"
            name="email"
            label="Email"
            icon="envelope"
            placeholder="admin@gmail.com"
            type="email"
            @input="handleInput($event, 'email')"
          />
          
          <span class="alert alert-danger" v-show="errors.has('email')">{{ errors.first('email') }}</span> 
          <!-- <p v-if="!isValidate"><span class="alert alert-danger" role="alert">{{  }}this.errors['email']}}</span></p> -->
          <label>パスワード</label>
          <input
            v-validate="'required|min:6|max:35'"
            ref="password"
            name="password"
            class="password"
            type="password"
            placeholder="パスワード"
            label="パスワード"
            icon="sticky-note"
            @input="handleInput($event, 'password')"
          />
          <hr>
          <span class="alert alert-danger" v-show="errors.has('password')">{{ errors.first('password') }}</span>
          <label>パスワード（確認)</label>
          <input
            v-validate="'required|confirmed:password'"
            name="match_password"
            data-vv-as="password"
            class="password"
            icon="question-circle"
            placeholder="パスワード"
            type="password"
            @input="handleInput($event, 'match_password')"
          />
          <hr>
          <span class="alert alert-danger" v-show="errors.has('match_password')">{{ errors.first('match_password') }}</span>
          
           



          <mdb-input
            name="post"
            label="会社郵便番号（ハイフンなし）"
            type="text"
            icon="map"
            placeholder="123456"
            @input="handleInput($event, 'post')"
          />
          <span v-show="errors.has('post')">{{ errors.first('post') }}</span> 
          <mdb-input
            name="address"
            label="会社ご住所"
            icon="map-marker-alt"
            type="text"
            placeholder="例）東京都港区"
            @input="handleInput($event, 'address')"
          />
          <span class="alert alert-danger" v-show="errors.has('address')">{{ errors.first('address') }}</span>
          <mdb-input
            name="address2"
            label="会社ご住所2"
            type="text"
            icon="map-marker-alt"
            placeholder="新橋5-26-8新橋加藤"
            @input="handleInput($event, 'address2')"
          />
          <mdb-input
            v-validate="'regex:^[0-9]+'"
            name="phone_number"
            label="お電話番号"
            icon="phone"
            placeholder="03-6459-0300"
            type="text"
            @input="handleInput($event, 'phone_number')"
          />
          <span class="alert alert-danger" v-show="errors.has('phone_number')">{{ errors.first('phone_number') }}</span>
        </form>
      </mdb-modal-body>
      <div class="form-check" style="margin-left: 4%">
        <input v-validate="'required'" name="check" type="checkbox"  class="form-check-input" id="materialUnchecked" required> 
        <label class="form-check-label" for="materialUnchecked"><a style="color:#0288d1">利用規約</a>に同意の上、返信します。</label>
      </div>
      <mdb-modal-footer class="justify-content-center">
        <mdb-btn color="green" style="width:90%;" @click.native="addEvent">登録する</mdb-btn>
      </mdb-modal-footer>
        <mdb-btn style="color:#0288d1; text-align: center; margin:0 0 9px 8%; width:84%" color="" @click.native = "modal = false" >ログイン画面へ戻る</mdb-btn>
      
    </mdb-modal>
  </mdb-container>
</template>

<script>
import Vue from 'vue';
import VeeValidate from 'vee-validate';
 
Vue.use(VeeValidate); 

import {
  mdbContainer,
  mdbRow,
  mdbCol,
  mdbIcon,
  mdbBtn,
  mdbModal,
  mdbModalHeader,
  mdbModalTitle,
  mdbModalBody,
  mdbModalFooter,
  mdbInput,
  mdbTextarea
} from "mdbvue";
import Event from "@/components/Event";
export default {
  name: "App",
  components: {
    mdbContainer,
    mdbRow,
    mdbCol,
    mdbIcon,
    mdbBtn,
    mdbModal,
    mdbModalHeader,
    mdbModalTitle,
    mdbModalBody,
    mdbModalFooter,
    mdbInput,
    mdbTextarea,
    Event
  },
  data() {
    return {
      events: [
        {
          name: "Nguyen Hong Nhung",
          company_name: "Breakfast with Simon",
          email: "hongnhungnguyen4092@gmail.com",
          address: "Discuss Q3 targets",
          phone_number:"01359383736"
        },
        {
          name: "Nguyen Hong Nhung",
          company_name: "Breakfast with Simon beer",
          email: "hongnhungnguyen40921@gmail.com",
          address: "Discuss Q3 targets",
          phone_number:"013593837709"
        }
      ],
      modal: false,
      newValues: [],
      errorss:[],
      isValidate: true,
    };
  },
  methods: {
    handleDelete(eventIndex) {
      this.events.splice(eventIndex, 1);
    },
    handleInput(val, type) {
      this.newValues[type] = val;
    },
    addEvent() {
      this.isValidate = true;
      this.$validator.validateAll().then(valid => {
      if(valid){
         this.events.push({
          name: this.newValues["name"],
          company_name: this.newValues["company_name"],
          email: this.newValues["email"],
          address: this.newValues["address"],
          phone_number: this.newValues['phone_number']
        });
      }
      })
    },
  }
};
</script>

<style>
.password {
  width: 100%;
  margin-left: 2%;
  border: none;
}
label {
  margin-left: 2%;
}
</style>