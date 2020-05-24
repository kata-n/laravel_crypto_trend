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
                <li v-for="Weekdata in xxxx">
                  <p>{{ Weekdata.Crypto_name }}</p>
                </li>
                <!-- <li v-for="Weekdata in Weekdatas"  v-show="Weekdata.display">
                  <p>{{ Weekdata.Crypto_name }}</p>
                </li> -->
              </ul>



        </div>
    </div>
</template>

<script>
    export default {
      data(){
        return {
          Hourdatas: {},
          Daydatas: {},
          Weekdatas: [],
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
      watch: {
        preview: function (val) {
          console.log('called watch', val);
        },
      },
      computed: {
        xxxx() {
          if (this.Weekdatas.length === 0) {
            console.log('len===0');
            return [];
          }
          console.log('len!==0');

          this.Weekdatas.forEach(weekData => {
            console.log('weekData===>', JSON.stringify(weekData));
            console.log('judge===>', this.preview.includes(weekData.Crypto_name))
          });

          return this.Weekdatas.filter(weekData => {
            this.preview.includes(weekData.Crypto_name);
          })
            // console.log(weekData.Crypto_name);
            // console.log('judge===>', this.preview.includes(weekData.Crypto_name))
            // this.preview.includes(weekData.Crypto_name);
          // });
        }
      },
      methods: {
        find_categories: function(){
          console.log('find_categories');
          return false;
          // var Weekdatas = this.Weekdatas;
          // var preview = this.preview;

          if(this.preview.length > 0) {
            for (var i = 0; i < this.Weekdatas.length; i++) {
              var cryptoname = this.Weekdatas[i].Crypto_name;
              for (var j = 0; j < this.preview.length; j++){
                if(this.preview.indexOf(cryptoname) >= 0){
                  this.Weekdatas[i].display = true;
                  break;
                } else {
                  this.Weekdatas[i].display = false;
                }
              }
            }

          } else {
            for (var i = 0; i < this.Weekdatas.length; i++) {
              var categories = this.Weekdatas[i].Crypto_name;
              this.Weekdatas[i].display = true;
            }
          }

        }
      }

  }
</script>
