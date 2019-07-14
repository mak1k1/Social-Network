<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', '_id');
    }


    public function getAuthor(){
        return User::find($this->user_id)->getFullName();
    }
}
