<template>
    <div class="l-container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Google Newsから取得したニュース一覧です</div>
                    <dl v-for="(news in NewsData.results">
                      <h2>{{news.title}}</h2>
                      <h3>{{news.url}}</h3>
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
            NewsData :[]
          };
        },
        mounted() {
          this.$http.get("/news")
          .then(response => {this.Newsdata = response.data;
          });
        }
    }
</script>
