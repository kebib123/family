<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DXN</title>
    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css"
          integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">

    <!-- owl css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/assets/owl.carousel.min.css">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/assets/owl.theme.default.min.css">
    <!-- UIkit CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-rc.16/css/uikit.min.css"/>

    <link href="https://unpkg.com/ionicons@4.2.4/dist/css/ionicons.min.css" rel="stylesheet">

    <!-- include  css/js -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/metisMenu/2.7.8/metisMenu.min.css">

    <!-- animate css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
    <!-- Xzoom -->

    <!--  google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Karla|Rubik" rel="stylesheet">
    <!-- main css -->
    <link rel="stylesheet" href="{{url('css/app.min.css')}}">


</head>
<body>

<div class="uk-offcanvas-content">
    <!-- header -->
    <header class="header" id="header">
        <div class="top-header py-2 ">
            <div class="container-fluid">
                <div class=" d-flex align-items-center justify-content-between ">
                    <div class="top-header-welcome--text">
                        <p>Welcome To Our Store</p>
                    </div>
                    <div class="top-header-contact d-flex align-items-center justify-content-around">


                        <div class="top-header_phone mr-4">
              <span>
              <span uk-icon="receiver">
</span>
                Call : {{$contact->last()->phone}}
              </span>
                        </div>
                        <div class="top-header_email">
                    <span>
                    <span uk-icon="mail">
</span>
                        Email : {{$contact->last()->email}}
                    </span>
                        </div>
                    </div>
                </div>
            </div>


        </div>
        <div class="mid-header " style="z-index: 1000;" uk-sticky="top: 100;  animation: uk-animation-slide-top">
            <div class="container-fluid">
                <!-- TOP HEAD SECTION    -->
                <div class="row">

                    <div class="col-md-3 col-sm-12 ">
                        <div class="logo__and__user ">

                            <div class="logo">
                                <a href="#offcanvas-usage" uk-toggle="target: #offcanvas-flip" class="bars "
                                   style="display: none;">
                                    <i class="fas fa-bars"></i>
                                </a>
                                <a class="logo-link " href="{{route('home')}}">
                                    <img src="https://1.bp.blogspot.com/-_nSlo7Y9SWU/WZb5C7z9_pI/AAAAAAAAA20/ET-P9Q6ymtAK_9eXbBe3_oXOz_LySclIgCK4BGAYYCw/s1600/logo-sec%2Bcopy1.png"
                                         class="" alt="company logo">
                                </a>

                            </div>
                            <div class="mobile_screen" style="display: none">
                                <div class="users">
                                    <div class="user-login">
                                        <ul class="user_login_ul">
                                            <li class="user_login_li relative">
                                                <a href="" class="user-login-link ">
                                                    <span>Login & SignUp</span>
                                                    <i class="far fa-user" style="display: none"></i>
                                                </a>
                                                <ul class="user_login_ul sub_ul">
                                                    <li class="sub_li"><a href="#">Account</a></li>
                                                    <li class="sub_li"><a href="#">Wishlist</a></li>
                                                    <li class="sub_li"><a href="#">Order</a></li>
                                                    <li class="sub_li"><a href="#">Logout</a></li>
                                                </ul>
                                            </li>
                                        </ul>


                                    </div>
                                    <div class="user-cart">
                                        <a href="" class="user-cart-link">

                                            <img src="https://cdn.iconscout.com/icon/premium/png-256-thumb/shop-cart-5-664052.png"
                                                 alt="">
                                            <span class="user-cart-link_no">1</span>
                                        </a>
                                        <div class="user_cart_dd">
                                            <ul class="user_cart_ul">

                                                <li>
                                                    <figure style="float: left; margin-right: 10px; width: 50px;"><img
                                                                src="http://stat.homeshop18.com/homeshop18/images/productImages/81/lava-a67-dual-sim-android-mobile-phone-medium_3a86d70832ad27694f49cea1aba8dd81.jpg"
                                                                alt=""></figure>
                                                    <p class="text-left">
                                                        <span> Name of PRoduct that is in the cart</span><br>
                                                        <span>1</span> <span>*</span> <span>2000</span>

                                                    </p>
                                                    <div class="clearfix"></div>
                                                    <hr>
                                                </li>
                                                <li>
                                                    <figure style="float: left; margin-right: 10px; width: 50px;"><img
                                                                src="http://stat.homeshop18.com/homeshop18/images/productImages/81/lava-a67-dual-sim-android-mobile-phone-medium_3a86d70832ad27694f49cea1aba8dd81.jpg"
                                                                alt=""></figure>
                                                    <p class="text-left">
                                                        <span> Name of PRoduct</span><br>
                                                        <span>1</span> <span>*</span> <span>2000</span>

                                                    </p>
                                                    <div class="clearfix"></div>
                                                    <hr>
                                                </li>

                                            </ul>
                                            <div class="cart_subtotal">
                                                <div class="float-left">Subtotal</div>
                                                <div class="float-right"><span class=""><span
                                                                class="">Rs.</span>38.00</span>
                                                </div>
                                                <div class="clearfix"></div>
                                                <hr>
                                            </div>
                                            <a href="{{route('cart')}}" class="uk-button view-cart float-left">View
                                                Cart</a>
                                            <a href="{{route('checkout')}}"
                                               class="uk-button checkout float-right">Checkout</a>
                                            <div class="clearfix"></div>
                                        </div>

                                    </div>


                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-6 ">
                        <div class="search-box">
                            <div class="uk-margin">
                                <form class="uk-search uk-search-default ">
                                    <span class="uk-search-icon-flip" uk-search-icon></span>
                                    <input class="uk-search-input" type="search" placeholder="Search...">
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="users big-screen">
                            <div class="user-login">
                                <ul class="user_login_ul">
                                    <li class="user_login_li relative">
                                        <a href="{{route('signin')}}" class="user-login-link ">
                                       <span style="
    background: #e6191b;
    color: white;
    padding: 10px;
">Login &amp; SignUp</span>
                                        </a>
                                        <ul class="user_login_ul sub_ul">
                                            <li class="sub_li"><a href="account.html">Account</a></li>
                                            <li class="sub_li"><a href="account.html">Wishlist</a></li>
                                            <li class="sub_li"><a href="account.html">Order</a></li>
                                            <li class="sub_li"><a href="account.html">Logout</a></li>
                                        </ul>
                                    </li>
                                </ul>


                            </div>

                            <div class="user-cart">
                                <a href="" class="user-cart-link">

                                    <img src="https://cdn.iconscout.com/icon/premium/png-256-thumb/shop-cart-5-664052.png"
                                         alt="">
                                    <span class="user-cart-link_no">{{\Gloudemans\Shoppingcart\Facades\Cart::count()}}</span>
                                </a>
                                <div class="user_cart_dd">
                                    <ul class="user_cart_ul">
                                        @foreach(\Gloudemans\Shoppingcart\Facades\Cart::content() as $value)
                                        <li>
                                            <figure style="float: left; margin-right: 10px; width: 50px;"><img
                                                        src="{{url('images/products/'.$value->options->image)}}"
                                                        alt=""></figure>
                                            <p class="text-left">
                                                <span> {{$value->name}}</span><br>
                                                <span>{{$value->qty}}</span> <span>*</span> <span>{{$value->price}}</span>

                                            </p>
                                            <div class="clearfix"></div>
                                            <hr>
                                        </li>
                                        @endforeach

                                    </ul>
                                    <div class="cart_subtotal">
                                        <div class="float-left">Subtotal</div>
                                        <div class="float-right"><span class=""><span class="">{{\Gloudemans\Shoppingcart\Facades\Cart::subtotal()}}</span></span>
                                        </div>
                                        <div class="clearfix"></div>
                                        <hr>
                                    </div>
                                    <a href="{{route('cart-item')}}" class="btn  btn-default view-cart float-left">View
                                        Cart</a>
                                    <a href="{{route('checkout')}}"
                                       class="btn btn-danger checkout float-right">Checkout</a>
                                    <div class="clearfix"></div>
                                </div>

                            </div>


                        </div>
                    </div>
                </div>

            </div>
            <div class="clearfix"></div>
        </div>
        <div class="bottom-header ">
            <div class="container">
                <div class="row">
                    <div class="nav-category">
                        <a href="{{route('all-category')}}" uk-toggle class="	">
                            <i class="fas fa-tasks mr-2"></i><span>Categories</span>
                        </a>
                        <a href="{{route('all-category')}}" class="pl-3"> All category</a>

                    </div>
                    <ul class="nav-list-items d-flex">
                        <li><a href="{{route('home')}}">Home</a></li>
                        <li><a href="{{route('about')}}">About us</a></li>
                        <li><a href="{{route('contact')}}">Contact us</a></li>
                    </ul>
                </div>
            </div>

        </div>
    </header>

    @if(session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">
            {{session('error')}}
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
@endif
<!-- mobile menu -->
    <div id="offcanvas-flip" uk-offcanvas="flip: true; overlay: true">
        <div class="uk-offcanvas-bar">

            <button class="uk-offcanvas-close" type="button" uk-close style="color: #ef3e42;"></button>

            <section class="mobile-nav">
                <form class="uk-search uk-search-default">
                    <button type="button" class="uk-search-icon-flip" uk-search-icon style="top:0;"></button>
                    <input class="uk-search-input" type="search" placeholder="Search...">
                </form>
                <ul class="metismenu" id="menu">
                    <li class="active">
                        <a href="{{route('home')}}" aria-expanded="true">Home</a>
                    </li>
                    <li>
                        <a href="category-page.html" aria-expanded="false">Electronics<span class="fa arrow"></span></a>
                        <ul aria-expanded="false" class="list-levels">
                            <li><a href="">Item 1</a></li>
                            <li><a href="">Item 2</a></li>
                            <li><a href="">Item 3</a></li>
                            <li><a href="">Item 4</a></li>
                            <li><a href="">Item 5</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="category-page.html" aria-expanded="false">
                            Home Appliance<span class="fa arrow"></span>
                        </a>
                        <ul aria-expanded="false" class="list-levels">
                            <li><a href="">kitchen<span class="fa plus-times"></span></a>
                                <ul aria-expanded="false" class="list-levels">
                                    <li><a href="?">item 1.3.1</a></li>
                                    <li><a href="?">item 1.3.2</a></li>
                                    <li><a href="?">item 1.3.3</a></li>
                                    <li><a href="?">item 1.3.4</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="?" aria-expanded="false">bed room<span class="fa plus-times"></span></a>
                                <ul aria-expanded="false" class="list-levels">
                                    <li><a href="?">item 2.3.1</a></li>
                                    <li><a href="?">item 2.3.2</a></li>
                                    <li><a href="?">item 2.3.3</a></li>
                                    <li><a href="?">item 2.3.4</a></li>
                                </ul>
                            </li>
                            <li><a href="">terrance<span class="fa plus-times"></span></a>
                                <ul aria-expanded="false" class="list-levels">
                                    <li><a href="?">item 1.3.1</a></li>
                                    <li><a href="?">item 1.3.2</a></li>
                                    <li><a href="?">item 1.3.3</a></li>
                                    <li><a href="?">item 1.3.4</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="?" aria-expanded="false">Item 3<span class="fa plus-times"></span></a>
                                <ul aria-expanded="false" class="list-levels">
                                    <li><a href="?">item 2.3.1</a></li>
                                    <li><a href="?">item 2.3.2</a></li>
                                    <li><a href="?">item 2.3.3</a></li>
                                    <li><a href="?">item 2.3.4</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{route('about')}}" aria-expanded="false">About us</a>
                    </li>
                    <li>
                        <a href="{{route('contact')}}" aria-expanded="false">Contact us</a>
                    </li>
                </ul>
            </section>
        </div>
    </div>
    <!-- mobile menu -->

