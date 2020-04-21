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
        @foreach ($result as $tweet)
            <div class="card mb-2">
                <div class="card-body">
                    <div class="media">
                        <div class="media-body">
                            <h4>{{ $tweet->user->name }}</h4>
                            <h5>{{ $tweet->user->screen_name }}</h5>
                            <h5>{{ $tweet->user->description }}</h5>
                            <p>フォロワー数：{{ $tweet->user->followers_count }}</p>
                            <p>フォロー数：{{ $tweet->user->friends_count }}</p>
                            <p class="mt-3 mb-0">{{ $tweet->text }}</p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
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