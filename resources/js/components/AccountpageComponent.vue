<template>
    <div class="l-container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Twitterアカウントのページです</div>

                    <button v-if="flag" @click="autofollow">
                      自動フォローを解除
                    </button>
                    <button @click="autofollow" v-else>
                      自動フォローをする
                    </button>


                    <dl v-for="(account in accountdata.results">
                      <button type="submit" @click="changefollow(account.screen_name)">フォローする</button>
                      <dt>アカウント名：{{account.name}}</dt>
                      <dt>ユーザー名：{{account.screen_name}}</dt>
                      <dt>フォロー数：{{account.friends_count}}</dt>
                      <dt>フォロワー数：{{account.followers_count}}</dt>
                      <dt>プロフィール：{{account.description}}</dt>
                      <dt>最新ツイート：{{account.status.text}}</dt>
                    </dl>
                    <a href="/mainpage" class="">メインページへ</a>
                </div>
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
            const Twitterautoflag = this.flag
            this.$http.post("/twitterautofollow", {
              flag: Twitterautoflag
            }).then(e => {
                    this.flag = e.data.res;
                    console.log("フォロー成功");
                }).catch((error) => {
                    console.log("エラー");
                })
          },

          autofollow: function(){
            const Twitterautoflag = this.flag
            this.$http.post("/twitterautofollow", {
              flag: Twitterautoflag
            })
          },

        }
    }
</script>
