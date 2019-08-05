<template>
    <div class="list">
        <h2>{{ title }} </h2>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>会社名担当者名</th>
                    <th>電話番号</th>
                    <th>メールアドレス</th>
                    <th>会社名</th>
                    <th>郵便番号</th>
                    <th>住所</th>
                    <th>住所2</th>

                </tr>
            </thead>
            <tbody>
                
                  
                        <tr v-for="(data,index) in profile" :key="index">
                             <td @click="goTodetail(data)"> {{ data.ID }} </td>
                             <td> {{ data.name }} </td>   
                             <td>{{ data.phone_number }}</td>
                             <td>{{ data.email }}</td>
                             <td> {{ data.company_name }} </td>
                             <td>{{ data.post }}</td>
                             <td>{{ data.address }}</td>
                             <td>{{ data.address2 }}</td>  
                          </tr>
                    
            </tbody>
        </table>
    </div>
</template>
<script>
export default {
    data() {
        return {
            title: "クライアント一覧",
            profile:[
                  {        
                    name: "テスト",        
                    phone_number: "123456",
                    email: "test@mail.com",
                    company_name: "テスト",
                    post: "123456",
                    address: "123456",
                    address2: "123456",        
                    ID: 1      
                  },
                  {        
                    name: "Nhung",        
                    phone_number: "123456",
                    email: "nhunghn@mail.com",
                    company_name: "mirabo",
                    post: "123456",
                    address: "123456",
                    address2: "123456",        
                    ID: 2   
                  },
                   {        
                    name: "Hai Ngan",        
                    phone_number: "123456",
                    email: "nganhn@mail.com",
                    company_name: "mirabo",
                    post: "123456",
                    address: "123456",
                    address2: "123456",        
                    ID: 3   
                  }
      ],
     
    }
},
 methods: {
          goTodetail(Id) {    
                this.$router.push({
                        name:'contact', params:{Pid:Id}
                })
            }, 
        pushup() {
            if(this.$route.params.tonewuser != null){
                var obj =this.$route.params.tonewuser
                var idcurrent = this.profile.length +1;
                obj.ID = idcurrent;
                this.profile.push(obj);
            }
        },
        updateUser: function() {
         
                if(this.$route.params.updateuser != null) {
                    var user = this.$route.params.updateuser;
                    var index = Number(user.ID);
                    this.profile[index-1] = user;
                }
            }    
        },
         created () {
            this.updateUser();

        },
        mounted() {
                    this.pushup();
                
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

</style>


