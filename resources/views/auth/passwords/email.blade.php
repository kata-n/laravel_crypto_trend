@extends('layouts.contents-template')

@section('title','パスワードEmail送信確認')

@section('header')
  @parent
  <div class="l-headerlogo"><a href="/" class="c-atagbtn c-headerlogobtn">Crypto Trend</a></div>
  <nav class="l-nav">
    <div class="c-menu_trigger js-toggle-sp-menu" id="js-sp-nav-menu">
      <span></span>
      <span></span>
      <span></span>
    </div>
  <nav class="c-header_nav js-toggle-sp-menu-target" id="js-classtaget">
    <ul class="l-listwrapper p-listwrapper">
      <li class="l-list p-list"><a href="/login">ログインする</a></li>
    </ul>
  </nav>
@endsection

@section('content')
<div class="l-container p-container">
    <div class="l-authpage">
        <div class="c-heading">{{ __('Reset Password') }}</div>
        <p class="c-authtitle">パスワードの再設定が行えます。<p>
        <p>登録したパスワードを下記フォームに入力して、メールを送信するをクリックしてください。</p>
        <p>メールにパスワード再設定の為のリンクが記載されていますので、そちらから再設定をお願い致します。</p>

        <div class="l-authbody">
            @if (session('status'))
                <div class="c-alert__success">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div class="l-formgroup">
                    <label for="email">{{ __('E-Mail Address') }}</label>

                    <div>
                        <input id="email" type="email" class="c-inputtext @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="メールアドレスを入力">
                        <div class="c-text_underline"></div>

                        @error('email')
                            <span class="c-message__alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="l-formgroup">
                    <div>
                        <button type="submit" class="c-authbtn">
                            {{ __('Send Password Reset Link') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>
@endsection
