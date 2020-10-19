<?php

namespace App\Http\Controllers\Backend;

use App\Model\Address;
use App\Model\Extra;
use App\Model\Order;
use App\Model\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class OrderController extends BackendController
{
    public function show_address(Request $request)
    {
        if ($request->isMethod('get')) {
            $add = Address::all();
            $this->data('address', $add);
            $user = User::all();
            $this->data('user', $user);
            $order = Order::all();
            $this->data('order', $order);
            return view($this->backendproductPath . 'show_order', $this->data);
        }
    }

    public function order_details(Request $request)
    {
        $id = $request->id;
        if ($request->isMethod('get')) {
            $add = Address::where('id', '=', $id)->first();
            $this->data('address', $add);
            $charge = Extra::all();
            $this->data('charge', $charge);
            $order = Order::where('address_id', '=', $id)->get();
            $this->data('order', $order);
            return view($this->backendproductPath . 'order_details', $this->data);

        }
    }

    public function show_charge(Request $request)
    {
        if ($request->isMethod('get')) {
            $charge = Extra::all();
            $this->data('charge', $charge);
            return view($this->backendproductPath . 'extra_charge', $this->data);
        }
        if ($request->isMethod('post')) {
            $id = $request->id;
            $data['tax'] = $request->tax;
            $data['shipping_cost'] = $request->shipping_cost;
            $charge = Extra::findorfail($id);
            if ($charge->update($data)) {
                Session::flash('success', 'Charge Updated');
                return redirect()->back();
            }
        }
    }

    public function order_status(Request $request)
    {
        $id = $request->id;
        if ($request->isMethod('post')) {
            $data['status'] = $request->orders_status;
            $status = Address::findorfail($id);
            if ($status->update($data)) {
                Session::flash('success', 'Status updated');
                return redirect()->back();
            }
        }
    }
    public function order_delete($id)
    {
        $delete=Address::findorfail($id);
        if($delete->delete())
        {
            Session::flash('success','Order successfully deleted');
            return redirect()->back();
        }
    }
}
