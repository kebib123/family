<?php

namespace App\Http\Controllers\Frontend;

use App\Model\Checkout;
use App\Model\Product;
use function Couchbase\defaultDecoder;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class CartController extends FrontendController
{
    public function cart_item(Request $request)
    {
        if ($request->isMethod('post')) {

            $quantity = $request->quantity;
            $id = $request->id;
            $product = Product::where('id', '=', $id)->first();
            Cart::add([
                'id' => $product->id,
                'name' => $product->product_name,
                'qty' => $quantity,
                'price' => $product->selling_price,
                'options' => ['color' => $product->color, 'image' => $product->image, 'description' => $product->description],
            ]);


            $cart_item = Cart::content();

            return redirect()->back()->with('success', 'Added to Cart');
        }
        if ($request->isMethod('get')) {
            $cart_item = Cart::content();

            return view($this->frontendPagePath . 'cartpage', compact('cart_item'));
        }
    }

    public function cart_destroy(Request $request, $id2)
    {
        if ($request->isMethod('get')) {
            $rowId = $id2;
            $destroy = Cart::remove($rowId);
            return redirect()->back()->with('success', 'Item removed successfully from cart');
        }
    }

    public function update_cart(Request $request)
    {
        $row = $request->row;
        $quantity = $request->quantity;


//        foreach ($row as $value) {
//            foreach ($quantity as $value2) {
//                $array[] = [$value, $value2];
//
//            }
//
//        }
        foreach ($row as $value) {
            foreach ($quantity as $value2) {
               dd( Cart::update($value, $value2));
            }

        }

        return back()->with('success', 'Cart updated');
    }

    public function delete_cart()
    {
        $clear = Cart::destroy();
        return back()->with('success', 'Cart cleared successfully');
    }
    public function checkout_order(Request $request)
    {
        if ($request->isMethod('post'))
        {
            $data['first_name']=$request->fname;
            $data['last_name']=$request->lname;
            $data['phone']=$request->phone;
            $data['zone']=$request->zone;
            $data['city']=$request->city;
            $data['address']=$request->address;
            if(Checkout::create($data))
            {
                Session::flash('success','Order placed successfully');
                return redirect()->back();
            }
        }
    }

}
