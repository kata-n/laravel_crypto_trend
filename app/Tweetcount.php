<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tweetcount extends Model
{
  //SQLのテーブル名を指定
  protected $table = 'tweetcount';

  //primaryKeyの変更
  protected $primaryKey = "crypto_id";

  //ツイートは複数なので１対多
  public function tweetcounts(){
    return $this->hasMany('App\CoincheckApi');
  }

}
