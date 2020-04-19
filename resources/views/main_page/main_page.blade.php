@extends('layouts.contents-template')

@section('title','メイン画面')

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
    </ul>
  </nav>
@endsection

@section('content')
  <section class="l-mainpage">
    <div id="app">
      <mainpage-component></mainpage-component>
    </div>
      <p>メインページです</p>
      <a class="dropdown-item" href="{{ route('logout') }}"
        onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
        {{ __('Logout') }}
      </a>

<!--
        @foreach ($result as $tweet)
            <div class="card mb-2">
                <div class="card-body">
                    <div class="media">
                        <div class="media-body">
                            <h5 class="d-inline mr-3"><strong>{{ $tweet->user->name }}</strong></h5>
                            <h6 class="d-inline text-secondary">{{ date('Y/m/d', strtotime($tweet->created_at)) }}</h6>
                            <p class="mt-3 mb-0">{{ $tweet->text }}</p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
-->

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