@extends('layouts.contents-template')

@section('title','ニュース画面')

@section('description','仮想通貨に関連したニュース情報をGoogle newsを使って非表示しています')

@section('header')
  @parent
  <div class="l-header__logo"><a href="/mainpage" class="c-atagbtn c-headerlogobtn">Crypto Trend</a></div>
  <nav class="l-nav">
    <div class="c-menu_trigger js-toggle-sp-menu">
      <span></span>
      <span></span>
      <span></span>
    </div>
  <nav class="c-header_nav js-toggle-sp-menu-target js-navtarget">
    <ul class="l-listwrapper p-listwrapper">
      <li class="l-list p-list"><a href="/mainpage">Twitterランキング</a></li>
      <li class="l-list p-list"><a href="/accountpage">Twitterアカウント</a></li>
      <li class="l-list p-list"><a class="dropdown-item" href="{{ route('logout') }}"
        onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
        {{ __('Logout') }}
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
        </form>
      </li>
    </ul>
  </nav>
@endsection

@section('content')
  <section class="l-container p-container">
    <div id="app">
      <newspage-component></newspage-component>
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
