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

        <li v-on:click="change('A')" v-bind:class="{'active': RankingType === 'A'}">過去1時間</li>
        <li v-on:click="change('B')" v-bind:class="{'active': RankingType === 'B'}">過去24時間</li>
        <li v-on:click="change('C')" v-bind:class="{'active': RankingType === 'C'}">過去一週間</li>
            </div>

              <div>
                <ul class="crypto_list">
                  <li v-for="Cryopto in Crypto_lists">
                    <input type="checkbox"
                      v-bind:id="Cryopto"
                      v-bind:value="Cryopto"
                      v-model="preview">
                    <label v-bind:for="Cryopto">{{ Cryopto }}</label>
                  </li>
                </ul>
              </div>
              <p>選択している仮想通貨：{{ preview }}</p>

              <ul class="article">
                <li v-for="Weekdata in displayWeekDatas"v-if="RankingType === 'A'">
                  <a v-bind:href="'https://twitter.com/search?q=' + Weekdata.Crypto_name" target="_blank">
                    {{ Weekdata.Crypto_name }}
                  </a>
                  <p>ツイート数：{{ Weekdata.Tweet_count }}</p>
                </li>
                <li v-else-if="RankingType === 'B'">ダミーテキスト2</li>
                <li v-else-if="RankingType === 'C'">ダミーテキスト3</li>
              </ul>


        </div>
    </div>
</template>

<script>
    export default {
      data(){
        return {
          Hourdatas: [],
          Daydatas: [],
          Weekdatas: [],
          Crypto_lists: [],
          preview: [],
          RankingType: 'A',
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
            self.preview.push(cryptoname)
          }

        });
      },
      computed: {
        displayWeekDatas() {
          return this.Weekdatas.filter(weekData => this.preview.includes(weekData.Crypto_name));
        }
      },
      methods: {
        change: function(num){
        this.isActive = num
        }
    }
  }
</script>
