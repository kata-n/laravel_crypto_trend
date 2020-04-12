<template>
    <div class="l-container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        I'm an example component.
                    </div>
                    <a href="/login" class="quiz__startbtn">ログインする</a>
                    <a href="/register" class="quiz__startbtn">登録する</a>
                    <a href="/twitter/login" class="quiz__startbtn">Twitterでログインする</a>
                </div>
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
