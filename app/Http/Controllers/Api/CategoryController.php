<?php

namespace App\Http\Controllers\Api;

use App\Model\Category;
use App\Model\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function show_category($id)
    {
        $cat_list = Category::where('parent_id', '=', $id)->get();
        $cat_id = Category::where('parent_id', '=', $id)->pluck('id')->toArray();
        $pro = Product::where('category_id', '=', $id)->orwhereIn('category_id', $cat_id)->get();

        return[
            $pro
        ];
    }

}
