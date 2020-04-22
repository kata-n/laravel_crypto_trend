<template>
    <div class="l-container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Twitterアカウントのページです</div>
                    <dl v-for="(account in accountdata.results">
                      <button type="submit" @click.stop.prevent="changefollow()">フォローする</button>
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
            isFollowedBy : {
              type: Boolean,
              default: false,
            }
          };
        },
        mounted() {
          this.$http.get("/twitteraccount")
          .then(response => {this.accountdata = response.data;
          });
        },
        methods: {
          changefollow() {
            this.isFollowedBy
            ? this.ubfollow()
            : this.follow()
          },
          async follow() {
            const response = await axios.post('https://api.twitter.com/1.1/friendships/create.json');
            this.isFollowedBy = true
          },
          async unfollow() {
            const response = await axios.delete(this.endpoint)
            this.isFollowedBy = false
          },
        }
    }
</script>
