<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GoogleNewsController extends Controller
{
    public function shownews()
    {
       set_time_limit(90);

        //キーワード検索したいときのベースURL
        $API_BASE_URL = "https://news.google.com/news?hl=ja&ned=ja&ie=UTF-8&oe=UTF-8&output=atom&q=";

        //”仮想通貨”文字コード指定
        $query = urlencode(mb_convert_encoding('仮想通貨',"UTF-8", "auto"));

        //APIへのリクエストURL生成
        $api_url = $API_BASE_URL.$query;

        //APIにアクセス、結果をsimplexmlに格納
        $contents = file_get_contents($api_url);
        $xml = simplexml_load_string($contents);

        //記事エントリを取り出す
        $getNewsdata = $xml->entry;

        //記事のタイトルとURLを取り出して配列に格納
        for ($i = 0; $i < count($getNewsdata); $i++) {

            $list[$i]['title'] = mb_convert_encoding($getNewsdata[$i]->title ,"UTF-8", "auto");
            $url_split = $getNewsdata[$i]->link->attributes()->href;
            $list[$i]['url'] = end($url_split);

        }

        //記事数の指定
        $max_num = 20;
        //$max_num以上の記事数の場合は切り捨て
        if(count($list)>$max_num){
            for ($i = 0; $i < $max_num; $i++){
                $google_news_list[$i] = $list{$i};
                $i++;
            }
        }else{
            $google_news_list = $list;
        }

      return response()->json(['results' => $google_news_list]);
//      return view('/news_page/news_page',compact('lists'));
//      return view('/news_page/news_page');
        }
}
