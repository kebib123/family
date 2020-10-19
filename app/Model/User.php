<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Auth;

class User extends Auth
{
    protected $fillable=['roles','name','email','phone','password','facebook_id'];

    public function addresses()
    {
        return $this->hasMany('App\Model\Address','user_id');
    }
    public function defaultadd()
    {
        return $this->hasOne('App\Model\Shipping','user_id');
    }
    public function verifyUser()
    {
        return $this->hasOne('App\Model\VerifyUser','user_id');
    }

}
