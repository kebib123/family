<?php

namespace App\Http\Controllers\Frontend;

use App\Model\Brand;
use App\Model\Category;
use App\Model\Description;
use App\Model\Information;
use App\Model\Product;
use App\Model\Review;
use function Couchbase\defaultDecoder;
use Gloudemans\Shoppingcart\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class CategoryController extends FrontendController
{
    public function show_category(Request $request)
    {
        $id=$request->id;
        if ($request->ajax()) {

            $array[] = (int)$id;
            $cat_id = Category::where('parent_id', '=', $id)->pluck('id')->toArray();
            $var = array_merge($cat_id, $array);

            $pro = Product::whereIn('category_id', $var);

            if ($request->has('brand')) {
                $brand = $request->brand;
                $pro->join('brands', 'brands.id', '=', 'products.brand_id')->whereIn('brands.brand_name', $brand);
            }
            if ($request->has('size')) {
                $size = implode(',', $request->size);
                $pro->where('size', 'LIKE', '%' . $size . '%')->get();
            }
            if($request->has('newprod'))
            {
               $pro->orderby('products.created_at','desc');
            }
            if ($request->has('max_price')) {

                 $pro->whereBetween('products.selling_price', [[100], [$request->max_price]]);
            }

            $filter = $pro->get();
            dd($filter);
            $this->data('filter', $filter);
            return view($this->frontendPagePath . 'category.filtered', $this->data);
        }
        $cat_list = Category::where('parent_id', '=', $id)->get();
        $cat_id = Category::where('parent_id', '=', $id)->pluck('id')->toArray();
        $abc = Category::where('id', '=', $id)->first();
        $cats = Category::where('id', '=', $id)->pluck('parent_id');
        $cat_name = Category::whereIn('id', $cats)->pluck('name');

        $pro = Product::where('category_id', '=', $id)->orwhereIn('category_id', $cat_id)->get();

        return view($this->frontendPagePath . 'category', compact('cat_list', 'cat_name', 'abc', 'pro'));

    }

    public function show_product(Request $request)
    {
        $id = $request->id;
        $show = Product::where('id', '=', $id)->first();
        $color = $show->color;
        $colour = explode(',', $color);
        $description=Description::where('product_id','=',$id)->pluck('description');
        $information=Information::where('product_id','=',$id)->pluck('information');
        $review=Review::where('product_id','=',$id)->get();
        return view($this->frontendPagePath . 'singlepage', compact('show', 'colour','description','information','review'));
    }
    public  function show_featured(Request $request)
    {

        if($request->ajax())
        {
            $pro = Product::where('is_featured','=','featured')->get();
            dd($pro);
            if ($request->has('brand')) {
                $brand = $request->brand;
                $pro->join('brands', 'brands.id', '=', 'products.brand_id')->whereIn('brands.brand_name', $brand);
            }
            $filter = $pro->get();
            dd($filter);
            $this->data('filter', $filter);
            return view($this->frontendPagePath . 'category.filtered_featured', $this->data);
        }
           $id=$request->id;
        $cat_list = Category::where('parent_id', '=', $id)->get();
        $pro = Product::where('is_featured','=','featured')->get();
        return view($this->frontendPagePath.'featured',compact('cat_list', 'pro'));
    }

    public function featured_brand(Request $request)
    {
        $id=$request->id;
        $cat_list = Category::where('parent_id', '=', $id)->get();
        $brand=Brand::where('id','=',$id)->pluck('brand_name')->first();
        $brand_id=Brand::where('id','=',$id)->pluck('id')->first();
        $pro=Product::where('brand_id','=',$brand_id)->get();
        $products=Product::wherenotNull('brand_id')->get();
        return view($this->frontendPagePath.'featuredbrand',compact('brand','cat_list','pro'));

    }
}
