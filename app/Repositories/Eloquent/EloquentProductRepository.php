<?php

namespace App\Repositories\Eloquent;

use App\Mail\ProductMail;
use App\Model\Inventory;
use App\Model\Product;
use App\Model\Subscriber;
use App\Repositories\Contracts\ProductRepository;
use App\Model\Description;
use App\Model\Information;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

use Kurt\Repoist\Repositories\Eloquent\AbstractRepository;

class EloquentProductRepository extends AbstractRepository implements ProductRepository
{
    private $model;

    public function __construct(Product $model)
    {
        parent::__construct();
        $this->model = $model;
    }

    public function entity()
    {
        return Product::class;
    }

    public function manage_product($request)
    {
        $request->validate([
            'product_name' => 'required',
            'price' => 'required',
            'selling_price' => 'required',
            'discount_percentage' => 'required',
            'description' => 'required',
            'color' => 'required',
            'image' => 'required',
            'information' => 'required',
            'status' => 'required',
            'is_featured' => 'required',
            'is_popular' => 'required',
            'category' => 'required',
            'title' => 'required',
            'description1' => 'required',
            'isSpecial' => 'required',

        ]);
        if ($request->hasFile('image')) {
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
        $product = Product::create($data);
        $product_id = $product->id;

        $desc = $request->description1;
        $title = $request->title;
        $total = count($desc);
        $increment = 0;

        foreach ($desc as $value) {
            $data2['product_id'] = $product_id;
            $data2['description'] = $value;
            foreach ($title as $value1) {
                $data2['title'] = $value1;

            }
            $insert = Description::create($data2);
            if ($insert) {
                $increment++;
            }
        }
        $data3['information'] = $request->information;
        $data3['product_id'] = $product_id;
        $create = Information::create($data3);

        $data4['sku'] = $request->sku;
        $data4['quantity'] = $request->stock_qty;
        $data4['stock_availability'] = $request->stock;
        $data4['product_id'] = $product_id;
        $stock = Inventory::create($data4);

        if ($product && $insert && $create && $stock) {
            $subscriber = Subscriber::all();
            if (!$subscriber->isEmpty()) {
                Mail::send(new \App\Mail\Subscriber());

            }
            Session::flash('success', 'Product added');
            return redirect()->back();
        }
    }
}
