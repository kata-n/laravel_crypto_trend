<template>
    <div class="l-newspage">
        <div class="mainwrapper">
            <div class="l-maintitle">
              <h2 class="c-heading">仮想通貨関連ニュース</h2>
            </div>

            <div class="l-newslist p-newslist">
                <div class="p-newstitle">Google Newsから取得したニュース一覧を表示しています。</div>
                <div v-for="news in NewsData.results" class="p-newsbox">
                  <p>{{news.title}}</p>
                  <p><a v-bind:href="news.url" target="_blank">詳細(外部ページへ)</a></p>
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
