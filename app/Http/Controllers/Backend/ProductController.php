<?php

namespace App\Http\Controllers\Backend;

use App\Model\Checkout;
use App\Model\Description;
use App\Model\Information;
use App\Model\Product;
use App\Model\Review;
use App\Repositories\Contracts\ProductRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Repositories\Contracts\BrandRepository;

class ProductController extends BackendController
{
    private $brand;

    private $product;

    public  function __construct(ProductRepository $product,BrandRepository $brand)
    {
        parent::__construct();
        $this->product=$product;
        $this->brand=$brand;
    }

    public function add_product(Request $request)
    {
        if($request->isMethod('get'))
        {
            $brand = $this->brand->show();
            $this->data('brand',$brand);
            $pro=Product::all();
           $this->data('product',$pro);
            $this->data('title', $this->setTitle('Product'));
            return view($this->backendproductPath . 'add_product', $this->data);
        }

        if($request->isMethod('post'))
        {
            $add=$this->product->manage_product($request);
            if($add)
            {
                return redirect()->back();
            }
        }
        return false;
    }

    public function show_product(Request $request)
    {
       if($request->isMethod('get'))
       {
           $pro=Product::all();
           $this->data('product',$pro);
           $this->data('title', $this->setTitle('Product'));
           return view($this->backendproductPath . 'show_product', $this->data);
       }
    }

    public function show_review(Request $request)
    {
        if($request->isMethod('get'))
        {
            $rev=Review::all();
            $this->data('review',$rev);
            $this->data('title', $this->setTitle('Product Review'));
            return view($this->backendproductPath . 'show_review', $this->data);
        }
        if($request->isMethod('post'))
        {
            $data['name']=$request->name;
            $data['email']=$request->email;
            $data['star']=$request->rating;
            $data['comment']=$request->comment;
            $data['product_id']=$request->id;


            if(Review::create($data))
            {
                Session::flash('success','Review posted');
                return redirect()->back();
            }
        }

    }
    public function show_order(Request $request)
    {
        if($request->isMethod('get'))
        {
            $order=Checkout::all();
            $this->data('order',$order);
            return view($this->backendproductPath.'show_order',$this->data);
        }
    }

}
