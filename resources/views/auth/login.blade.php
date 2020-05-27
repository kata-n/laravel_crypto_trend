@extends('layouts.contents-template')

@section('title','ログイン画面')

@section('header')
  @parent
    <div class="l-headerlogo"><a href="/" class="c-atagbtn c-headerlogobtn">Crypto Trend</a></div>
@endsection

@section('content')
<section class="l-container p-container">
   <div class="l-loginpage">
    <div class="l-loginwrapper">
          <div class="l-loginform c-form">
              <h2 class="c-heading">{{ __('Login') }}</h2>

              <div class="card-body">
                  <form method="POST" action="{{ route('login') }}">
                      @csrf

                      <div class="form-group row">
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

                      <div class="form-group row">
                          <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                          <div class="col-md-6">
                              <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                              @error('password')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                      </div>

                      <div class="form-group row">
                          <div class="col-md-6 offset-md-4">
                              <div class="form-check">
                                  <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                  <label class="form-check-label" for="remember">
                                      {{ __('Remember Me') }}
                                  </label>
                              </div>
                          </div>
                      </div>

                      <div class="form-group row mb-0">
                          <div class="col-md-8 offset-md-4">
                              <input type="submit" class="btn btn-primary" value="ログインする">

                              @if (Route::has('password.request'))
                                  <a class="btn btn-link" href="{{ route('password.request') }}">
                                      {{ __('Forgot Your Password?') }}
                                  </a>
                              @endif
                          </div>
                      </div>
                  </form>
              </div>
          </div>
      </div>
    </div>
</section>
@endsection

@section('footer')
   <div class="footer__content">
    <div class="footer__siteabout">
      <a href="{{ url('/policy')}}">このサイトについて</a>
    </div>
    <div class="footer__copyright">
      Copyright© <a href="{{ url('/login')}}">kata</a>
    </div>
   </div>
@endsection
