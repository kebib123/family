@extends('frontend.master.master')
@section('content')

    <!-- The whole page content goes here -->

    <section id="mega-nav--slider">
        <div class="container">
            <div class="row">
                <div class=" col-lg-2 col-md-2 col-sm-12  side-navbar-menu">

                    <div class="side-nav-category">
                        <ul class="side-nav-category-ul">
                            @foreach($cat as $value)
                                <li class="li-has-children"><a href="{{route('all-category')}}">{{$value->name}}<span
                                                class="float-right" uk-icon="icon: chevron-right"></span> <span
                                                class="clearfix"></span></a>
                                    <div class="hover-side-menu">
                                        @foreach($value->subCategory as $child)
                                            <div class="sub-category-block">
                                                <div class="sub-nav-main-category"><a
                                                            href="{{route('show-category',$child->id)}}">{{$child->name}}</a>
                                                </div>
                                                <ul class="side-sub-nav-category-ul">
                                                    @foreach($child->subCategory as $item)
                                                        <li><a href="{{route('show-category',$item->id)}}"
                                                               class="nav_a">{{$item->name}}</a></li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endforeach
                                    </div>
                                </li>
                            @endforeach


                            <li class="li-has-children"><a href="{{route('all-category')}}"> <i
                                            class="fas fa-plus-square"></i>
                                    All Category</a></li>
                        </ul>


                    </div>

                </div>
                <div class="col-lg-8 col-md-8 col-sm-12" style="padding: 0">
                    <div class="main-slider">
                        <div class="banner owl-carousel owl-theme ">
                            @foreach($slide1 as $value)
                                <div class="slider-images">
                                    <a href="{{$value->link}}"> <img src="{{url('images/slides/'.$value->image)}}"
                                                                     alt="gadgets" width="100%" height="100%"></a>

                                </div>
                            @endforeach
                        </div>


                    </div>
                </div>
                <div class=" col-lg-2 col-md-4 col-sm-12 d-md-block d-sm-none d-none" style="padding: 0">
                    <div class="banner-right-side ">

                        <img src="https://nas.com.np/storage/settings/tDRv1Ptf0dyaFyzfvU3tKFB9Usk9db3q5ASc9ADJ.png"
                             alt="">

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

                                    <li><span id="days"></span></li>
                                    :
                                    <li><span id="hours"></span></li>
                                    :
                                    <li><span id="minutes"></span></li>
                                    :
                                    <li><span id="seconds"></span></li>
                                </ul>
                            </div>
                        </div>
                        {{--<a href="{{route('category')}}" class="uk-button view-cart">view more</a>--}}
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="product-category white-product">
                        <div class="containers">
                            <div class="owl-carousel dealofday-carousel inner-column">
                                @foreach($deals as $value)
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
                                                            <a href="{{route('show-products',$value->id)}}">
                                                                {{$value->product_name}}</a>
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
                                                            <span>{{$value->discount_percentage}}%</span>
                                                        </div>
                                                    </div>
                                                    <div class="product_cart">
                                                        <a href="{{route('show-products',$value->id)}}">
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

                </div>
            </div>
        </div>


    </section>

    <section id="popular-category">
        <div class="container-fluid">
            <h3> Popular Products</h3>

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
                                                <a href="{{route('show-products',$value->id)}}">
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
                                            <a href="{{route('show-products',$value->id)}}">
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
@push('script')
    <script>

        // javascript for time laps
        var countDownDate = new Date("{{deal_date(1)}} 00:00:00").getTime();
        console.log(countDownDate);

        // Update the count down every 1 second
        var x = setInterval(function() {

            // Get today's date and time
            var now = new Date().getTime();

            // Find the distance between now and the count down date
            var distance = countDownDate - now;

            // Time calculations for days, hours, minutes and seconds
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            // Display the result in the element
            document.getElementById('days').innerText = days;
            document.getElementById('hours').innerText = hours;
            document.getElementById('minutes').innerText =minutes ;
            document.getElementById('seconds').innerText =seconds;

            // If the count down is finished, write some text
            if (distance < 0) {
                clearInterval(x);
                document.getElementById("the-final-countdown").innerHTML = "EXPIRED";
            }
        }, 1000);

    </script>
@endpush