@extends('layouts.contents-template')

@section('title','ログイン画面')

@section('description','Crypto Trendログイン画面')

@section('header')
  @parent
  <div class="l-header__logo"><a href="/" class="c-atagbtn c-headerlogobtn">Crypto Trend</a></div>
  <nav class="l-nav">
    <div class="c-menu_trigger js-toggle-sp-menu">
      <span></span>
      <span></span>
      <span></span>
    </div>
  <nav class="c-header_nav js-toggle-sp-menu-target js-navtarget">
    <ul class="l-listwrapper p-listwrapper">
      <li class="l-list p-list"><a href="/twitter/login"><i class="fab fa-twitter"></i>Twitterから新規登録する</a></li>
    </ul>
  </nav>
@endsection

@section('content')
<section class="l-container p-container">
   <div class="l-loginpage">
    <div class="l-loginwrapper">
          <div class="l-loginform c-form">
              <div class="c-heading">{{ __('Login') }}</div>

              <div class="c-content">
                  <form method="POST" action="{{ route('login') }}">
                      @csrf

                      <div class="l-formgroup">
                          <label for="email">{{ __('E-Mail Address') }}</label>

                            <input id="email" type="email" class="c-inputtext @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            <div class="c-text_underline"></div>

                            @error('email')
                              <span class="c-message__alert">
                                <strong>{{ $message }}</strong>
                              </span>
                            @enderror

                      </div>

                      <div class="l-formgroup">
                          <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                          <div class="col-md-6">
                              <input id="password" type="password" class="c-inputtext @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                              <div class="c-text_underline"></div>

                              @error('password')
                                  <span class="c-message__alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                      </div>

                      <div class="l-formgroup">
                          <div class="col-md-6 offset-md-4">
                              <div class="form-check">
                                  <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                  <label class="form-check-label" for="remember">
                                      {{ __('Remember Me') }}
                                  </label>
                              </div>
                          </div>
                      </div>

                      <div class="l-formgroup">
                            <input type="submit" class="c-authbtn" value="ログインする">

                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif

                            <p>※Twitterアカウント連携を行っていない場合は、<a href="/twitter/login">こちら</a>から連携を行ってください</p>

                      </div>
                      <div class="l-formgroup__twitter c-lineborder">
                        <p>または</p>
                        <a href="/twitter/login" class="c-atagbtn c-twitterbtn"><i class="fab fa-twitter"></i>Twitterでログインする</a>
                      </div>
                  </form>
              </div>
          </div>
      </div>
    </div>
</section>
@endsection

@section('footer')
    <div class="p-footerabout">
      Copyright kata. AlL Rights Reserved.
    </div>
    <div class="p-footername">
      This github Repositories: <a href="{{ url('https://github.com/kata-n/laravel_crypto_trend')}}" target="_blank">crypto_trend</a>
    </div>
@endsection
