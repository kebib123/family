<?php

namespace App\Model;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use Sluggable;

    public function sluggable() {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    protected $fillable = [
        'parent_id',
        'name',
        'slug'
    ];

    public function products()
    {
        return $this->hasMany('App\Model\Product','category_id');
    }

}
