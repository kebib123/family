<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable=['first_name','last_name','phone','zone','city','address','user_id','status','payment_method'];

    public function users()
    {
        return $this->belongsTo('App\Model\User','user_id');
    }
    public function orders()
    {
        return $this->hasMany('App\Model\Order','address_id');

    }

}
