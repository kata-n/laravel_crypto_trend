@extends('layouts.contents-template')

@section('title','メイン画面')

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
      <li class="l-list p-list"><a href="/accountpage">Twitterアカウント</a></li>
      <li class="l-list p-list"><a href="/newspage">仮想通貨関連ニュース</a></li>
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

    <!--フラッシュメッセージ-->
    @if (session('flash_message'))
      <div class="c-alert text-center">
        {{ session('flash_message') }}
      </div>
    @endif

    <div id="app">
      <mainpage-component></mainpage-component>
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