<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TwitterUser extends Model
{

    /**
     * Get the user that owns the twitter user.
     */

    public function user()
    {
        return $this->belongsTo('App\User');
    }
        protected $fillable = ['twitter_user_id','email','name',
        'nickname','avatar','token','token_secret',];
}