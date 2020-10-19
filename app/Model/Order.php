<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable=['image','product','quantity','color','price','address_id','user_id'];

    public function addresses()
    {
        return $this->belongsTo('App\Model\Address','address_id');
    }
    public function users()
    {
        return $this->belongsTo('App\Model\User','user_id');
    }

}
