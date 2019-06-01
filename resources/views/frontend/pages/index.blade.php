@extends('frontend.master.master')
@section('content')

    <!-- The whole page content goes here -->

    <section id="mega-nav--slider">
        <div class="container" >
            <div class="row">
                <div class=" col-lg-2 col-md-2 col-sm-12  side-navbar-menu">

                    <div class="side-nav-category">
                        <ul class="side-nav-category-ul">
                            @foreach($cat as $value)
                                <li class="li-has-children"><a href="{{route('all-category')}}">{{$value->name}}<span  class="float-right" uk-icon="icon: chevron-right"></span> <span class="clearfix"></span></a>
                                    <div class="hover-side-menu">
                                        @foreach($value->subCategory as $child)
                                            <div class="sub-category-block">
                                                <div class="sub-nav-main-category"><a href="{{route('show-category',$child->id)}}">{{$child->name}}</a></div>
                                                <ul class="side-sub-nav-category-ul">
                                                    @foreach($child->subCategory as $item)
                                                        <li><a href="{{route('show-category',$item->id)}}" class="nav_a">{{$item->name}}</a></li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endforeach
                                    </div>
                                </li>
                            @endforeach


                            <li class="li-has-children"><a href="{{route('all-category')}}"> <i class="fas fa-plus-square"></i>
                                    All Category</a></li>
                        </ul>


                    </div>

                </div>
                <div class="col-lg-8 col-md-8 col-sm-12" style="padding: 0">
                    <div class="main-slider">
                        <div class="banner owl-carousel owl-theme ">
                            @foreach($slide1 as $value)
                            <div class="slider-images">
                                <a href="{{$value->link}}"> <img src="{{url('images/slides/'.$value->image)}}"  alt="gadgets" width="100%" height="100%"></a>

                            </div>
                          @endforeach
                        </div>


                    </div>
                </div>
                <div class=" col-lg-2 col-md-4 col-sm-12 d-md-block d-sm-none d-none"  style="padding: 0">
                    <div class="banner-right-side ">

                        <img src="https://nas.com.np/storage/settings/tDRv1Ptf0dyaFyzfvU3tKFB9Usk9db3q5ASc9ADJ.png" alt="">

                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="product-grid dealofday">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="product-grid-content">

                        <div class="heading countdown">
                            <h5><span class="animated infinite  flash slower ">Deal of the day</span></h5>
                            <p>Don't Miss out! Ends in</p>
                            <div id="the-final-countdown">
                                <ul class="liststyle--none">

                                    <li><span id="hours"></span></li>
                                    :
                                    <li><span id="minutes"></span></li>
                                    :
                                    <li><span id="seconds"></span></li>
                                </ul>
                            </div>
                        </div>
                        <a href="{{route('category')}}" class="uk-button view-cart">view more</a>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="product-category white-product">
                        <div class="containers">
                            <div class="owl-carousel dealofday-carousel inner-column">
                                <article class="product instock sale purchasable">
                                    <div class="product-wrap">
                                        <div class="product-top">
                                            <span class="product-label discount">new</span>


                                            <figure>
                                                <a href="{{route('single-page')}}">
                                                    <div class="product-image">
                                                        <img width="320" height="320"
                                                             src="https://cf2.s3.souqcdn.com/item/2016/12/14/12/01/99/12/item_XL_12019912_18013925.jpg"
                                                             class="attachment-shop_catalog size-shop_catalog" alt="">
                                                    </div>
                                                </a>
                                            </figure>


                                        </div>
                                        <div class="product-description">

                                            <div class="product-meta">
                                                <div class="title-wrap">
                                                    <p class="product-title">
                                                        <a href="{{route('single-page')}}">G Stylo MS631 16GB 4G LTE
                                                            SmartPhone GSM Unlocked</a>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between">
                                                <div class="product_price">
                                                    <div class="product_price-actual">
                                                        Rs.2000
                                                    </div>
                                                    <div class="product_price-discount">
                                                 <span class="line-through">
                                                     Rs.2500
                                                 </span>
                                                        <span>-20%</span>
                                                    </div>
                                                </div>
                                                <div class="product_cart">
                                                    <a href="javascript:void(0)">
                                                        <ion-icon name="cart" uk-tooltip=" Add to Cart"></ion-icon>
                                                    </a></div>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                                <article class="product instock sale purchasable">
                                    <div class="product-wrap">
                                        <div class="product-top">
                                            <span class="product-label discount">sale</span>


                                            <figure>
                                                <a href="{{route('single-page')}}">
                                                    <div class="product-image">
                                                        <img width="320" height="320"
                                                             src="https://www.dhresource.com/0x0s/f2-albu-g5-M00-FB-A1-rBVaI1jaBsyASTsMAASv93iI80k903.jpg/ta-nabilir-mini-led-bluetooth-hoparl-r-kablosuz.jpg"
                                                             class="attachment-shop_catalog size-shop_catalog" alt="">
                                                    </div>
                                                </a>
                                            </figure>


                                        </div>
                                        <div class="product-description">

                                            <div class="product-meta">
                                                <div class="title-wrap">
                                                    <p class="product-title">
                                                        <a href="{{route('single-page')}}">G Stylo MS631 16GB 4G LTE
                                                            SmartPhone GSM Unlocked</a>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between">
                                                <div class="product_price">
                                                    <div class="product_price-actual">
                                                        Rs.2000
                                                    </div>
                                                    <div class="product_price-discount">
                                                 <span class="line-through">
                                                     Rs.2500
                                                 </span>
                                                        <span>-20%</span>
                                                    </div>
                                                </div>
                                                <div class="product_cart">
                                                    <a href="javascript:void(0)">
                                                        <ion-icon name="cart" uk-tooltip=" Add to Cart"></ion-icon>
                                                    </a></div>
                                            </div>

                                        </div>
                                    </div>
                                </article>
                                <article class="product instock sale purchasable">
                                    <div class="product-wrap">
                                        <div class="product-top">
                                            <span class="product-label discount">sale</span>


                                            <figure>
                                                <a href="singlepage.html">
                                                    <div class="product-image">
                                                        <img width="320" height="320"
                                                             src="https://i.pinimg.com/474x/a6/d4/28/a6d428e72846103275824c0031e5f43d--dress-vest-vest-coat.jpg"
                                                             class="attachment-shop_catalog size-shop_catalog" alt="">
                                                    </div>
                                                </a>
                                            </figure>


                                        </div>
                                        <div class="product-description">

                                            <div class="product-meta">
                                                <div class="title-wrap">
                                                    <p class="product-title">
                                                        <a href="singlepage.html">G Stylo MS631 16GB 4G LTE SmartPhone
                                                            GSM Unlocked</a>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between">
                                                <div class="product_price">
                                                    <div class="product_price-actual">
                                                        Rs.2000
                                                    </div>
                                                    <div class="product_price-discount">
                                                 <span class="line-through">
                                                     Rs.2500
                                                 </span>
                                                        <span>-20%</span>
                                                    </div>
                                                </div>
                                                <div class="product_cart">
                                                    <a href="javascript:void(0)">
                                                        <ion-icon name="cart" uk-tooltip=" Add to Cart"></ion-icon>
                                                    </a></div>
                                            </div>

                                        </div>
                                    </div>
                                </article>
                                <article class="product instock sale purchasable">
                                    <div class="product-wrap">
                                        <div class="product-top">
                                            <span class="product-label discount">hot</span>


                                            <figure>
                                                <a href="singlepage.html">
                                                    <div class="product-image">
                                                        <img width="320" height="320"
                                                             src="https://wp.xpeedstudio.com/marketo/wp-content/uploads/2018/05/24-180x134.png"
                                                             class="attachment-shop_catalog size-shop_catalog" alt="">
                                                    </div>
                                                </a>
                                            </figure>


                                        </div>
                                        <div class="product-description">

                                            <div class="product-meta">
                                                <div class="title-wrap">
                                                    <p class="product-title">
                                                        <a href="singlepage.html">G Stylo MS631 16GB 4G LTE SmartPhone
                                                            GSM Unlocked</a>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between">
                                                <div class="product_price">
                                                    <div class="product_price-actual">
                                                        Rs.2000
                                                    </div>
                                                    <div class="product_price-discount">
                                                 <span class="line-through">
                                                     Rs.2500
                                                 </span>
                                                        <span>-20%</span>
                                                    </div>
                                                </div>
                                                <div class="product_cart">
                                                    <a href="javascript:void(0)">
                                                        <ion-icon name="cart" uk-tooltip=" Add to Cart"></ion-icon>
                                                    </a></div>
                                            </div>

                                        </div>
                                    </div>
                                </article>
                                <article class="product instock sale purchasable">
                                    <div class="product-wrap">
                                        <div class="product-top">
                                            <span class="product-label discount">sale</span>


                                            <figure>
                                                <a href="singlepage.html">
                                                    <div class="product-image">
                                                        <img width="320" height="320"
                                                             src="https://wp.xpeedstudio.com/marketo/wp-content/uploads/2018/05/24-180x134.png"
                                                             class="attachment-shop_catalog size-shop_catalog" alt="">
                                                    </div>
                                                </a>
                                            </figure>


                                        </div>
                                        <div class="product-description">

                                            <div class="product-meta">
                                                <div class="title-wrap">
                                                    <p class="product-title">
                                                        <a href="singlepage.html">G Stylo MS631 16GB 4G LTE SmartPhone
                                                            GSM Unlocked</a>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between">
                                                <div class="product_price">
                                                    <div class="product_price-actual">
                                                        Rs.2000
                                                    </div>
                                                    <div class="product_price-discount">
                                                 <span class="line-through">
                                                     Rs.2500
                                                 </span>
                                                        <span>-20%</span>
                                                    </div>
                                                </div>
                                                <div class="product_cart">
                                                    <a href="javascript:void(0)">
                                                        <ion-icon name="cart" uk-tooltip=" Add to Cart"></ion-icon>
                                                    </a></div>
                                            </div>

                                        </div>
                                    </div>
                                </article>


                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>


    </section>

    <section id="popular-category">
        <div class="container-fluid">
            <h3> Popular Products</h3>
            {{--<nav class=" popular-category-tabs">--}}
                {{--@foreach($catpo as $value)--}}

                {{--<ul class="nav nav-pills " id="nav-tab">--}}
                    {{--<li><a class="nav-item nav-link" data-toggle="tab" href="nav-Desktops">{{$value->name}}</a></li>--}}
                    {{--@endforeach--}}
                {{--</ul>--}}
            {{--</nav>--}}
            <div class="tab-content popular-category" id="nav-tabContent">

                {{--<div class="tab-pane fade" id="nav-Desktops" role="tabpanel" aria-labelledby="nav-profile-tab">--}}
                    <div class="product-category white-product">

                        <div class="category--slider owl-carousel ">
                            @foreach($popular as $value)
                                <article class="product instock sale purchasable">
                                    <div class="product-wrap">
                                        <div class="product-top">
                                            <span class="product-label discount">new</span>

                                            <figure>
                                                <a href="{{route('show-products',$value->id)}}">
                                                    <div class="product-image">
                                                        <img width="320" height="320"
                                                             src="{{url('images/products/'.$value->image)}}" alt="">
                                                    </div>
                                                </a>
                                            </figure>


                                        </div>
                                        <div class="product-description">

                                            <div class="product-meta">
                                                <div class="title-wrap">
                                                    <p class="product-title">
                                                        <a href="{{route('show-products',$value->id)}}">{{$value->product_name}}</a>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between">
                                                <div class="product_price">
                                                    <div class="product_price-actual">
                                                        {{$value->selling_price}}
                                                    </div>
                                                    <div class="product_price-discount">
                                                 <span class="line-through">
                                                     {{$value->price}}
                                                 </span>
                                                        <span>{{$value->discount_percentage}}</span><span>%</span>
                                                    </div>
                                                </div>
                                                <div class="product_cart">
                                                    <a href="javascript:void(0)">
                                                        <ion-icon name="cart" uk-tooltip=" Add to Cart"></ion-icon>
                                                    </a></div>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            @endforeach

                        </div>
                    </div>
                </div>
                {{--<div class="tab-pane fade" id="nav-Mobiles" role="tabpanel" aria-labelledby="nav-profile-tab">--}}
                    {{--<div class="product-category white-product">--}}

                        {{--<div class="category--slider owl-carousel ">--}}
                            {{--@foreach($popular1 as $value)--}}
                                {{--<article class="product instock sale purchasable">--}}
                                    {{--<div class="product-wrap">--}}
                                        {{--<div class="product-top">--}}
                                            {{--<span class="product-label discount">new</span>--}}

                                            {{--<figure>--}}
                                                {{--<a href="{{route('single-page')}}">--}}
                                                    {{--<div class="product-image">--}}
                                                        {{--<img width="320" height="320"--}}
                                                             {{--src="{{url('images/products/'.$value->image)}}" alt="">--}}
                                                    {{--</div>--}}
                                                {{--</a>--}}
                                            {{--</figure>--}}


                                        {{--</div>--}}
                                        {{--<div class="product-description">--}}

                                            {{--<div class="product-meta">--}}
                                                {{--<div class="title-wrap">--}}
                                                    {{--<p class="product-title">--}}
                                                        {{--<a href="{{route('single-page')}}">{{$value->product_name}}</a>--}}
                                                    {{--</p>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                            {{--<div class="d-flex align-items-center justify-content-between">--}}
                                                {{--<div class="product_price">--}}
                                                    {{--<div class="product_price-actual">--}}
                                                        {{--{{$value->price}}--}}
                                                    {{--</div>--}}
                                                    {{--<div class="product_price-discount">--}}
                                                 {{--<span class="line-through">--}}
                                                     {{--{{$value->discount_price}}--}}
                                                 {{--</span>--}}
                                                        {{--<span>-20%</span>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                                {{--<div class="product_cart">--}}
                                                    {{--<a href="javascript:void(0)">--}}
                                                        {{--<ion-icon name="cart" uk-tooltip=" Add to Cart"></ion-icon>--}}
                                                    {{--</a></div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</article>--}}
                            {{--@endforeach--}}

                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="tab-pane fade" id="nav-Laptops" role="tabpanel" aria-labelledby="nav-profile-tab">--}}
                    {{--<div class="product-category white-product">--}}

                        {{--<div class="category--slider owl-carousel ">--}}
                            {{--@foreach($popular2 as $value)--}}
                                {{--<article class="product instock sale purchasable">--}}
                                    {{--<div class="product-wrap">--}}
                                        {{--<div class="product-top">--}}
                                            {{--<span class="product-label discount">new</span>--}}

                                            {{--<figure>--}}
                                                {{--<a href="{{route('single-page')}}">--}}
                                                    {{--<div class="product-image">--}}
                                                        {{--<img width="320" height="320"--}}
                                                             {{--src="{{url('images/products/'.$value->image)}}" alt="">--}}
                                                    {{--</div>--}}
                                                {{--</a>--}}
                                            {{--</figure>--}}


                                        {{--</div>--}}
                                        {{--<div class="product-description">--}}

                                            {{--<div class="product-meta">--}}
                                                {{--<div class="title-wrap">--}}
                                                    {{--<p class="product-title">--}}
                                                        {{--<a href="{{route('single-page')}}">{{$value->product_name}}</a>--}}
                                                    {{--</p>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                            {{--<div class="d-flex align-items-center justify-content-between">--}}
                                                {{--<div class="product_price">--}}
                                                    {{--<div class="product_price-actual">--}}
                                                        {{--{{$value->price}}--}}
                                                    {{--</div>--}}
                                                    {{--<div class="product_price-discount">--}}
                                                 {{--<span class="line-through">--}}
                                                     {{--{{$value->discount_price}}--}}
                                                 {{--</span>--}}
                                                        {{--<span>-20%</span>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                                {{--<div class="product_cart">--}}
                                                    {{--<a href="javascript:void(0)">--}}
                                                        {{--<ion-icon name="cart" uk-tooltip=" Add to Cart"></ion-icon>--}}
                                                    {{--</a></div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</article>--}}
                            {{--@endforeach--}}

                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}

            </div>
        </div>


    </section>

    <section class="three-columns mb">

        <div class="container-fluid">
            <div class="row col-three owl-carousel">
                @foreach($slide2 as $value)
                <div class="column">
                    <a href=""><img src="{{url('images/slides/'.$value->image)}}" alt=""></a>
                </div>
                    @endforeach
            </div>
        </div>
    </section>

    <section id="popular-category">
        <div class="container-fluid">
            <div class="d-flex align-items-center justify-content-between">
                <div class="heading">
                    <h3> Featured Product</h3>
                </div>
                <div><a href="{{route('show-featured')}}" class=" uk-button view-cart">view more</a></div>
            </div>
            <hr>

            <div class="product-category white-product">

                <div class="category--slider owl-carousel ">
                    @foreach($featured as $value)

                    <article class="product instock sale purchasable">
                        <div class="product-wrap">

                            <div class="product-top">

                                <span class="product-label discount">new</span>


                                <figure>
                                    <a href="{{route('show-products',$value->id)}}">
                                        <div class="product-image">
                                            <img width="320" height="320"
                                                 src="{{url('images/products/'.$value->image)}}"
                                                 class="attachment-shop_catalog size-shop_catalog" alt="">
                                        </div>
                                    </a>
                                </figure>


                            </div>
                            <div class="product-description">

                                <div class="product-meta">
                                    <div class="title-wrap">
                                        <p class="product-title">
                                            <a href="{{route('show-products',$value->id)}}">{{$value->product_name}}</a>
                                        </p>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="product_price">
                                        <div class="product_price-actual">
                                            {{$value->selling_price}}
                                        </div>
                                        <div class="product_price-discount">
                                                 <span class="line-through">
                                                     {{$value->price}}
                                                 </span>
                                            <span>{{$value->discount_percentage}}</span><span>%</span>
                                        </div>
                                    </div>
                                    <div class="product_cart">
                                        <a href="javascript:void(0)">
                                             <ion-icon name="cart" uk-tooltip=" Add to Cart"></ion-icon>
                                        </a></div>
                                </div>
                            </div>
                        </div>
                    </article>
                  @endforeach
                </div>
            </div>


        </div>


    </section>

    <section id="popular-category">
        <div class="container-fluid">
            <div class="d-flex align-items-center justify-content-between">
                <div class="heading">
                    <h3> Featured Brands</h3>
                </div>
            </div>
            <hr>
            <div class="product-category white-product">

                <div class="category--slider owl-carousel ">
                    @foreach($brand as $value)

                        <article class="product instock sale purchasable">
                            <div class="product-wrap">

                                <div class="product-top">

                                    <span class="product-label discount">new</span>


                                    <figure>
                                        <a href="{{route('featured-brand',$value->id)}}">
                                            <div class="product-image">
                                                <img width="320" height="320"
                                                     src="{{url('images/brands/'.$value->brand_image)}}"
                                                     class="attachment-shop_catalog size-shop_catalog" alt="">
                                            </div>
                                        </a>
                                    </figure>


                                </div>
                                <div class="product-description">

                                    <div class="product-meta">
                                        <div class="title-wrap">
                                            <p class="product-title">
                                                <a href="{{route('featured-brand',$value->id)}}">{{$value->brand_name}}</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>


        </div>


    </section>

    <section class="three-columns mb">

        <div class="container-fluid">
            <div class="row col-three owl-carousel">
                @foreach($slide3 as $value)
                <div class="column">
                    <a href=""><img src="{{url('images/slides/'.$value->image)}}" alt="Image not found"></a>
                </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection