<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class VerifyUser extends Model
{
    protected $guarded = [];

    public function users()
    {
        return $this->belongsTo('App\Model\User', 'user_id');
    }
}
