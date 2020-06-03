<template>
    <div class="l-toppage">
       <div class="l-firstview p-firstview">
         <div class="l-toppagecontent">
            <p class="p-toppagetilte">仮想通貨のトレンドをTwitterから</p>
            <div class="l-toparea">
                <a href="/login" class="c-atagbtn c-topbtn">ログインする</a>
                <a href="/register" class="c-atagbtn c-topbtn">登録する</a>
            </div>
            <div class="l-toptwitterarea">
                <a href="/twitter/login" class="c-atagbtn c-twitterbtn">Twitterでログインする</a>
            </div>
         </div>
       </div>
       <div class="l-secondview">
         <div class="l-toppagecontent">
           <p>このサービスでできること</p>
         </div>
       </div>
    </div>

</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
