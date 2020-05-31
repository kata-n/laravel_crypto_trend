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
    <div class="p-footerabout">
      Copyright kata. AlL Rights Reserved.
    </div>
    <div class="p-footername">
      My Twitter Account: <a href="{{ url('https://twitter.com/denknit')}}" target="_blank">kata</a>
    </div>
@endsection