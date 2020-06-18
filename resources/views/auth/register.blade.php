@extends('layouts.contents-template')

@section('title','新規登録する')

@section('header')
  @parent
  <div class="l-headerlogo"><a href="/" class="c-atagbtn c-headerlogobtn">Crypto Trend</a></div>
  <nav class="l-nav">
    <div class="c-menu_trigger js-toggle-sp-menu">
      <span></span>
      <span></span>
      <span></span>
    </div>
  <nav class="c-header_nav js-toggle-sp-menu-target js-navtarget">
    <ul class="l-listwrapper p-listwrapper">
      <li class="l-list p-list"><a href="/login">ログインする</a></li>
    </ul>
  </nav>
@endsection

@section('content')
<section class="l-container p-container">
    <div class="l-registpage">
        <div class="l-regitwrapper">
         <div class="l-registform c-form">
          <div class="c-heading">{{ __('Register') }}</div>
              <form method="POST" action="{{ route('register') }}">
                  @csrf
                  <div class="l-formgroup">
                      <label for="name">{{ __('Name') }}</label>
                        <input id="name" type="text" class="c-inputtext @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="必須">
                        <div class="c-text_underline"></div>
                        @error('name')
                            <span class="c-message__alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                  </div>

                  <div class="l-formgroup">
                      <label for="email">{{ __('E-Mail Address') }}</label>
                      <div>
                          <input id="email" type="email" class="c-inputtext @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="必須">
                          <div class="c-text_underline"></div>
                          @error('email')
                              <span class="c-message__alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                  </div>

                  <div class="l-formgroup">
                      <label for="password">{{ __('Password') }}</label>
                      <div>
                          <input id="password" type="password" class="c-inputtext @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                          <div class="c-text_underline"></div>
                          @error('password')
                              <span class="c-message__alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                  </div>

                  <div class="l-formgroup">
                      <label for="password-confirm">{{ __('Confirm Password') }}</label>
                      <div>
                          <input id="password-confirm" type="password" class="c-inputtext" name="password_confirmation" required autocomplete="new-password">
                          <div class="c-text_underline"></div>
                      </div>
                  </div>

                  <div class="l-formgroup">
                    <input type="submit" class="c-authbtn" value="登録する">
                  </div>

              </form>
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
      twitter© <a href="{{ url('https://twitter.com/denknit')}}" target="_blank">kata</a>
    </div>
@endsection