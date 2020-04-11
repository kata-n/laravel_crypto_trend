@extends('layouts.contents-template')

@section('title','トップ画面')

@section('header')
  @parent
  <nav class="nav">
    <div class="menu-trigger js-toggle-sp-menu" id="js-sp-nav-menu">
      <span></span>
      <span></span>
      <span></span>
    </div>
  <nav class="header-nav js-toggle-sp-menu-target" id="js-classtaget">
    <ul>
      <li><a href="/mainpage">クイズに挑戦</a></li>
      <li><a href="#about-keigen" id="toAbout" class="js-toggle-sp-menu">軽減税率のフシギ</a></li>
      <li><a href="#book" id="toBook" class="js-toggle-sp-menu">本</a></li>
      <li><a href="#imformation" id="toImformation" class="js-toggle-sp-menu">お知らせ</a></li>
      <li><a href="/policy" class="js-toggle-sp-menu">このサイトについて</a></li>
    </ul>
  </nav>
@endsection

@section('content')
  <section class="toppage">
      <div id="app">
        <router-view />
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