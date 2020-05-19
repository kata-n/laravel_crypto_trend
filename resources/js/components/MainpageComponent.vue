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
          v-bind:id="Cryopto"
          v-bind:value="Cryopto"
          v-model="preview"
          v-on:click="find_categories">
        <label v-bind:for="Cryopto">{{ Cryopto }}</label>
      </li>
    </ul>
  </div>
  <p>選択している仮想通貨：{{ preview }}</p>
  <ul class="entry_list">
    <li v-for="Weekdata in Weekdatas"  v-show="Weekdata.display">
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
      },
      methods: {
        find_categories: function(){
          var Weekdatas = this.Weekdatas;
          var preview = this.$set.preview;
                    console.log(preview);

          if(preview.length > 0) {
            for (var i = 0; i < Weekdatas.length; i++) {
              var cryptoname = Weekdatas[i].Crypto_name;
              for (var j = 0; j < preview.length; j++){
                if(preview.indexOf(cryptoname) >= 0){
                  Weekdatas[i].display = true;
                  break;
                } else {
                  Weekdatas[i].display = false;
                }
              }
            }

          } else {
            for (var i = 0; i < Weekdatas.length; i++) {
              var categories = Weekdatas[i].Crypto_name;
              Weekdatas[i].display = true;
            }
          }

        }
      }
    }
</script>
