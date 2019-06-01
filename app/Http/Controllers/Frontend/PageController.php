<?php

namespace App\Http\Controllers\Frontend;

use App\Model\About;
use App\Model\Brand;
use App\Model\Category;
use App\Model\Product;
use App\Model\SlideShow;
use App\Repositories\Contracts\CategoryRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
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
                if (Auth::user()->roles == 'admin') {
                    return redirect()->intended(route('index'));
                } else if(Auth::user()->roles=='user') {
                    return redirect()->route('home');
                }
            }
            else {
                return back()->with('error', 'Please register first');
            }
        }

    }


    public function index()
    {
        $products = Product::where('is_popular', '=', 'popular')->pluck('category_id')->toArray();
        $catpo = Category::whereIn('id', $products)->get();
        $popular = Product::where('is_popular', '=', 'popular')->get();
        $featured = Product::where('is_featured', '=', 'featured')->get();
        $brand = Brand::all();
        $slide1 = SlideShow::where('status', '=', '1')->where('section', '=', '1')->get();
        $slide2 = SlideShow::where('status', '=', '1')->where('section', '=', '2')->get();
        $slide3 = SlideShow::where('status', '=', '1')->where('section', '=', '3')->get();

        return view($this->frontendPagePath . 'index', compact('featured', 'catpo', 'popular', 'brand', 'slide1', 'slide2', 'slide3'));
    }


    public function about()
    {
        $abt = About::all();
        $this->data('about', $abt);
        return view($this->frontendPagePath . 'aboutpage');
    }

    public function all_category()
    {
        return view($this->frontendPagePath . 'allcategory');
    }

    public function cart(Request $request)
    {
        $id = $request->id;
        $show = Cart::where('id', '=', $id)->first();
        return view($this->frontendPagePath . 'cartpage');
    }

    public function category()
    {
        return view($this->frontendPagePath . 'category');
    }

    public function checkout()
    {
        $cart_item = Cart::content();

        return view($this->frontendPagePath . 'checkoutpage', compact('cart_item'));
    }

    public function contact()
    {
        return view($this->frontendPagePath . 'contactpage');
    }

    public function faq()
    {
        return view($this->frontendPagePath . 'faqpage');
    }

    public function product_request()
    {
        return view($this->frontendPagePath . 'productrequest');
    }

    public function register()
    {
        return view($this->frontendPagePath . 'registerpage');
    }

    public function single_page()
    {
        return view($this->frontendPagePath . 'singlepage');
    }

}
