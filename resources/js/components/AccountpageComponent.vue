<template>
    <div class=" l-accountpage">
      <div class="l-mainwrapper">
        <div class="l-maintitle">
          <h2 class="c-heading">Twitterアカウント一覧</h2>
        </div>

        <button v-if="flag" @click="autofollow" class="c-autofollowbtn__active">
          自動フォローを解除
        </button>
        <button @click="autofollow" v-else class="c-autofollowbtn">
          自動フォローをする
        </button>

        <div v-for="account in getItems" class="l-accountarea p-accountarea">
          <div class="p-accountarea__header">
            <p class="p-accountarea__name">{{account.account_name}}</p>
            <button type="submit" @click="changefollow(account.account_screen_name)">フォローする</button>
          </div>

          <p class="p-accountarea__idname">@{{account.account_screen_name}}</p>
          <div class="p-profilecount">
            <p>フォロー数：{{account.follow_count}}</p>
            <p>フォロワー数：{{account.follower_count}}</p>
          </div>
          <p>プロフィール：{{account.account_description}}</p>
          <p>最新ツイート：{{account.account_text}}</p>
        </div>
        <paginate
          :page-count="getPageCount"
          :page-range="3"
          :margin-pages="2"
          :click-handler="clickCallback"
          :prev-text="'＜'"
          :next-text="'＞'"
          :container-class="'c-pagination'"
          :page-class="'c-pagination__item'">
        </paginate>
      </div>
    </div>

</template>

<script>

    export default {

        data() {
          return {
            accountdata : [],
            flag : false,
            parPage: 5,
            currentPage: 1
          };
        },

        mounted() {
          this.$http.get("/accountshow")
          .then(response => {this.accountdata = response.data.results;
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

          //ページネーション
          clickCallback: function (pageNum) {
             this.currentPage = Number(pageNum);
          },

        },

       computed: {
         getItems: function() {
          let current = this.currentPage * this.parPage;
          let start = current - this.parPage;
          return this.accountdata.slice(start, current);
         },
         //ページ数
         getPageCount: function() {
          return Math.ceil(this.accountdata.length / this.parPage);
         }
       }

    }
</script>
