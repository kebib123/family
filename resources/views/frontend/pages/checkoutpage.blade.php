@extends('frontend.master.master')
@section('content')

    <!--  category -->
    <section id="check-out">
        <div class="container check-out">
            <form method="post" class="form-group" action="{{route('checkout-order')}}" enctype="multipart/form-data">
                <input type="hidden" name="id" value="@if(Auth::check()){{Auth::user()->id}}@endif">
                @csrf
                <div class="row">
                    <div class="col-md-7 col-sm-12 deliver__address" style="margin-bottom:10px; background: white">
                        <h2><span class="glyphicon glyphicon-home"></span> Delivery Address</h2>
                        <form action="" class="add-address">
                            <div class="row">
                                <div class="col-sm-6 col-12">
                                    <label for="fname">First Name</label>
                                    <input type="text" name="fname" required class="fname form-control"
                                           value="@if(Auth::check() && \App\Model\Shipping::where('user_id','=',Auth::user()->id)->get()->isnotEmpty()) {{\App\Model\User::where('id','=',Auth::user()->id)->first()->defaultadd->first_name}} @endif"
                                           placeholder="First name">
                                </div>
                                <div class="col-sm-6 col-12">
                                    <label for="lname">Last Name</label>
                                    <input type="text" name="lname" required class="lname form-control"
                                           value="@if(Auth::check() && \App\Model\Shipping::where('user_id','=',Auth::user()->id)->get()->isnotEmpty()) {{\App\Model\User::where('id','=',Auth::user()->id)->first()->defaultadd->last_name}} @endif"
                                           placeholder="Last name">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <label for="inputPhone">Mobile</label>
                                    <input type="text" name="phone" required class="mobile form-control"
                                           value="@if(Auth::check() && \App\Model\Shipping::where('user_id','=',Auth::user()->id)->get()->isnotEmpty()) {{\App\Model\User::where('id','=',Auth::user()->id)->first()->defaultadd->mobile}} @endif"
                                           id="inputPhone"></div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6 col-12">
                                    <label for="inputCity">Country</label>
                                    <input type="text" name="zone" required class="country form-control"
                                           value="@if(Auth::check() && \App\Model\Shipping::where('user_id','=',Auth::user()->id)->get()->isnotEmpty()) {{\App\Model\User::where('id','=',Auth::user()->id)->first()->defaultadd->country}} @endif"
                                           id="inputZone">

                                </div>
                                <div class="col-sm-6 col-12">
                                    <label for="inputCity">City</label>
                                    <input type="text" name="city" required class="city form-control"
                                           value="@if(Auth::check() && \App\Model\Shipping::where('user_id','=',Auth::user()->id)->get()->isnotEmpty()) {{\App\Model\User::where('id','=',Auth::user()->id)->first()->defaultadd->city}} @endif"
                                           id="inputCity">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <label for="inputAddress">Address</label>
                                    <input type="text" name="address" required
                                           value="@if(Auth::check() && \App\Model\Shipping::where('user_id','=',Auth::user()->id)->get()->isnotEmpty()) {{\App\Model\User::where('id','=',Auth::user()->id)->first()->defaultadd->street}} @endif"
                                           class="address form-control" id="inputAddress"
                                           placeholder="Enter your delivery address">
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
                                                <h6><span>Rs</span>{{$value->price*$value->qty}}</h6>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <hr>
                                    </div>
                                @endforeach

                                <div class="row">
                                    <div class="col-12" id="sub">
                                        <strong>Subtotal</strong>
                                        <div class="total float-right">{{\Gloudemans\Shoppingcart\Facades\Cart::subtotal()}}</div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="col-12" id="charge">
                                        <small>Shipping Cost</small>
                                        <div class="ship float-right">{{$charge->first()->shipping_cost}}</div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="col-12" id="info">
                                        <small>Tax</small>
                                        <div class="vat float-right">{{$charge->first()->tax}}%</div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                <hr>

                                <div class="row" style="padding: 0 0 10px">
                                    <div class="col-12" id="grand">
                                        <strong>Order Total</strong>
                                        <div class="total float-right"></div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="uk-button checkout float-right">Checkout</button>
                                <input class="amount form-control" type="hidden" name="amount">
                                <button type="button" id="paypal" class="btn btn-primary float-left">Pay with PayPal</button>
                            </div>

                        </div>
                    </div>
                </div>
            </form>
        </div>



    </section>
    <!-- footer -->
@endsection

@push('script')


    <script>
        $(document).ready(function () {

            var shipping = parseInt('{{$charge->first()->shipping_cost}}');
            var charge = $('#charge').find('.ship').html(shipping);
            var subtotal = $('#sub').find('.total').html();
            var newStr = subtotal.replace(/,/g, '');
            var sub = parseInt(newStr);
            var tax = parseInt('{{$charge->first()->tax}}') / 100 * sub;
            var vat = $('#info').find('.vat').html(tax.toFixed(2));
            var total = Math.floor(shipping + tax + sub);
            var grand = $('#grand').find('.total').html(total);
            var paypal = $('.amount').val(total);
            console.log(paypal);

            $('#paypal').click(function (e) {

                var paypal = $('.amount').val();
                var fname = $('.fname').val();
                var lname = $('.lname').val();
                var mobile = $('.mobile').val();
                var country = $('.country').val();
                var city = $('.city').val();
                var address = $('.address').val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "{{route('paypal')}}",
                    type: "POST",
                    data: {
                        fname: fname,
                        lname:lname,
                        mobile:mobile,
                        country:country,
                        city:city,
                        address:address,
                        amount: paypal

                    },
                    success: function (result) {
                        if (result.status == 'error') {
                            toastr.error(result.message);
                        }
                        if (result.redirect) {
                            window.location.href = result.redirect;
                        }
                    }
                });
            });


        });


    </script>
@endpush