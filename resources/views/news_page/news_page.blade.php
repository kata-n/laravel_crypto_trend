@extends('layouts.contents-template')

@section('title','ニュース画面')

@section('header')
  @parent
  <div class="l-headerlogo"><a href="/mainpage" class="c-atagbtn c-headerlogobtn">Crypto Trend</a></div>
  <nav class="l-nav">
    <div class="menu-trigger js-toggle-sp-menu" id="js-sp-nav-menu">
      <span></span>
      <span></span>
      <span></span>
    </div>
  <nav class="header-nav js-toggle-sp-menu-target" id="js-classtaget">
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
    <div class="footer__siteabout">
      <a href="{{ url('/policy')}}">このサイトについて</a>
    </div>
    <div class="footer__copyright">
      Copyright© <a href="{{ url('/login')}}">kata</a>
    </div>
@endsection