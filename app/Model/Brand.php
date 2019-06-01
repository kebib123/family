<?php

namespace App\Model;
use Cviebrock\EloquentSluggable\Sluggable;


use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use Sluggable;

    public function sluggable() {
        return [
            'slug' => [
                'source' => 'brand_name'
            ]
        ];
    }
    protected $fillable=['brand_name','company_name','status','brand_image'];
}
