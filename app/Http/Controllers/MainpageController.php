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
}
