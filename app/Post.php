<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Post extends Eloquent
{
    protected $connection = 'mongodb';
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo('App\User', 'created_by', '_id');
    }


    public function getAuthor($_id){
        return User::find($this->created_by)->getFullName();
    }
}
