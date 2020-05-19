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
          RankingAlldata: {},
          HourRanking: {},
          DayRanking: {},
          WeekRanking: {},
          RankingType: "1"
        }
      },
      mounted() {
        this.$http.get(`/ranking`).then(response => {
        this.RankingAlldata = response.data;
        this.HourRanking = RankingAlldata[0];

        });
      },
      methods:{
        setRanking(){
          this.HourRanking = RankingAlldata[0];
          this.DayRanking = RankingAlldata[1];
          this.WeekRanking = RankingAlldata[2];
        }
      }
    }
</script>
