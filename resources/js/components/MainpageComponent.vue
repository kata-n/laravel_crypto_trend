<template>
    <div class="l-mainpage">
        <div class="l-mainwrapper">
            <div class="l-maintitle">
              <h2 class="c-heading">仮想通貨Twitterランキング</h2>
              <div>各銘柄毎でツイート数が多い順に表示しています。</div>
            </div>

            <div class="l-cryptoranking p-cryptoranking">
              <input type="radio" value="1" id="Tab1" v-model="isActive">
              <label for="Tab1" class="p-RnkingSlect">過去1時間</label>

              <input type="radio" value="2" id="Tab2" v-model="isActive">
              <label for="Tab2" class="p-RnkingSlect">過去24時間</label>

              <input type="radio" value="3" id="Tab3" v-model="isActive">
              <label for="Tab3" class="p-RnkingSlect">過去一週間</label>
            </div>

            <div class="p-cryptolist__all">
              <input @click="selectAllCryptos" type="checkbox"  id="CryoptoAll">
              <label class="p-cryptoAll" for="CryoptoAll">全部にチェック</label>
            </div>

            <div class="crypto_list l-cryptolist">
              <div v-for="Cryopto in Crypto_lists" class="p-cryptolist">
                <input type="checkbox"
                  v-bind:id="Cryopto"
                  v-bind:value="Cryopto"
                  v-model="preview">
                <label class="p-cryptoname" v-bind:for="Cryopto">{{ Cryopto }}</label>
              </div>
            </div>

            <div v-for="Hourdata in displayHourDatas" 
                 v-if="isActive == '1'"
                 class="l-cryptoarea p-cryptoarea">
              <a v-bind:href="'https://twitter.com/search?q=' + Hourdata.Crypto_name" target="_blank"
              class="c-rankingtitlebtn">
              {{ Hourdata.Crypto_name }}
              </a>
              <p>ツイート数：{{ Hourdata.Tweet_count }}</p>
              <p v-if="Hourdata.Crypto_high == 0">最高取引価格：不明</p>
              <p v-else>最高取引価格：{{ Hourdata.Crypto_high }}</p>
              <p v-if="Hourdata.Crypto_low == 0">最安取引価格：不明</p>
              <p v-else>最安取引価格：{{ Hourdata.Crypto_low }}</p>
              <p>取得日時：{{ Hourdata.Tweet_time }}</p>
            </div>

            <div v-for="Daydata in displayDayDatas"
                 v-if="isActive == '2'"
                 class="l-cryptoarea p-cryptoarea">
              <a v-bind:href="'https://twitter.com/search?q=' + Daydata.Crypto_name" target="_blank"
              class="c-rankingtitlebtn">
              {{ Daydata.Crypto_name }}
              </a>
              <p>ツイート数：{{ Daydata.Tweet_count }}</p>
              <p v-if="Daydata.Crypto_high == 0">最高取引価格：不明</p>
              <p v-else>最高取引価格：{{ Daydata.Crypto_high }}</p>
              <p v-if="Daydata.Crypto_low == 0">最安取引価格：不明</p>
              <p v-else>最安取引価格：{{ Daydata.Crypto_low }}</p>
              <p>取得日時：{{ Daydata.Tweet_time }}</p>
            </div>

            <div v-for="Weekdata in displayWeekDatas"
                 v-if="isActive == '3'"
                 class="l-cryptoarea p-cryptoarea">
              <a v-bind:href="'https://twitter.com/search?q=' + Weekdata.Crypto_name" target="_blank"
              class="c-rankingtitlebtn">
              {{ Weekdata.Crypto_name }}
              </a>
              <p>ツイート数：{{ Weekdata.Tweet_count }}</p>
              <p v-if="Weekdata.Crypto_high == 0">最高取引価格：不明</p>
              <p v-else>最高取引価格：{{ Weekdata.Crypto_high }}</p>
              <p v-if="Weekdata.Crypto_low == 0">最安取引価格：不明</p>
              <p v-else>最安取引価格：{{ Weekdata.Crypto_low }}</p>
              <p>取得日時：{{ Weekdata.Tweet_time }}</p>
            </div>

            <div v-scroll="handleScroll" :class="{visible: visible}" class="c-pagetopBtn" @click="scrollTop">
              <i class="fas fa-chevron-up c-pagetopBtn__icon"></i>
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
          visible: false,
          isAllSelected: true
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
        //ソート機能
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
        //時間表示の切り替え
        change: function(num){
        this.isActive = num
        },

        //トップへスクロール
        scrollTop: function(){
          window.scrollTo({
            top: 0,
            behavior: "smooth"
          });
        },

        //スクロールで表示非表示の切り替え
        handleScroll() {
          this.visible = window.pageYOffset > 400;
        },

        //全選択
        selectAllCryptos() {
          if (this.isAllSelected) {
            this.preview = []
            this.isAllSelected = false
          } else {
            this.preview = []
            this.preview = this.Crypto_lists
            this.isAllSelected = true
          }
        }

      }
  }
</script>
