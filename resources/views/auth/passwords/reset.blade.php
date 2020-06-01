@extends('layouts.contents-template')

@section('title','パスワードの確認')

@section('header')
  @parent
  <div class="l-headerlogo">
    <p>Crypto Trend</p>
  </div>
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

                  <div class="">
                      <input id="email" type="email" class="c-inputtext @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                      <div class="c-text_underline"></div>

                      @error('email')
                          <span class="invalid-feedback" role="alert">
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
                          <span class="invalid-feedback" role="alert">
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
