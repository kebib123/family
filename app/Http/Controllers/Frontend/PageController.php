<?php

namespace App\Http\Controllers\Frontend;

use App\Model\About;
use App\Model\Address;
use App\Model\Brand;
use App\Model\Category;
use App\Model\Extra;
use App\Model\Order;
use App\Model\Product;
use App\Model\Review;
use App\Model\SlideShow;
use App\Model\User;
use App\Model\Wishlist;
use App\Repositories\Contracts\CategoryRepository;
use Cartalyst\Sentinel\Laravel\Facades\Reminder;
use Cartalyst\Sentinel\Native\Facades\Sentinel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\VarDumper\Dumper\DataDumperInterface;
use Gloudemans\Shoppingcart\Facades\Cart;

class PageController extends FrontendController
{
    private $model;

    public function __construct(CategoryRepository $model)
    {
        parent::__construct();

        $this->model = $model;


    }

    public function signin(Request $request)
    {
        if ($request->isMethod('get')) {
            return view($this->frontendPagePath . 'loginpage');
        }
        if ($request->isMethod('post')) {
            $request->validate([
                'email' => 'required',
                'password' => 'required'
            ]);
            $email = $request->email;
            $password = $request->password;

            $remember = isset($request->remember_me) ? true : false;
            if (Auth::attempt(['email' => $email, 'password' => $password], $remember)) {
                if (Auth::user()->verified == '1' && Auth::user()->roles == 'user') {
                    return redirect()->route('home')->with('success', 'Logged in');
                }
                if (Auth::user()->verified == '1' && Auth::user()->roles == 'admin')  {
                    return redirect()->route('index')->with('success', 'Welcome to Dashboard');
                }

                if (Auth::user()->verified == '0') {
                    Auth::logout();
                    return redirect()->back()->with('error', 'Please verify first');
                }
            } else {
                return back()->with('error', 'Please register first');
            }
        }

    }


    public
    function index()
    {
        $products = Product::where('is_popular', '=', 'popular')->where('status','=','1')->pluck('category_id')->toArray();
        $catpo = Category::whereIn('id', $products)->get();
        $popular = Product::where('is_popular', '=', 'popular')->where('status','=','1')->get();
        $featured = Product::where('is_featured', '=', 'featured')->where('status','=','1')->get();
        $brand = Brand::where('status','=','1')->get();
        $slide1 = SlideShow::where('status', '=', '1')->where('section', '=', '1')->get();
        $slide2 = SlideShow::where('status', '=', '1')->where('section', '=', '2')->get();
        $slide3 = SlideShow::where('status', '=', '1')->where('section', '=', '3')->get();
        $deals = Product::where('is_special', '=', '1')->get();

        return view($this->frontendPagePath . 'index', compact('featured', 'catpo', 'popular', 'brand', 'slide1', 'slide2', 'slide3', 'deals'));
    }


    public
    function about()
    {
        $abt = About::all();
        $this->data('about', $abt);
        return view($this->frontendPagePath . 'aboutpage');
    }

    public
    function all_category()
    {
        return view($this->frontendPagePath . 'allcategory');
    }

    public
    function cart(Request $request)
    {
        $id = $request->id;
        $show = Cart::where('id', '=', $id)->first();
        return view($this->frontendPagePath . 'cartpage');
    }

    public
    function category()
    {
        return view($this->frontendPagePath . 'category');
    }

    public
    function checkout()
    {
        $cart_item = Cart::content();
        $charge = Extra::all();

        return view($this->frontendPagePath . 'checkoutpage', compact('cart_item', 'charge'));
    }

    public
    function contact()
    {
        return view($this->frontendPagePath . 'contactpage');
    }

    public
    function faq()
    {
        return view($this->frontendPagePath . 'faqpage');
    }

    public
    function product_request()
    {
        return view($this->frontendPagePath . 'productrequest');
    }

    public
    function register()
    {
        return view($this->frontendPagePath . 'registerpage');
    }

    public
    function single_page()
    {
        return view($this->frontendPagePath . 'singlepage');
    }

    public
    function account_page()
    {

        $order = Address::where('user_id', '=', Auth::user()->id)->get();
        $this->data('order', $order);
        $items = Wishlist::where('user_id', '=', Auth::user()->id)->paginate(5);
        $this->data('items', $items);
        return view($this->frontendPagePath . 'account', $this->data);

    }

    public function change_password(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'oldpass' => 'required',
                'newpassword' => 'min:6|required_with:confirmpassword|same:confirmpassword'
            ]);
            $oldpass = $request->oldpass;
            $newpass = $request->newpassword;
            $repass = $request->confirmpassword;


            $current_password = Auth::user()->password;


            if (Hash::check($oldpass, $current_password)) {
                $user_id = Auth::User()->id;
                $obj_user = User::find($user_id);
                $obj_user->password = Hash::make($newpass);
                if ($obj_user->save()) {
                    Session::flash('success', 'Your password has been changed');
                    return redirect()->back();
                }
            } else {
                Session::flash('error', 'Your old password does not match');
                return redirect()->back();
            }
        }
    }


    public function forgot_password(Request $request)
    {
        if ($request->isMethod('get')) {

            $this->data('title', 'Forgot Password');
            return view($this->frontendPagePath . 'forget', $this->data);
        }
        if ($request->isMethod('post')) {
            $request->validate([
                'email' => 'required|email|max:40'
            ]);
            $user = User::whereemail($request->email)->first();
            if (!$user) {
                return redirect()->back()->with('error', 'This email is not registered');

            }
            $sentineluser = Sentinel::findById($user->id);
            $reminder = Reminder::exists($sentineluser) ?: Reminder::create($sentineluser);
            $this->sendEmail($sentineluser, $reminder->code);

            return redirect()->back()->with('success', 'Reset Code Sent to your Email');
        }
        return false;
    }

    public function sendEmail($user, $code)
    {
        Mail::send(

            'emails.forgot', ['user' => $user, 'code' => $code],
            function ($message) use ($user) {
                $message->to($user->email);
                $message->subject("$user->name, reset your password . ");
            }
        );
    }

    public function reset_password(Request $request)
    {
        $this->data('title', 'Change Your Password');
        $this->data('email', $request->email);
        if (DB::table('reminders')->where('code', '=', $request->code)) {
            $reminder = DB::table('reminders')->where('code', '=', $request->code)->update(['completed' => 1]);
        } else {
            return redirect()->back()->with('error', 'failed');
        }


        return view($this->frontendPagePath . 'password_change', $this->data);

    }

    public function change_password_action(Request $request)
    {
        $validator = Validator::make($request->all(), [

            'password' => 'min:6|required_with:password_confirmation|same:password_confirmation'
        ])->validate();
        $user = User::where('email', '=', $request->email)->first();
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('home')->with('success', 'You may now login using your new password');

    }
}
