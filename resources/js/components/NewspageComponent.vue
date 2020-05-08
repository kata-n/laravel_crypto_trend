<template>
    <div class="l-container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Google Newsから取得したニュース一覧です</div>
                    <dl v-for="(news in NewsData.results">
                      <dt>{{news.title}}</dt>
                      <dt><a v-bind:href="news.url" target="_blank">詳細(外部ページへ)</a></dt>
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
            NewsData :[]
          };
        },
        mounted() {
          this.$http.get("/newslist")
          .then(response => {this.NewsData = response.data;
          });
        }
    }
</script>
