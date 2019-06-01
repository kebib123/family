<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Description extends Model
{
    protected $fillable=['product_id','title','description'];
}
