<template>
    <div class="l-container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Google Newsから取得したニュース一覧です</div>
                    <dl v-for="(account in accountdata.results">
                      <button type="submit" @click="changefollow(account.screen_name)">フォローする</button>
                      <h2>{{Newsdata.title}}</h2>
                      <h3>{{Newsdata.url}}</h3>
                    </dl>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
          return {
            Newsdata :[]
          };
        },
        mounted() {
          this.$http.get("/news")
          .then(response => {this.Newsdata = response.data;
          });
        }
    }
</script>
