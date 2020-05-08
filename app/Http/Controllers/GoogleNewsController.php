<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GoogleNewsController extends Controller
{
    public function shownews()
    {
       set_time_limit(90);

        //キーワード検索したいときのベースURL
        $API_BASE_URL = "https://news.google.com/news?hl=ja&ned=us&ie=UTF-8&oe=UTF-8&output=atom&q=";

        //”仮想通貨”文字コード指定
        $query = urlencode(mb_convert_encoding("仮想通貨","UTF-8", "auto"));

        //APIへのリクエストURL生成
        $api_url = $API_BASE_URL.$query;

        //APIにアクセス、結果をsimplexmlに格納
        $contents = file_get_contents($api_url);

      return response()->json(['results' => $contents]);
//      return view('/news_page/news_page',compact('lists'));
//      return view('/news_page/news_page');
        }
}
