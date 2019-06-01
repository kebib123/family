<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'product_id',
        'name',
        'email',
        'star',
        'comment',
        'status'
    ];
    public function products()
    {
        return $this->belongsTo('App\Model\Product','product_id');
    }
}
