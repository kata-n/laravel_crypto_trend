<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CoincheckApi extends Model
{
  //SQLのテーブル名を指定
  protected $table = 'crypto_details';

    //belongsTo設定
    public function crypto()
    {
        return $this->belongsTo('App\Tweetcount');
    }
}
