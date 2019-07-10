<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Relationship extends Eloquent
{
    protected $connection = 'mongodb';
    protected $fillable = ['status'];

    public function user1()
    {
        return $this->hasOne('App\User', '_id', 'user1');
    }

    public function user2()
    {
        return $this->hasOne('App\User', '_id', 'user2');
    }

    public function user_action()
    {
        return $this->hasOne('App\User', '_id', 'action_user');
    }
}
