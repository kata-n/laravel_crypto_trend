<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CoincheckApi extends Model
{
  //SQLのテーブル名を指定
  protected $table = 'crypto_details';

  //primaryKeyの変更
  protected $primaryKey = "crypto_id";

  //ツイートは複数なので１対多
  public function tweetcounts(){
    return $this->hasMany('App\Tweetcount');
  }

}
