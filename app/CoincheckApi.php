<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CoincheckApi extends Model
{
  //SQLのテーブル名を指定
  protected $table = 'crypto_details';

  //ツイートは複数なので１対多
  public function tweetcounts(){
    return $this->hasMany('App\Tweetcount','crypto_id')
      select('tweet_count', \DB::raw('sum(crypto_id)as total_tweet'))->groupBy('tweet_count');
  }

}
