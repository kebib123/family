<?php

namespace App\Http\Controllers\Frontend;

use App\Model\Address;
use App\Model\Checkout;
use App\Model\Extra;
use App\Model\Order;
use App\Model\Product;
use App\Model\Wishlist;
use function Couchbase\defaultDecoder;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartController extends FrontendController
{
    public function cart_item(Request $request)
    {
        if ($request->isMethod('post')) {
            $rules = [
                'ritem' => 'required',
            ];

            $customMessages = [
                'required' => 'The color field is required.'
            ];

            $this->validate($request, $rules, $customMessages);
            $quantity = $request->quantity;
            $id = $request->id;
            $product = Product::where('id', '=', $id)->first();
            Cart::add([
                'id' => $product->id,
                'name' => $product->product_name,
                'qty' => $quantity,
                'price' => $product->selling_price,
                'options' => ['color' => $request->ritem, 'image' => $product->image, 'description' => $product->description],
            ]);

            $cart_item = Cart::content();

            return redirect()->back()->with('success', 'Added to Cart');
        }

        if ($request->isMethod('get')) {
            $cart_item = Cart::content();
            $charge = Extra::all();
            $sub = Cart::subtotal();
            $total = preg_replace("/[^0-9.]/", "", $sub);
            $final = (int)$total;

            return view($this->frontendPagePath . 'cartpage', compact('cart_item', 'charge', 'final'));
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
            for ($i = 0; $i < count($quantity); $i++) {
                Cart::update($row[$i],$quantity[$i]);
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
        if ($request->isMethod('post')) {
            if (!Auth::check()) {
                return redirect()->back()->with('error','no');
            }

            if (Cart::content()->isnotEmpty()) {
                $id = $request->id;
                $data['first_name'] = $request->fname;
                $data['last_name'] = $request->lname;
                $data['phone'] = $request->phone;
                $data['zone'] = $request->zone;
                $data['city'] = $request->city;
                $data['address'] = $request->address;
                $data['user_id'] = $id;
                $data['status'] = 0;
                $data['payment_method']='Cash on Delivery';
                $order = Address::create($data);
                $address_id = $order->id;
                $cart = Cart::content();
                foreach ($cart as $value) {
                    $data2['product'] = $value->name;
                    $data2['address_id'] = $address_id;
                    $data2['quantity'] = $value->qty;
                    $data2['color'] = $value->options->color;
                    $data2['price'] = $value->price;
                    $data2['image'] = $value->options->image;
                    $data2['user_id'] = $id;
                    $cart_item = Order::create($data2);
                }

                if ($order && $cart_item) {

                    Session::flash('success', 'Order placed successfully');
                    return redirect()->back();
                }
            } else {
                Session::flash('error', 'Please add items to your cart');
                return redirect()->route('home');
            }
        }
    }

    public function show_wishlist(Request $request, $id1, $id2)
    {

        $data['user_id'] = $id1;
        $data['product_id'] = $id2;
        $create = Wishlist::create($data);
        if ($create) {
            Session::flash('success', 'Added to Wishlist');
            return redirect()->back();
        }
    }

    public function delete_wishlist($id)
    {
        $destroy = Wishlist::findorfail($id);
        if ($destroy->delete()) {
            Session::flash('success', 'Item removed from wishlist');
            return redirect()->back();
        }
    }
}


