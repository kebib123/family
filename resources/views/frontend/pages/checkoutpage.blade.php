@extends('frontend.master.master')
@section('content')

    <!--  category -->
    <section id="check-out">
        <div class="container check-out">
            <form method="post" class="form-group" action="{{route('checkout-order')}}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                <div class="col-md-7 col-sm-12 deliver__address" style="margin-bottom:10px; background: white">
                    <h2><span class="glyphicon glyphicon-home"></span> Delivery Address</h2>
                    <form action="" class="add-address">
                        <div class="row">
                            <div class="col-sm-6 col-12">
                                <label for="fname">First Name</label>
                                <input type="text" name="fname" class="form-control" value="{{old('first_name')}}" placeholder="First name">
                            </div>
                            <div class="col-sm-6 col-12">
                                <label for="lname">Last Name</label>
                                <input type="text" name="lname" class="form-control" value="{{old('last_name')}}" placeholder="Last name">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label for="inputPhone">Phone</label>
                                <input type="text" name="phone" class="form-control" value="{{old('phone')}}" id="inputPhone"></div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6 col-12">
                                <label for="inputCity">Zone</label>
                                <input type="text" name="zone" class="form-control" value="{{old('zone')}}" id="inputZone">

                            </div>
                            <div class="col-sm-6 col-12">
                                <label for="inputCity">City</label>
                                <input type="text" name="city" class="form-control" value="{{old('city')}}" id="inputCity">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label for="inputAddress">Address</label>
                                <input type="text" name="address" value="{{old('address')}}" class="form-control" id="inputAddress" placeholder="Enter your delivery address">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-5 col-sm-12 ">
                    <div class="card ">
                        <div class="card-header" style="margin-bottom: 10px;">
                            Order Review
                            <div class="float-right">
                                <small><a class="afix-1" href="{{route('cart-item')}}">Edit Cart</a></small>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="card-block">
                            @foreach($cart_item as $value)
                                <div class=" group">
                                    <div class="row">
                                        <div class="col-sm-3 col-3">
                                            <img class="img-fluid"
                                                 src="{{url('images/products/'.$value->options->image)}}"/>
                                        </div>
                                        <div class="col-sm-6 col-6">
                                            <div class="col-12">{{$value->name}}</div>
                                            <div class="col-12">
                                                <small>Quantity:<span>{{$value->qty}}</span></small>
                                            </div>
                                        </div>
                                        <div class="col-sm-3 col-3 text-right">
                                            <h6><span>Rs</span>{{$value->price}}</h6>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <hr>
                                </div>
                            @endforeach

                            <div class="row">
                                <div class="col-12">
                                    <strong>Subtotal</strong>
                                    <div class="float-right"><span>Rs.</span><span>{{Cart::subtotal()}}</span></div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="col-12">
                                    <small>Shipping</small>
                                    <div class="float-right"><span>-</span></div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <hr>

                            <div class="row" style="padding: 0 0 10px">
                                <div class="col-12">
                                    <strong>Order Total</strong>
                                    <div class="float-right"><span>Rs.</span><span>{{Cart::total()}}</span></div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="uk-button checkout float-right">Checkout</button>
                        </div>
                    </div>
                </div>
            </div>
            </form>

        </div>
    </section>
    <!-- footer -->
@endsection

