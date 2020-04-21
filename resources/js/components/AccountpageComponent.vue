<template>
    <div class="l-container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Twitterアカウントのページです</div>
                    <a href="/mainpage" class="">メインページへ</a>

                    <dl v-for="(account in accountdata.results">
                      <dt>{{account.user.name}}</dt>
                      <dt>{{account.user.screen_name}}</dt>
                      <dt>{{account.text}}</dt>
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
            accountdata :[]
          };
        },
        mounted() {
          this.$http.get("/twitteraccount")
          .then(response => {this.accountdata = response.data;
          });
        }
    }
</script>
