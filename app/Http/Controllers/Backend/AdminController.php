<?php

namespace App\Http\Controllers\Backend;

use App\Model\Address;
use App\Model\Order;
use App\Model\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminController extends BackendController
{
    public function index()
    {
        $pro = Product::orderBy('created_at','desc')->get();
        $this->data('product', $pro);
        $pending=Address::where('status','=',0)->get();
        $this->data('pending',$pending);
        $completed=Address::where('status','=',1)->get();
        $this->data('completed',$completed);
        $cancel=Address::where('status','=',2)->get();
        $this->data('cancel',$cancel);
        $return=Address::where('status','=',3)->get();
        $this->data('return',$return);
        $order = Order::orderBy('created_at','desc')->get();
        $this->data('order', $order);
        return view($this->backendPagePath.'index',$this->data);
    }


    public function logout(Request $request)
    {
        Auth::logout();

        return redirect()->intended(route('signin'));
    }
}
