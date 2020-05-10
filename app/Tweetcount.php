<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tweetcount extends Model
{
  //SQLのテーブル名を指定
  protected $table = 'tweetcount';

    public function tweet()
    {
        return $this->belongsTo('App\Models\CoincheckApi');
    }
}
