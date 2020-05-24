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

              <input type="radio" value="1" id="Tab1" class="Tab-Btn-Radio" v-model="isActive">
              <label for="Tab1" class="Tab-Btn-Label">過去1時間</label>

              <input type="radio" value="2" id="Tab2" class="Tab-Btn-Radio" v-model="isActive">
              <label for="Tab2" class="Tab-Btn-Label">過去24時間</label>

              <input type="radio" value="3" id="Tab3" class="Tab-Btn-Radio" v-model="isActive">
              <label for="Tab3" class="Tab-Btn-Label">過去一週間</label>
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

              <div v-for="Hourdata in displayHourDatas" v-if="isActive == '1'">
                <a v-bind:href="'https://twitter.com/search?q=' + Hourdata.Crypto_name" target="_blank">
                {{ Hourdata.Crypto_name }}
              </a>
              <p>ツイート数：{{ Hourdata.Tweet_count }}</p>
              </div>
              <div v-for="Daydata in displayDayDatas" v-if="isActive == '2'">
                <a v-bind:href="'https://twitter.com/search?q=' + Daydata.Crypto_name" target="_blank">
                {{ Daydata.Crypto_name }}
              </a>
              <p>ツイート数：{{ Daydata.Tweet_count }}</p>
              </div>
              <div v-for="Weekdata in displayWeekDatas" v-if="isActive == '3'">
                <a v-bind:href="'https://twitter.com/search?q=' + Weekdata.Crypto_name" target="_blank">
                {{ Weekdata.Crypto_name }}
              </a>
              <p>ツイート数：{{ Weekdata.Tweet_count }}</p>
              </div>

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
          isActive: '1',
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
        },
        displayDayDatas() {
          return this.Daydatas.filter(Daydata => this.preview.includes(Daydata.Crypto_name));
        },
        displayHourDatas() {
          return this.Hourdatas.filter(Hourdata => this.preview.includes(Hourdata.Crypto_name));
        }
      },
      methods: {
        change: function(num){
        this.isActive = num
        }
    }
  }
</script>
