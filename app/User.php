<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Carbon\Carbon;
use App\Relationship;
use Hootlex\Friendships\Traits\Friendable;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Notifiable;
    use AuthenticableTrait;
    use CanResetPassword;
    use Friendable;


    protected $fillable = [
        'first_name', 'last_name', 'birth_date', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function posts()
    {
        return $this->hasMany('App\Post','id');
    }

    public function getFullName(){
        return $this->first_name . " " . $this->last_name;
    }

    public function getAge(){
        return Carbon::parse($this->birth_date)->age;
    }

}