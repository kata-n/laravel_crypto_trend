@extends('layouts.contents-template')

@section('title','パスワードの確認')

@section('header')
  @parent
  <div class="l-headerlogo"><a href="" class="c-atagbtn c-headerlogobtn">Crypto Trend</a></div>
@endsection

@section('content')
<div class="l-container p-container">
    <div class="l-authpage">
      <div class="c-heading">{{ __('Reset Password') }}</div>

      <div class="l-authbody">
          <form method="POST" action="{{ route('password.update') }}">
              @csrf

              <input type="hidden" name="token" value="{{ $token }}">

              <div class="l-formgroup">
                  <label for="email">{{ __('E-Mail Address') }}</label>

                  <div>
                      <input id="email" type="email" class="c-inputtext @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
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
                  <div>
                      <button type="submit" class="c-authbtn">
                          {{ __('Reset Password') }}
                      </button>
                  </div>
              </div>
          </form>
      </div>
    </div>
</div>
@endsection
