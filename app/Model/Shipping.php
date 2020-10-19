<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    protected $fillable=['first_name','last_name','mobile','landline','country','city','street','landmark','location_type','user_id'];
}
