<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo('App\User', 'created_by', '_id');
    }


    public function getAuthor($_id){
        return User::find($this->created_by)->getFullName();
    }
}
