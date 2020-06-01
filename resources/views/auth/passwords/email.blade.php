@extends('layouts.contents-template')

@section('title','パスワードEmail送信確認')

@section('header')
  @parent
  <div class="l-headerlogo"><a href="/mainpage" class="c-atagbtn c-headerlogobtn">Crypto Trend</a></div>
  <nav class="l-nav">
    <div class="c-menu-trigger js-toggle-sp-menu" id="js-sp-nav-menu">
      <span></span>
      <span></span>
      <span></span>
    </div>
  <nav class="c-header-nav js-toggle-sp-menu-target" id="js-classtaget">
    <ul class="l-listwrapper p-listwrapper">
      <li class="l-list p-list"><a href="/login">ログインする</a></li>
    </ul>
  </nav>
@endsection

@section('content')
<div class="l-container p-container">
    <div class="l-authpage">
        <div class="c-heading">{{ __('Reset Password') }}</div>

        <div class="l-authbody">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div class="l-formgroup">
                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="l-formgroup">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Send Password Reset Link') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>
@endsection
