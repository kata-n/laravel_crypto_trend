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

  <div>
    <ul class="crypto_list">
      <li v-for="Cryopto in Crypto_lists">
        <input type="checkbox"
          v-bind:id="cryptoname"
          v-bind:value="cryptoname"
          v-model="preview">
        <label v-bind:for="cryptoname">{{ Cryopto }}</label>
      </li>
    </ul>
  </div>
  <p>選択している仮想通貨：{{ preview }}</p>
  <ul class="entry_list">
    <li v-for="Weekdata in Weekdatas" v-show="post.display">
      <p>{{ Weekdata.Crypto_name }}</p>
    </li>
  </ul>

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
          Hourdatas: {},
          Daydatas: {},
          Weekdatas: {},
          Crypto_lists: [],
          preview: [],
          RankingType: 1,
          display: true
        }
      },
      mounted() {
        var self = this
        this.$http.get(`/ranking`).then(response => {
        this.Hourdatas = response.data.HourRankingData;
        this.Daydatas = response.data.DayRankingData;
        this.Weekdatas = response.data.WeekRankingData;

          //DBからcrypto_listsを生成する
          var array = response.data.WeekRankingData;
          for (var key in array) {
            var cryptoname = array[key].Crypto_name
              self.Crypto_lists.push(cryptoname)
          }

        });
      }
    }
</script>
