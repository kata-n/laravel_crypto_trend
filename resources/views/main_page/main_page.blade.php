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
      <li><a href="#about-keigen" id="toAbout" class="js-toggle-sp-menu">軽減税率のフシギ</a></li>
      <li><a href="#book" id="toBook" class="js-toggle-sp-menu">本</a></li>
      <li><a href="#imformation" id="toImformation" class="js-toggle-sp-menu">お知らせ</a></li>
      <li><a href="/policy" class="js-toggle-sp-menu">このサイトについて</a></li>
    </ul>
  </nav>
@endsection

@section('content')
  <section class="l-mainpage">
      <p>メインページです</p>
      <a class="dropdown-item" href="{{ route('logout') }}"
        onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
        {{ __('Logout') }}
      </a>

        @foreach ($result as $tweet)
            <div class="card mb-2">
                <div class="card-body">
                    <div class="media">
                        <img src="https://placehold.jp/70x70.png" class="rounded-circle mr-4">
                        <div class="media-body">
                            <h5 class="d-inline mr-3"><strong>{{ $tweet->user->name }}</strong></h5>
                            <h6 class="d-inline text-secondary">{{ date('Y/m/d', strtotime($tweet->created_at)) }}</h6>
                            <p class="mt-3 mb-0">{{ $tweet->text }}</p>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-white border-top-0">
                    <div class="d-flex flex-row justify-content-end">
                        <div class="mr-5"><i class="far fa-comment text-secondary"></i></div>
                        <div class="mr-5"><i class="fas fa-retweet text-secondary"></i></div>
                        <div class="mr-5"><i class="far fa-heart text-secondary"></i></div>
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