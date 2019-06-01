<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    protected $fillable=['product_id','sku','quantity','stock_availability'];

}
