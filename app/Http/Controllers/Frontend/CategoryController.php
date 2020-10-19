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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CategoryController extends FrontendController
{
    public function show_category(Request $request)
    {
        $id = $request->id;
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
                    $abc = $pro->where('products.size', 'LIKE', '%' . $size . '%');
            }
            if ($request->has('max_price')) {
                $max_price = (int)$request->max_price;
                $pro->whereBetween('products.selling_price', [100, $max_price]);
            }
            if ($request->has('value')) {
                if ($request->value == 'new') {
                    $pro->orderby('products.created_at', 'desc');
                }
                if ($request->value == 'price') {
                    $pro->orderby('products.selling_price', 'asc');
                }
                if ($request->value == 'popular') {
                    $pro->where('products.is_popular', '=', 'popular');
                }
            }


            $filter = $pro->get();
//            dd($filter);
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
        $description = Description::where('product_id', '=', $id)->get();
        $information = Information::where('product_id', '=', $id)->pluck('information');
        $review = Review::where('product_id', '=', $id)->get();
        $fivestar = Review::where('product_id', '=', $id)->where('star', '=', 5)->get();
        $fourstar = Review::where('product_id', '=', $id)->where('star', '=', 4)->get();
        $threestar = Review::where('product_id', '=', $id)->where('star', '=', 3)->get();
        $twostar = Review::where('product_id', '=', $id)->where('star', '=', 2)->get();
        $onestar = Review::where('product_id', '=', $id)->where('star', '=', 1)->get();
        if ($review->isNotEmpty()) {
            $total = 5 * count($fivestar) + 4 * count($fourstar) + 3 * count($threestar) + 2 * count($twostar) + 1 * count($onestar);
            $total_review = count($fivestar) + count($fourstar) + count($threestar) + count($twostar) + count($onestar);
            $average = $total / $total_review;
        }
        return view($this->frontendPagePath . 'singlepage', compact('show', 'colour', 'description', 'information', 'review', 'fivestar', 'fourstar', 'threestar', 'twostar', 'onestar', 'average'));
    }

    public function show_featured(Request $request)
    {
        $pro = Product::where('is_featured', '=', 'featured');

        if ($request->ajax()) {
            if ($request->has('brand')) {
                $brand = $request->brand;
                $pro->join('brands', 'brands.id', '=', 'products.brand_id')->whereIn('brands.brand_name', $brand);
            }
            if ($request->has('price')) {
                $max_price = (int)$request->price;
                $pro->whereBetween('products.selling_price', [100, $max_price]);
            }
            if ($request->has('size')) {
                $size = implode(',', $request->size);
                $abc = $pro->where('products.size', 'LIKE', '%' . $size . '%');
            }
            if ($request->has('value')) {
                if ($request->value == 'new') {
                    $pro->orderby('products.created_at', 'desc');
                }
                if ($request->value == 'price') {
                    $pro->orderby('products.selling_price', 'asc');
                }
                if ($request->value == 'popular') {
                    $pro->where('products.is_popular', '=', 'popular');
                }
            }
            $filter = $pro->get();
            $this->data('filter', $filter);
            return view($this->frontendPagePath . 'category.filtered_featured', $this->data);
        }

        $pro = Product::where('is_featured', '=', 'featured')->get();
        $abc = Category::where('parent_id', '=', 0)->first();
        return view($this->frontendPagePath . 'featured', compact('pro', 'abc'));
    }

    public function featured_brand(Request $request)
    {
        $id = $request->id;

        $brand_id = Brand::where('id', '=', $id)->pluck('id')->first();

        $pro = Product::where('brand_id', '=', $brand_id);

        if ($request->ajax()) {

            if ($request->has('price')) {
                $max_price = (int)$request->price;
                $pro->whereBetween('products.selling_price', [100, $max_price]);
            }
            if ($request->has('size')) {
                $size = implode(',', $request->size);
                $abc = $pro->where('products.size', 'LIKE', '%' . $size . '%');
            }
            if ($request->has('value')) {
                if ($request->value == 'new') {
                    $pro->orderby('products.created_at', 'desc');
                }
                if ($request->value == 'price') {
                    $pro->orderby('products.selling_price', 'asc');
                }
                if ($request->value == 'popular') {
                    $pro->where('products.is_popular', '=', 'popular');
                }
            }
            $filter = $pro->get();
            $this->data('filter', $filter);
            return view($this->frontendPagePath . 'category.filtered_brand', $this->data);
        }
        $id = $request->id;
        $cat_list = Category::where('parent_id', '=', $id)->get();
        $brand = Brand::where('id', '=', $id)->pluck('brand_name')->first();
        $brand_id = Brand::where('id', '=', $id)->pluck('id')->first();
        $pro = Product::where('brand_id', '=', $brand_id)->get();
        $products = Product::wherenotNull('brand_id')->get();
        return view($this->frontendPagePath . 'featuredbrand', compact('brand', 'cat_list', 'pro'));

    }

    public function search_results(Request $request)
    {
        if (!$request->search)
        {
            return redirect()->back()->with('error', 'Search field is empty');
        }
        $query = $request->search;
        $result = explode('', $query);
        $pro = Product::where(function ($query) use ($result) {
            foreach ($result as $search) {
                $query->where('products.product_name', 'like', '%' . $search . '%');
            }
        });

        if ($request->ajax()) {
            if ($request->has('brand')) {
                $brand = $request->brand;
                $pro->join('brands', 'brands.id', '=', 'products.brand_id')->whereIn('brands.brand_name', $brand);
            }
            if ($request->has('max_price')) {
                $max_price = (int)$request->max_price;
                $pro->whereBetween('products.selling_price', [100, $max_price]);
            }
            if ($request->has('size')) {
                $size = implode(',', $request->size);
                $abc = $pro->where('products.size', 'LIKE', '%' . $size . '%');
            }
            if ($request->has('value')) {
                if ($request->value == 'new') {
                    $pro->orderby('products.created_at', 'desc');
                }
                if ($request->value == 'price') {
                    $pro->orderby('products.selling_price', 'asc');
                }
                if ($request->value == 'popular') {
                    $pro->where('products.is_popular', '=', 'popular');
                }
            }
            $filter = $pro->get();
            $this->data('filter', $filter);
            return view($this->frontendPagePath . 'category.filtered_search', $this->data);
        }

        $query = $request->search;
        $result = explode(' ', $query);
            $pro = Product::where(function ($query) use ($result) {
                foreach ($result as $search) {
                    $query->where('products.product_name', 'like', '%' . $search . '%');
                }
            });
//        $pro->join('brands', 'brands.id', '=', 'products.brand_id')->orwhere('brands.brand_name', 'like', '%' . $query . '%');
            $pro = $pro->get();
            $cat_list = Category::where('parent_id', '=', 0)->get();
            $brand = Brand::all();
            return view($this->frontendPagePath . 'category.searchable', compact('cat_list', 'brand', 'pro'));
    }

}
