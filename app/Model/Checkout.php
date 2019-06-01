<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    protected $fillable=['first_name','last_name','phone','zone','city','address'];
}
