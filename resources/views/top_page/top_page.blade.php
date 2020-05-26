@extends('layouts.contents-template')

@section('title','トップ画面')

@section('header')
  @parent
    <div class="l-headerlogo"><a href="/" class="c-atagbtn c-headerlogobtn">Crypto Trend</a></div>
@endsection

@section('content')
  <section class="l-container p-container">
    <div id="app">
      <toppage-component></toppage-component>
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