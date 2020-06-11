<template>
    <div class="l-toppage">
       <div class="l-firstview p-firstview">
         <div class="l-toppagecontent">
            <p class="p-toppage__title">仮想通貨のトレンドをTwitterから</p>
            <div class="l-toparea">
                <a href="/login" class="c-atagbtn c-topbtn">メールアドレスからログイン</a>
                <a href="/register" class="c-atagbtn c-topbtn">登録する</a>
            </div>
            <div class="l-toptwitterarea">
                <a href="/twitter/login" class="c-atagbtn c-twitterbtn"><i class="fab fa-twitter"></i>Twitterでログインする</a>
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
                <a href="/twitter/login" class="c-atagbtn c-twitterbtn"><i class="fab fa-twitter"></i>Twitterでログインする</a>
              </div>
            </div>
         </div>
       </div>
    </div>

</template>

<script>
    export default {
        mounted() {
        }
    }
</script>
