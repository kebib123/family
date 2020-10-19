<?php

namespace App\Http\Controllers\Frontend;

use App\Model\Address;
use App\Model\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use PayPal\Api\Amount;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;
use Gloudemans\Shoppingcart\Facades\Cart;

class PaymentController extends FrontendController
{
    private $_api_context;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        /** PayPal api context **/
        $paypal_conf = Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential(
                $paypal_conf['client_id'],
                $paypal_conf['secret'])
        );
        $this->_api_context->setConfig($paypal_conf['settings']);
    }

    public function payWithpaypal(Request $request)

    {
        if ($request->ajax()) {
            if (!Auth::check()) {
                return response()->json(['status' => 'error', 'message' => 'Please login first']);
            }
            if (Cart::content()->isEmpty()) {
                return response()->json(['status' => 'error', 'message' => 'Please add items to your cart']);
            }
            Session::put('firstname',$request->fname);
            Session::put('lastname',$request->lname);
            Session::put('mobile',$request->mobile);
            Session::put('country',$request->country);
            Session::put('city',$request->city);
            Session::put('address',$request->address);
            return response()->json(['redirect' => route('paypal', $request->amount)]);

        }

        $payer = new Payer();
        $payer->setPaymentMethod('paypal');
        $item_1 = new Item();
        $item_1->setName('Item 1')/** item name **/
        ->setCurrency('USD')
            ->setQuantity(1)
            ->setPrice($request->amount);
        /** unit price **/
        $item_list = new ItemList();
        $item_list->setItems(array($item_1));
        $amount = new Amount();
        $amount->setCurrency('USD')
            ->setTotal($request->amount);
        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($item_list)
            ->setDescription('Your transaction description');
        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl(URL::to('status'))/** Specify return URL **/
        ->setCancelUrl(URL::to('status'));
        $payment = new Payment();
        $payment->setIntent('Sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirect_urls)
            ->setTransactions(array($transaction));

        /** dd($payment->create($this->_api_context));exit; **/
        try {
            $payment->create($this->_api_context);
        } catch (\PayPal\Exception\PPConnectionException $ex) {
            if (Config::get('app.debug')) {
                Session::put('error', 'Connection timeout');
                return Redirect::to('/');
            } else {
                Session::put('error', 'Some error occur, sorry for inconvenient');
                return Redirect::to('/');
            }
        }
        foreach ($payment->getLinks() as $link) {
            if ($link->getRel() == 'approval_url') {
                $redirect_url = $link->getHref();
                break;
            }
        }
        /** add payment ID to session **/
        Session::put('paypal_payment_id', $payment->getId());
        if (isset($redirect_url)) {
            /** redirect to paypal **/
            return Redirect::away($redirect_url);
        }
        Session::put('error', 'Unknown error occurred');
        return Redirect::to('/');
    }


    public
    function getPaymentStatus()
    {
        /** Get the payment ID before session clear **/
        $payment_id = Session::get('paypal_payment_id');
        /** clear the session payment ID **/
        Session::forget('paypal_payment_id');
        if (empty(Input::get('PayerID')) || empty(Input::get('token'))) {
            Session::put('error', 'Payment failed');
            return Redirect::to('/');
        }
        $payment = Payment::get($payment_id, $this->_api_context);
        $execution = new PaymentExecution();
        $execution->setPayerId(Input::get('PayerID'));
        /**Execute the payment **/
        $result = $payment->execute($execution, $this->_api_context);
        if ($result->getState() == 'approved') {
               $this->save();
            return \redirect()->route('home')->with('success', 'Payment Succeessful');
        }
        Session::put('error', 'Payment failed');
        return \redirect()->route('home')->with('success', 'Payment Failed');
    }

    public function save()
    {
        $data['first_name'] = Session::get('firstname');
        $data['last_name'] = Session::get('lastname');
        $data['phone'] = Session::get('mobile');
        $data['zone'] = Session::get('country');
        $data['city'] = Session::get('city');
        $data['address'] = Session::get('address');
        $data['status'] = 0;
        $data['payment_method']='Paypal';
        $data['user_id'] = Auth::user()->id;
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
            $data2['user_id'] = Auth::user()->id;
            $cart_item = Order::create($data2);
        }
    }


}
