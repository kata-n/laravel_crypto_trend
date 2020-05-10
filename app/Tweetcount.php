<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tweetcount extends Model
{
  //SQLのテーブル名を指定
  protected $table = 'tweetcount';

    //primaryKeyの変更
    protected $primaryKey = "crypto_id";

    public function tweet()
    {
        return $this->belongsTo('App\Models\CoincheckApi');
    }
}
