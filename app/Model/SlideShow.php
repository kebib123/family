<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SlideShow extends Model
{
    protected $fillable=[
        'name','image','status','section','link'
    ];
}
