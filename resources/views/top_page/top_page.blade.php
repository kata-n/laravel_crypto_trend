@extends('layouts.contents-template')

@section('title','トップ画面')

@section('description','Twitterでの仮想通貨のトレンドを知るきっかけに。Twitterのアカウントを連携して仮想通貨のトレンドを知ろう。')

@section('header')
  @parent
    <div class="l-header__logo"><a href="/" class="c-atagbtn c-headerlogobtn">Crypto Trend</a></div>
    <div class="l-header__login"><a href="/login" class="c-atagbtn c-loginbtn">ログインする</a></div>
@endsection

@section('content')
  <section class="l-container p-container">
    <div id="app">
      <toppage-component></toppage-component>
    </div>
  </section>
@endsection

@section('footer')
    <div class="p-footerabout">
      Copyright kata. AlL Rights Reserved.
    </div>
    <div class="p-footername">
      My Twitter Account: <a href="{{ url('https://twitter.com/denknit')}}" target="_blank">kata</a>
    </div>
@endsection