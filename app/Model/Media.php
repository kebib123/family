<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $fillable=[
        'facebook',
        'google',
        'twitter',
        'instagram'
    ];
}
