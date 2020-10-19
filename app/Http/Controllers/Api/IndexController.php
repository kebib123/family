<?php

namespace App\Http\Controllers\Api;

use App\Model\Brand;
use App\Model\Category;
use App\Model\Product;
use App\Model\SlideShow;
use App\Repositories\Contracts\CategoryRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    protected $category;

    public function __construct(CategoryRepository $category)
    {
        $this->category = $category;
    }
    public function home()
    {
        $slide1 = SlideShow::where('status', '=', '1')->where('section', '=', '1')->get();
        $slide2 = SlideShow::where('status', '=', '1')->where('section', '=', '2')->get();
        $slide3 = SlideShow::where('status', '=', '1')->where('section', '=', '3')->get();
        $deals = Product::where('is_special', '=', '1')->get();
        $popular = Product::where('is_popular', '=', 'popular')->where('status', '=', '1')->get();
        $featured = Product::where('is_featured', '=', 'featured')->where('status', '=', '1')->get();
        $brand = Brand::where('status','=','1')->get();
        $categories = $this->category->getCategories();


        return [
            'logo'=>'https://1.bp.blogspot.com/-_nSlo7Y9SWU/WZb5C7z9_pI/AAAAAAAAA20/ET-P9Q6ymtAK_9eXbBe3_oXOz_LySclIgCK4BGAYYCw/s1600/logo-sec%2Bcopy1.png',
            'slideshows' => [
                $slide1,$slide2,$slide3
            ],
            'deal_of_the_day' => ['deals' => [
                $deals
            ]
            ],
            'products' => [
                'popular_products' => [
                    $popular
                ],
                'featured_products' => [
                    $featured
                ],
            ],
            'brand'=>[
                'featured_brand'=>[
                    $brand
                ]
            ],
            'categories'=>[
                $categories
            ]
        ];

    }
}
