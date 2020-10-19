<?php

namespace App\Http\Controllers\Frontend;

use App\Model\Extra;
use App\Model\Order;
use App\Model\Product;
use App\Model\Shipping;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ProductController extends FrontendController
{
public function order_details(Request $request)
{
    $id=$request->id;
    $order=Order::where('address_id','=',$id)->get();
    $this->data('orders',$order);
    $charge=Extra::all();
    $this->data('charge',$charge);
    return view($this->frontendPagePath.'order_details',$this->data);
}

public function shipping_address(Request $request)
{

    if($request->isMethod('post'))
    {
        $data['first_name']=$request->fname;
        $data['last_name']=$request->lname;
        $data['mobile']=$request->mobile;
        $data['landline']=$request->landline;
        $data['country']=$request->country;
        $data['city']=$request->city;
        $data['street']=$request->street;
        $data['landmark']=$request->landmark;
        $data['location_type']=$request->location;
        $data['user_id']=Auth::user()->id;
        $create=Shipping::updateorcreate(['user_id'=>Auth::user()->id],$data);
         if($create)
         {
             Session::flash('success','Address Updated');
             return redirect()->back();
         }
    }
}
}
