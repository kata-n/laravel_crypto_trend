@extends('layouts.contents-template')

@section('title','Twitterアカウント画面')

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
      <li><a href="/mainpage">アカウント一覧</a></li>
    </ul>
  </nav>
@endsection

@section('content')
  <section class="l-mainpage">
    <div id="app">
      <accountpage-component></accountpage-component>
    </div>
      <p>Twitterアカウントページです</p>
      <a class="dropdown-item" href="{{ route('logout') }}"
        onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
        {{ __('Logout') }}
      </a>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
      </form>
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