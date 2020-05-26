<template>
    <div class="l-toppage">
        <div class="l-toparea">
            <a href="/login" class="c-atagbtn c-topbtn">ログインする</a>
            <a href="/register" class="c-atagbtn c-topbtn">登録する</a>
        </div>
        <div class="l-toptwitterarea">
            <a href="/twitter/login" class="c-atagbtn c-twitterbtn">Twitterでログインする</a>
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
