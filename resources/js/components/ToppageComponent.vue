<template>
    <div class="l-toppage">
       <div class="l-firstview p-firstview">
         <div class="l-toppagecontent">
            <p class="p-toppage__title">仮想通貨のトレンドをTwitterから</p>
            <div class="l-toppagecontent__sentence p-toppage__sentence">
               <div class="l-toptwitterarea">
                  <p class="c-loginfont">Crypto Trend(クリプト トレンド)は、仮想通貨の情報サイトです。</p>
                  <p class="c-loginfont">特徴はTwitterを利用した話題性の把握。</p>
                  <p class="c-loginfont">つぶやきを自動集計し、各銘柄の話題性をCrypto Trendで知る事ができます。</p>
                  <p class="c-loginfont__regist">Twitter連携をおこなって、登録してみよう</p>
                  <a href="/twitter/login" class="c-atagbtn c-twitterbtn"><i class="fab fa-twitter"></i>Twitterアカウントで新規登録</a>
               </div>
            </div>
         </div>
       </div>
       <div class="l-secondview">
         <div class="l-toppagecontent">
           <p class="p-toppageintoroduce">特徴と機能</p>
            <div class="l-introduction">
              <div class="l-introduction__column">
                <div class="p-introduction__title">
                  <p>つぶやき数をランキングで表示</p>
                </div>
                <div class="p-introduction__img">
                  <img src="/images/toppage/introduction1.png" alt />
                </div>
                <div class="p-introduction__comment">
                  <p>
                    仮想通貨の各銘柄をキーワードに
                    <br />集計結果をランキング形式で表示しています。
                    <br />1時間、1日、1週間ごとで表示が可能。
                    <br />話題の仮想通貨を知るきっかけに。
                  </p>
                </div>
              </div>
              <div class="l-introduction__column">
                <div class="p-introduction__title">
                  <p>Twitterユーザー表示</p>
                </div>
                <div class="p-introduction__img">
                  <img src="/images/toppage/introduction2.png" alt />
                </div>
                <div class="p-introduction__comment">
                  <p>
                    仮想通貨に関連したTwitterユーザーを表示。
                    <br />Twitterアカウントを登録すれば
                    <br />画面上からフォローする事が可能。
                    <br />ユーザーを見つけるきっかけに。
                  </p>
                </div>
              </div>
              <div class="l-introduction__column">
                <div class="p-introduction__title">
                  <p>仮想通貨関連ニュース</p>
                </div>
                <div class="p-introduction__img">
                  <img src="/images/toppage/introduction3.png" alt />
                </div>
                <div class="p-introduction__comment">
                  <p>
                    仮想通貨に関連したニュースを表示。
                    <br />詳細への外部ページへのリンクも設置。
                    <br />気になるニュースをチェックできます。
                  </p>
                </div>
              </div>
            </div>
            <div class="l-introend">
              <p class="p-toppageend">登録はTwitterから</p>
              <div class="l-introend__btn">
                <a href="/twitter/login" class="c-atagbtn c-twitterbtn"><i class="fab fa-twitter"></i>Twitterアカウントで新規登録</a>
              </div>
            </div>

            <div v-scroll="handleScroll" :class="{'u-visible':visible}" class="c-pagetopBtn" @click="scrollTop">
              <i class="fas fa-chevron-up c-pagetopBtn__icon"></i>
            </div>

         </div>
       </div>
    </div>

</template>

<script>
    export default {
      data(){
        return {
          visible: false,
        }
      },
      methods: {
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
      }
    }
</script>
