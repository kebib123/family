@extends('frontend.master.master')
@section('content')
    <div id="edit_account_info" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">

                    <h4 class="modal-title" id="myModalLabel">Edit your account info</h4>
                </div>
                <form>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword">Old-Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword"
                                   placeholder="Old Password">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1"
                                   placeholder="Password">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword2">Re-Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword2"
                                   placeholder="Re-Password">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>

    </div>


    <div id="edit_personal_info" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Edit your personal info</h4>
                </div>
                <form>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="firstName">First Name</label>
                            <input type="text" class="form-control" id="firstName">
                        </div>
                        <div class="form-group">
                            <label for="lastName">Last Name</label>
                            <input type="text" class="form-control" id="lastName">
                        </div>
                        <div class="form-group">
                            <label for="userName">User Name</label>
                            <input type="text" class="form-control" id="userName">
                        </div>
                        <div class="form-group">
                            <label for="gender">Gender</label>
                            <div class="radio">
                                <label><input type="radio" name="gender">Male</label>

                                <label><input type="radio" name="gender">Female</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Date Of Birth</label>
                            <input type="text" id="datepicker" class="form-control" placeholder="Choose">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>

    </div>


    <div id="edit_commnotifysettings" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3>Notification Settings</h3>
                    <h5>Choose the notifications you want to receive.</h5>
                </div>
                <form>
                    <div class="modal-body">
                        <ul class="liststyle--none">
                            <li class="notify--list">
                                <a href="#" class="accordion-title" data-toggle="collapse"
                                   data-target="#collapseExample"
                                   aria-expanded="false" aria-selected="false">
                                    <h4><b>Recommendations</b></h4>
                                    <span>You are special! Get personalized offers, promotions and coupons on your favorite brand and items.</span>
                                    <span class="btn btn-primary pull-right mb-10">options</span>
                                    <span class="clearfix"></span>
                                </a>
                                <div class="collapse" id="collapseExample">
                                    <form>
                                        <input type="hidden" name="updateCustomerCPC" value="1">
                                        <ul class="liststyle--none">
                                            <li>
                                                <input type="checkbox" class="channel_settings channel_settings_1"
                                                       checked="">Email
                                            </li>
                                            <li>

                                                <input type="checkbox" class="channel_settings channel_settings_1"
                                                       checked="">Push Notifications

                                            </li>
                                            <li>
                                                <input type="checkbox" class="channel_settings channel_settings_1"
                                                       checked="">SMS
                                            </li>
                                        </ul>
                                        <div class="save-action ">
                                            <input type="submit" class="btn btn-primary btn-sm pull-right" value="Save">
                                            <div class="clearfix"></div>
                                        </div>
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>


                </form>
            </div>
        </div>
    </div>


    <section class="content-box-row">
        <div class="container " style="margin:10px auto;padding:0;">

            <div class="alert__section">
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-info">
                            <strong>Success!</strong> Indicates a successful or positive action.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>

                </div>
            </div>

            <div class="profile__section">
                <div class="container">
                    <div class="card">
                        <div class="card-header">

                            <h2 class="page-header" style="padding-bottom: 25px; margin-top:0;">
                                <i class="fa fa-globe"></i> Order ID# {{$orders->first()->id}}
                                <small style="display: inline-block">Ordered Date: {{$orders->first()->created_at}}</small>

                            </h2>


                        </div>
                        <a href="{{route('account')}}" class="btn btn-primary"><i
                                    class="fa fa-angle-left"></i> Back</a>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <section>
                                <div class="row">
                                    <div class="col-xs-12 table-responsive">
                                        <table id="example" class="table table-bordered table-sm">
                                            <thead>
                                            <tr>
                                                <th>Sn</th>
                                                <th><i class="fa fa-image"></i></th>
                                                <th>Product Name</th>
                                                <th>Quantity</th>
                                                <th>Price</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($orders as $key=>$value)
                                                <tr>
                                                    {{$value->products}}
                                                    <td>{{++$key}}</td>
                                                    <td style="width: 300px" height="200px" ><img class="accountin"
                                                                                                  src="{{asset('images/products/'.$value->image)}}"></td>

                                                    <td>{{$value->product}}</td>
                                                    <td>{{$value->quantity}}</td>
                                                    {{--<td>      @if($value->color != '')--}}
                                                            {{--<div class="foo blue"--}}
                                                                 {{--style="  background: {{$value->color}}; float: left;width: 20px; height: 20px;margin: 5px;border: 1px solid rgba(0, 0, 0, .2);--}}
                                                                         {{--"></div>--}}
                                                        {{--@else--}}
                                                            {{--null--}}
                                                        {{--@endif--}}
                                                    {{--</td>--}}
                                                    <td class="price">{{$value->price*$value->quantity}}</td>
                                                </tr>
                                            @endforeach


                                            </tbody>
                                        </table>

                                    </div>
                                    <!-- /.col -->

                                </div>
                                <div class="row invoice-info">

                                    <!-- /.col -->
                                    <div class="col-sm-4 invoice-col">
                                        <strong> ShippingInfo</strong>
                                        <address>
                                            <strong>{{$orders->first()->addresses->first_name}}</strong><br>
                                            {{$orders->first()->addresses->last_name}}<br>
                                            <strong>Phone: </strong>{{$orders->first()->addresses->phone}}<br>
                                        </address>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-4 invoice-col">
                                        <strong>Billing Info</strong>
                                        <address>
                                            <strong>{{$orders->first()->addresses->first_name}}</strong><br>
                                            {{$orders->first()->addresses->last_name}}<br>
                                            <strong>Phone: </strong>{{$orders->first()->addresses->phone}}<br>
                                            <br>
                                        </address>
                                    </div>
                                    <div class="row">

                                        <div class="col-xs-4">
                                            <!--<p class="lead"></p>-->

                                            <div class="table-responsive ">
                                                <table class="table order-table" id="info">
                                                    <tr>
                                                        <th style="width:50%">Subtotal:</th>
                                                        <td class="sub"></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Tax:</th>
                                                        <td class="vat">
                                                            %
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Shipping Cost:</th>
                                                        <td class="charge">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Total:</th>
                                                        <td class="grand"></td>
                                                    </tr>
                                                </table>
                                            </div>

                                        </div>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <hr>
                            </section>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->


                        <!-- ./end of dynamic content -->

                    </div>

                </div>
            </div>
        </div>
    </section>


    <section class="news_letter">
        <div class="container">
            <hr>
        </div>
        <div class="container">
            <div class=" p-5 mt-3 text-center">
                <div class="heading mb-3">
                    <h3>Be the first to get updates and special offers.</h3>
                </div>
                <div class="">
                    <form action="" class="d-flex justify-content-center pb-3 mb-3">
                        <input type="email" class="uk-input" placeholder="Sign up to our mailing list...">
                        <button class="checkout uk-button">Subscribe</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('script')
    <script>
        $(document).ready(function () {
            var val = [];
            var total = 0;
            $('#example .price').each(function () {
                val.push($(this).html());

            });
            for (var i = 0; i < val.length; i++) {
                total += val[i] << 0;
            }
            // $('#info .sub').html(total);
            $('#info .sub').each(function () {
                $(this).html(total);
            });
            var shipping = parseInt('{{$charge->first()->shipping_cost}}');
            console.log(shipping);
            var charge = $('#info .charge').html(shipping);
            var tax = parseInt('{{$charge->first()->tax}}') / 100 * total;
            var vat = $('#info .vat').html(tax);
            var cal = total + tax + shipping;
            console.log(cal);
            var grand = $('#info .grand').html('Rs ' + cal.toFixed(2));


        });
    </script>
@endpush