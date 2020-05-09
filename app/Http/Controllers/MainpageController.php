<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainpageController extends Controller
{
  //認証を行う
  public function __construct(){
    $this->middleware('auth');
  }
  //メインページへ
  public function index(){
    return view('main_page/main_page');
  }

  //Twitterアカウント一覧ページへ
  public function accountlist(){
    return view('main_page/twitter_account_page');
  }

  //GoogleNews一覧表示ページへ
  public function shownews(){
    return view('news_page/news_page');
  }
}
