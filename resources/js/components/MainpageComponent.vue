<template>
    <div class="l-container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Componentメインのページです</div>
                    <a href="/accountpage" class="">アカウントページ</a>
                    <a href="/newspage" class="">仮想通貨ニュース一覧</a>
                </div>
            </div>
            <div>
              <h2>仮想通貨Twitterランキング</h2>
              <label>
                <input type="radio" v-model="RankingType" value="1">過去1時間
              </label>
              <label>
                <input type="radio" v-model="RankingType" value="2">過去24時間
              </label>
              <label>
                <input type="radio" v-model="RankingType" value="3">過去一週間
              </label>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
      data(){
        return {
          Hourdata: {},
          Daydata: {},
          Weekdata: {},
          Crypto_lists: [],
          preview: [],
          RankingType: 1,
          display: true
        }
      },
      mounted() {
        this.$http.get(`/ranking`).then(response => {
        this.Hourdata = response.data.HourRankingData;
        this.Daydata = response.data.DayRankingData;
        this.Weekdata = response.data.WeekRankingData;

      var array = response.data.WeekRankingData;
      for (var key in array) {
        var cryptoname = array[key].Crypto_name
        console.log(cryptoname);
        if(cryptoname) {
          self.Crypto_lists.push(cryptoname)
        }}

        });
      }
    }
</script>
