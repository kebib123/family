@extends('frontend.master.master')
@section('content')

    <div id="edit_account_info" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">

                    <h4 class="modal-title" id="myModalLabel">Edit your account info</h4>
                </div>
                <form method="post" action="{{route('change-password')}}">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleInputPassword">Old-Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword" name="oldpass"
                                   placeholder="Old Password">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" name="newpassword"
                                   placeholder="Password">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword2">Re-Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword2"
                                   name="confirmpassword"
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
                                <a href="{{route('show-subscriber')}}" class="accordion-title" data-toggle="collapse"
                                   data-target="#collapseExample" aria-expanded="false" aria-selected="false">
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


            <div class="profile__section">
                <div class="row">
                    <div class="col-md-3 col-sm-12">
                        <div class="account--userInfo p-2">
                            <a href="javascript:void(0)" class="d-block ">
                                <span class="userInfo--name bold">{{Auth::user()->name}}</span><br>
                                <small class="userInfo--email data">{{Auth::user()->email}}</small>
                            </a>
                        </div>
                        <div class="grouplist tab d-none d-sm-block">
                            <ul class="liststyle--none">
                                <li><a href="javascript:void(0)" class="tabslinks"
                                       onclick="accountsettings(event, 'orders')"><i
                                                class="fas fa-book fa-2x mr-10"></i>My orders</a></li>
                                <li><a href="javascript:void(0)" class="tabslinks"
                                       onclick="accountsettings(event, 'address')"><i
                                                class="fas fa-address-card fa-2x mr-10"></i>Shipping addresses</a></li>
                                <li><a href="javascript:void(0)" class="tabslinks"
                                       onclick="accountsettings(event, 'wishlist')"><i
                                                class="fas fa-heart fa-2x mr-10"></i>wish lists</a></li>
                                <li><a href="javascript:void(0)" class="tabslinks"
                                       onclick="accountsettings(event, 'account')" id="defaultOpen"><i
                                                class="fas fa-edit fa-2x mr-10"></i>account settings</a></li>
                            </ul>
                        </div>


                        <div class="grouplist tab d-block d-sm-none">
                            <ul class="liststyle--none">
                                <li><a href="javascript:void(0)" class="tabslinks"
                                       onclick="accountsettings(event, 'orders')" title="orders"><i
                                                class="fas fa-book fa-2x mr-10"></i></a></li>
                                <li><a href="javascript:void(0)" class="tabslinks"
                                       onclick="accountsettings(event, 'address')" title="address"><i
                                                class="fas fa-address-card fa-2x mr-10"></i></a></li>
                                <li><a href="javascript:void(0)" class="tabslinks"
                                       onclick="accountsettings(event, 'wishlist')" title="wishlist"><i
                                                class="fas fa-heart fa-2x mr-10"></i></a></li>
                                <li><a href="javascript:void(0)" class="tabslinks"
                                       onclick="accountsettings(event, 'account')" id="defaultOpen" title="account"><i
                                                class="fas fa-edit fa-2x mr-10"></i></a></li>


                            </ul>
                        </div>


                    </div>

                    <div class="col-md-9 col-sm-12">

                        <div id="account" class="account-settings__container tabcontent">
                            <div class="row">
                                <div class="col-md-6 col-sm-12 ">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="card-title">
                                                <strong class="titles">Account Information</strong>
                                                <a class="pull-right link" href="javascript:void(0)" data-toggle="modal"
                                                   data-target="#edit_account_info"><i class="far fa-edit"></i> Edit</a>
                                            </div>
                                            <div class="panel-body">

                                                <ul class="liststyle--none">
                                                    <li><span class="mr-10 bold">Name:</span><span
                                                                class="userInfo--name">{{Auth::user()->name}}</span>
                                                    </li>
                                                    <li><span class="mr-10 bold">Password:</span><span
                                                                class="userInfo--password data">********</span></li>
                                                </ul>

                                            </div>

                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-6 col-sm-12 ">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="card-title">
                                                <strong class="titles">Personal Information</strong>
                                                <a class="pull-right link" href="javascript:void(0)" data-toggle="modal"
                                                   data-target="#edit_personal_info"><i class="far fa-edit"></i>
                                                    Edit</a>

                                            </div>
                                            <span class="para ">
                                                 <ul class="liststyle--none">
                                                    <li><span class="mr-10 bold">Name:</span><span9
                                                                class="userInfo--name">{{Auth::user()->name}}</span9></li>
                                                       <li><span class="mr-10 bold">Address:</span><span
                                                                   class="userInfo--username data">@if(\App\Model\Shipping::where('user_id','=',Auth::user()->id)->get()->isnotEmpty()) {{\App\Model\User::where('id','=',Auth::user()->id)->first()->defaultadd->city}} @endif</span>
                                                       </li>
                                                    <li><span class="mr-10 bold">Phone:</span><span
                                                                class="userInfo--gender data">@if(\App\Model\Shipping::where('user_id','=',Auth::user()->id)->get()->isNotEmpty()){{\App\Model\User::where('id','=',Auth::user()->id)->first()->defaultadd->mobile }}@endif</span>
                                                </ul>
                                            </span>
                                        </div>
                                    </div>

                                </div>


                            </div>
                        </div>

                        <div class="container orders__container tabcontent" id="orders">
                            <h3>My orders</h3>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>ORDER#</th>
                                        <th>DATE</th>
                                        <th>SHIP TO</th>
                                        <th>ORDER STATUS</th>
                                        <th>ORDER DETAILS</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($order as $key=>$value)
                                        <tr>
                                            <td>{{++$key}}</td>
                                            <td>{{$value->created_at}}</td>
                                            <td>{{$value->address}}</td>
                                            <td>@if($value->status==0)
                                                    <span class="badge badge-danger">Pending</span>
                                                @endif
                                                @if(($value->status==1))
                                                    <span class="badge badge-success">Completed</span>
                                                @endif
                                                @if(($value->status==2))
                                                    <span class="badge badge-secondary">Cancel</span>
                                                @endif
                                                @if(($value->status==3))
                                                    <span class="badge badge-primary">Return</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{route('orders',$value->id)}}"><i class="fa fa-eye"></i> </a>

                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="container wishlist__container tabcontent " id="wishlist">
                            <h3>My wishlist</h3>

                            <div class="table-responsive d-none d-sm-block">
                                <table class="table table-bordered">
                                    <tbody>
                                    @foreach($items as $value)
                                        <tr>
                                            <td style="width:100px;">
                                                <div class="wishlist-product-img">
                                                    <a href="" class="d-block">

                                                        <img src="{{url('images/products/'.$value->products->image)}}"
                                                             alt="">
                                                    </a>
                                                </div>
                                            </td>
                                            <td>
                                                <a href="" class="link">{{$value->products->product_name}}</a>
                                            </td>
                                            <td class="price__container">
                                                <span class="price d-block">{{$value->products->selling_price}}</span>
                                            </td>
                                            <td>
                                                <a class="button--cancel"
                                                   href="{{route('show-products',$value->product_id)}}"><i
                                                            class="fas fa-shopping-cart"></i></a>

                                                <a class="button--cancel"
                                                   href="{{route('delete-wishlist',$value->id)}}"><i
                                                            class="fas fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>


                            <div class="mobile-responsive-wishlist d-block d-sm-none">
                                <div class="table-row table-content">
                                    <div class=" wishlist-product-img">
                                        <a class="product-image"
                                           href="https://www.letstango.com/product/apple-mac-mini-mgen2"
                                           title="Apple Mac Mini MGEN2">
                                            <img src="https://www.letstango.com/media/catalog/product/cache/1/small_image/113x113/9df78eab33525d08d6e5fb8d27136e95/5/4/547ad3689186f5.60278948.jpg"
                                                 width="113" height="113" alt="Apple Mac Mini MGEN2">
                                        </a>
                                    </div>
                                    <div class="table-cell">
                                        <a href="https://www.letstango.com/product/apple-mac-mini-mgen2"
                                           class="link base-xs-large-buffer" title="Apple Mac Mini MGEN2">Apple Mac Mini
                                            MGEN2</a>
                                    </div>
                                    <div class="table-cell">
                                        <div class="cart-cell">
                                            <div class="price-box">
                                                <p class="special-price">
                                                    <span class="price-label">Price</span>
                                                    <span class="price" id=""> 2,399.00</span>
                                                </p>

                                            </div>

                                            <div class="add-to-cart-alt">
                                                <a href="#" class="btn btn-primary ">Add to Cart</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="table-cell">
                                        <a href="" title="Remove Item">
                                            <i class="fas fa-times"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="container address__container tabcontent" id="address">
                            <h3>Address settings</h3>
                            <form method="post" action="{{route('shipping')}}">
                                @csrf
                                <div class="form-group">
                                    <label for="acc_firstName">First Name *</label>
                                    <input type="text" class="form-control"
                                           value="@if(Auth::check() && \App\Model\Shipping::where('user_id','=',Auth::user()->id)->get()->isnotEmpty()) {{\App\Model\User::where('id','=',Auth::user()->id)->first()->defaultadd->first_name}} @endif"
                                           name="fname" required>
                                </div>
                                <div class="form-group">
                                    <label for="acc_lastName">Last Name *</label>
                                    <input type="text" class="form-control" name="lname"
                                           value="@if(Auth::check() && \App\Model\Shipping::where('user_id','=',Auth::user()->id)->get()->isnotEmpty()) {{\App\Model\User::where('id','=',Auth::user()->id)->first()->defaultadd->last_name}} @endif"
                                           required>
                                </div>
                                <div class="form-group">
                                    <label for="country">Country *</label>
                                    <input type="text" class="form-control" name="country"
                                           value="@if(Auth::check() && \App\Model\Shipping::where('user_id','=',Auth::user()->id)->get()->isnotEmpty()) {{\App\Model\User::where('id','=',Auth::user()->id)->first()->defaultadd->country}} @endif"
                                           required>
                                </div>
                                <div class="form-group">
                                    <label for="city">City *</label>
                                    <input type="text" class="form-control" name="city"
                                           value="@if(Auth::check() && \App\Model\Shipping::where('user_id','=',Auth::user()->id)->get()->isnotEmpty()) {{\App\Model\User::where('id','=',Auth::user()->id)->first()->defaultadd->city}} @endif"
                                           required>
                                </div>
                                <div class="form-group">
                                    <label for="acc_streetName">Street Name/No *</label>
                                    <input type="text" class="form-control" name="street"
                                           value="@if(Auth::check() && \App\Model\Shipping::where('user_id','=',Auth::user()->id)->get()->isnotEmpty()) {{\App\Model\User::where('id','=',Auth::user()->id)->first()->defaultadd->street}} @endif"
                                           required>
                                </div>
                                <div class="form-group">
                                    <label for="nearestLandmark">Nearest Landmark *</label>
                                    <input type="text" class="form-control" name="landmark"
                                           value="@if(Auth::check() && \App\Model\Shipping::where('user_id','=',Auth::user()->id)->get()->isnotEmpty()) {{\App\Model\User::where('id','=',Auth::user()->id)->first()->defaultadd->landmark}} @endif"
                                           required>
                                </div>
                                <div class="form-group">
                                    <label for="locationType">Location Type *</label>
                                    <select class="form-control" name="location" required>
                                        <option value="0">Home</option>
                                        <option value="1">Business</option>
                                    </select>
                                </div>
                                <div class="form-group">

                                    <label for="mobile">Mobile</label>
                                    <div class="input-group mb-2">
                                        <input type="text" class="form-control" name="mobile"
                                               value="@if(Auth::check() && \App\Model\Shipping::where('user_id','=',Auth::user()->id)->get()->isnotEmpty()) {{\App\Model\User::where('id','=',Auth::user()->id)->first()->defaultadd->mobile}} @endif""
                                        required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="landline">Landline *</label>
                                    <div class="input-group mb-2">
                                        <input type="text" class="form-control" name="landline"
                                               value="@if(Auth::check() && \App\Model\Shipping::where('user_id','=',Auth::user()->id)->get()->isnotEmpty()) {{\App\Model\User::where('id','=',Auth::user()->id)->first()->defaultadd->landline}} @endif""
                                        required>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary">Submit</button>
                                <button type="submit" class="btn btn-danger">Cancel</button>
                            </form>
                        </div>


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
                    <form action="{{route('show-subscriber')}}" class="d-flex justify-content-center pb-3 mb-3"
                          method="post">
                        @csrf
                        <input type="email" name="email" class="uk-input" placeholder="Sign up to our mailing list...">
                        <button class="checkout uk-button">Subscribe</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

