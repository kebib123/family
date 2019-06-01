<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ContactForm extends Model
{
    protected $fillable=['message','name','email'];
}
