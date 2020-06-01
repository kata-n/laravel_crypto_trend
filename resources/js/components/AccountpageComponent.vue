<template>
    <div class="l-accountpage">
      <div class="l-mainwrapper">
        <div class="l-maintitle">
          <h2 class="c-heading">Twitterアカウント一覧</h2>
        </div>

        <button v-if="flag" @click="autofollow" class="c-autofollowbtn">
          自動フォローを解除
        </button>
        <button @click="autofollow" v-else class="c-autofollowbtn">
          自動フォローをする
        </button>

        <div v-for="(account in accountdata.results" class="l-accountarea p-accountarea">
          <button type="submit" @click="changefollow(account.screen_name)">フォローする</button>
          <p>アカウント名：{{account.name}}</p>
          <p>ユーザー名：{{account.screen_name}}</p>
          <div class="p-profilecount">
            <p>フォロー数：{{account.friends_count}}</p>
            <p>フォロワー数：{{account.followers_count}}</p>
          </div>
          <p>プロフィール：{{account.description}}</p>
          <p>最新ツイート：{{account.status.text}}</p>
        </div>
      </div>
    </div>

</template>

<script>
    export default {
        data() {
          return {
            accountdata :[],
            flag:false
          };
        },

        mounted() {
          this.$http.get("/twitteraccount")
          .then(response => {this.accountdata = response.data;
          });
        },

        created () {
          this.getAutofollow();
        },

        methods: {
          changefollow: function(twitter_name){
            const data = twitter_name
            this.$http.post("/twitteraccountfollow", {
              name: data
            })
          },

          //自動フォローがONまたはOFFなのかDBへ確認する
          getAutofollow: function(){
            this.$http.get("/twitterautofollow").then(e => {
                    this.flag = e.data.autoflg;
                }).catch((error) => {
                    console.log("error");
                })
          },

          //自動フォロー切り替え
          autofollow: function(){
            this.$http.get("/autofollowswitch").then(e => {
                    this.flag = e.data.autoflg;
                }).catch((error) => {
                    console.log("error");
                })
          },

        }
    }
</script>
