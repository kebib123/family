<?php

namespace App\Http\Controllers\Backend;

use App\Model\Address;
use App\Model\Checkout;
use App\Model\Deal;
use App\Model\Description;
use App\Model\Extra;
use App\Model\Information;
use App\Model\Inventory;
use App\Model\Order;
use App\Model\Product;
use App\Model\Review;
use App\Model\User;
use App\Repositories\Contracts\ProductRepository;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Repositories\Contracts\BrandRepository;

class ProductController extends BackendController
{
    private $brand;

    private $product;

    public function __construct(ProductRepository $product, BrandRepository $brand)
    {
        parent::__construct();
        $this->product = $product;
        $this->brand = $brand;
    }

    public function add_product(Request $request)
    {
        if ($request->isMethod('get')) {
            $brand = $this->brand->show();
            $this->data('brand', $brand);
            $pro = Product::all();
            $this->data('product', $pro);
            $this->data('title', $this->setTitle('Product'));
            return view($this->backendproductPath . 'add_product', $this->data);
        }

        if ($request->isMethod('post')) {
            $add = $this->product->manage_product($request);
            if ($add) {
                return redirect()->back();
            }
        }
        return false;
    }

    public function show_product(Request $request)
    {
        if ($request->isMethod('get')) {
            $pro = Product::all();
            $this->data('product', $pro);
            $this->data('title', $this->setTitle('Product'));
            return view($this->backendproductPath . 'show_product', $this->data);
        }
    }

    public function deal_products(Request $request)
    {
        if ($request->isMethod('get')) {
            $pro = Product::where('is_special','=',1)->get();
            $this->data('product', $pro);
            $this->data('title', $this->setTitle('Product'));
            return view($this->backendproductPath . 'deal_products', $this->data);
        }
        if ($request->isMethod('post'))
        {
            $data['date']=$request->date;
            if(Deal::updateorcreate(['id'=>'1'],$data))
            {
                Session::flash('success','Deal date updated');
                return redirect()->back();
            }
        }
    }

    public function show_review(Request $request)
    {
        if ($request->isMethod('get')) {
            $rev = Review::all();
            $this->data('review', $rev);
            $this->data('title', $this->setTitle('Product Review'));
            return view($this->backendproductPath . 'show_review', $this->data);
        }
        if (Auth::check()) {
            if ($request->isMethod('post')) {
                $data['name'] = $request->name;
                $data['email'] = $request->email;
                $data['star'] = $request->rating;
                $data['comment'] = $request->comment;
                $data['product_id'] = $request->id;


                if (Review::create($data)) {
                    Session::flash('success', 'Review posted');
                    return redirect()->back();
                }
            }
        } else {
            return redirect()->route('signin');
        }

    }

    public function delete_product(Request $request)
    {
        $id = $request->id;
        $clear = Product::findorfail($id);
        if ($this->delete_file($id) && $clear->delete()) {
            Session::flash('success', 'Product deleted');
            return redirect()->back();
        }
    }

    public function delete_file($id)
    {
        $findData = Product::findorfail($id);
        $fileName = $findData->image;
        $deletePath = public_path('images/products/' . $fileName);
        if (file_exists($deletePath) && is_file($deletePath)) {
            unlink($deletePath);
        }
        return true;
    }

    public function deal_status(Request $request)
    {
        $id = $request->deal;

        $deal = Product::findorfail($id);

        if (isset($_POST['active'])) {
            $deal->is_special = 0;
        }
        if (isset($_POST['inactive'])) {
            $deal->is_special = 1;
        }
        $save = $deal->update();
        if ($save) {
            Session::flash('success', 'Status updated');
            return redirect()->back();
        }
    }

    public function edit_product(Request $request)
    {
        if ($request->isMethod('get')) {
            $id = $request->id;
            $product = Product::findorfail($id);
            $this->data('product', $product);
            $this->data('title', $this->setTitle('Product'));
            return view($this->backendproductPath . 'edit_product', $this->data);

        }
        if ($request->isMethod('post')) {
            $id = $request->pro;
            if ($request->hasFile('image')) {
                $this->delete_file($id);
                $image = $request->file('image');
                $name = time() . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('/images/products/');
                $image->move($destinationPath, $name);
                $data['image'] = $name;
            }

            $data['product_name'] = $request->product_name;
            $data['price'] = $request->price;
            $data['selling_price'] = $request->selling_price;
            $data['discount_percentage'] = $request->discount_percentage;
            $data['description'] = $request->description;
            $color = implode(',', $request->color);
            $data['color'] = $color;

            $data['status'] = $request->status;
            $data['is_featured'] = $request->is_featured;
            $data['is_popular'] = $request->is_popular;
            $size = implode(',', $request->size);
            $data['size'] = $size;
            $data['brand_id'] = $request->brand;
            $data['category_id'] = $request->category;
            $data['is_special'] = $request->isSpecial;
            $create = Product::findorfail($id);
            $update = $create->updateorcreate(['id' => $id], $data);
            $lastid = $update->id;

            $data2['information'] = $request->information;
            $data2['product_id'] = $lastid;
            $info = Information::findorfail($id);
            $info_update = $info->updateorcreate(['product_id' => $id], $data2);

            $data3['sku'] = $request->sku;
            $data3['quantity'] = $request->stock_qty;
            $data3['stock_availability'] = $request->stock;
            $data3['product_id'] = $lastid;
            $stock = Inventory::findorfail($id);
            $stock_update = $stock->updateorcreate(['product_id' => $id], $data3);

            $title = $request->specification['title'];
            $detail = $request->specification['detail'];
            $arraytitlekeys = array_keys($title);
            dd($title);
            foreach ($arraytitlekeys as $value) {
                $ProductSpec = Description::updateorcreate
                (['product_id' => $lastid, 'id' => $value], ['title' => $title[$value] != null ? $title[$value] : '', 'description' => $detail[$value] != null ? $detail[$value] : '']);
            }

            Session::flash('success', 'Product Updated');
            return redirect()->back();
        }
    }

    public function delete_specification($id)
    {
        $del = Description::findorfail($id);
        if ($del->delete()) {
            Session::flash('success', 'deleted successfully');
            return redirect()->back();
        }
    }
}
