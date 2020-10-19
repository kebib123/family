<?php

namespace App\Model;
use Cviebrock\EloquentSluggable\Sluggable;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use Sluggable;

    public function sluggable() {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
    public function views()
    {
        return $this->morphMany(
            View::class,
            'viewable'
        );
    }

    protected $fillable=['product_name','price','selling_price','discount_percentage','description','color','image','status',
        'is_featured','is_popular','size','brand_id','category_id','is_special'];

    public function getViewsCount()
    {
        return $this->views()->count();
    }

    public function categories()
    {
        return $this->belongsTo('App\Model\Category','category_id');
    }

    public function brands()
    {
        return $this->belongsTo('App\Model\Brand','brand_id');
    }
    public function stocks()
    {
     return $this->hasone('App\Model\Inventory','product_id');
    }

     public function reviews()
     {
         return $this->hasMany('App\Model\Review','product_id');
     }
     public function informations()
     {
         return $this->hasone('App\Model\Information','product_id');
     }
     public function descriptions()
     {
         return $this->hasMany('App\Model\Description','product_id');
     }



}
