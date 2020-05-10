<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tweetcount extends Model
{
  //SQLのテーブル名を指定
  protected $table = 'tweetcount';

    //belongsTo設定
    public function crypto()
    {
        return $this->belongsTo('App\CoincheckApi','crypto_id');
    }


}
