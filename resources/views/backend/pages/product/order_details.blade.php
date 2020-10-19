@extends('backend.master.master')
@section('content')

    <div class="container">
        <div class="card">
            <div class="card-header">

                <h2 class="page-header" style="padding-bottom: 25px; margin-top:0;">
                    <i class="fa fa-globe"></i> Order ID#{{$order->first()->id}}
                    <small style="display: inline-block">Ordered Date:{{$order->first()->created_at}} </small>

                </h2>


                <div class="card-tools">

                    <button type="button" class="btn btn-tool" data-widget="collapse">
                        <i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-widget="remove">
                        <i class="fa fa-times"></i>
                    </button>

                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <section>
                    <!-- title row -->

                    <!-- info row -->
                    <div class="row invoice-info">
                        <div class="col-sm-4 invoice-col">
                            <strong> Customer Info:</strong>
                            <address>
                                <strong>{{$address->users->name}}</strong><br>
                                {{$address->users->phone}}<br>
                                {{$address->users->email}}
                            </address>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 invoice-col">
                            <strong> ShippingInfo</strong>
                            <address>
                                <strong>{{$address->first_name}}</strong><br>
                                {{$address->last_name}} <br>
                                {{$address->address}}<br>
                                {{$address->city}}<br>

                                <strong>Phone: </strong>{{$address->phone}}<br>
                                <strong> ShippingMethod:</strong> Flat Rate(flateRate) <br>
                                <strong> Shipping Cost:</strong> $11.00 <br>
                            </address>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 invoice-col">
                            <strong>Billing Info</strong>
                            <address>
                                <strong>{{$address->first_name}}</strong><br>
                                {{$address->last_name}} <br>
                                {{$address->address}}<br>
                                {{$address->city}}<br>

                                <strong>Phone: </strong>{{$address->phone}}<br>
                            </address>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <!-- Table row -->
                    <div class="row">
                        <div class="col-xs-12 table-responsive">
                            <table id="example" class="table table-bordered table-sm">
                                <thead>
                                <tr>
                                    <th>Sn</th>
                                    <th><i class="fa fa-image"></i></th>
                                    <th>Product Name</th>
                                    <th>Quantity</th>
                                    <th>Unit Price</th>
                                    <th>Total</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($order as $key=> $value)
                                    <tr>

                                        <td>{{++$key}}</td>
                                        <td><img src="{{url('images/products/'. $value->image)}}" width="80px"></td>
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
                                        <td>{{$value->price}}</td>
                                        <td class="price">{{$value->price*$value->quantity}}</td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                        <!-- /.col -->

                    </div>
                    <hr>
                    <!-- /.row -->


                    <!-- /.col -->

                    <div class="col-xs-12">
                        <hr>
                        <p class="lead">Change Status:</p>

                        <div class="row">
                            <div class="col-md-8">
                                <form method="post" action="{{route('order-status')}}">
                                    <input type="hidden" name="id" value="{{$address->id}}">
                                    @csrf
                                    <div class="form-group">
                                        <label>Payment Status:</label>
                                        <select class="form-control select2" id="status_id" name="orders_status"
                                                style="width: 100%;">
                                            <option selected>--Select Order Status--</option>
                                            <option value="0">Pending</option>
                                            <option value="1">Completed</option>
                                            <option value="2">Cancel</option>
                                            <option value="3">Return</option>
                                        </select>
                                        <span class="help-block"
                                              style="font-weight: normal;font-size: 11px;margin-bottom: 0;">Choose status</span>
                                    </div>
                                    <div class="col-xs-12">
                                        <a href="http://demo0.laravelcommerce.com/admin/orders" class="btn btn-default"><i
                                                    class="fa fa-angle-left"></i> Back</a>
                                        <button type="submit" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i>
                                            Submit
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-xs-4">
                                <!--<p class="lead"></p>-->

                                <div class="table-responsive ">
                                    <table id="info" class="table order-table">
                                        <tr>
                                            <th style="width:50%">Subtotal:</th>
                                            <td class="sub"></td>
                                        </tr>
                                        <tr>
                                            <th>Tax:</th>
                                            <td class="vat"></td>
                                        </tr>
                                        <tr>
                                            <th>Shipping Cost:</th>
                                            <td class="charge"></td>
                                        </tr>
                                        <tr>
                                            <th>Total:</th>
                                            <td class="grand"></td>
                                        </tr>
                                    </table>
                                </div>

                            </div>
                        </div>


                    </div>
                    <!-- this row will not appear when printing -->

                        <!--<button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
                          <i class="fa fa-download"></i> Generate PDF
                        </button>-->

                        <br><br>
                        <hr>
                        <br>


                    <div class="col-xs-12">
                        <p class="lead">Order History</p>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Order Date</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{$order->first()->id}}</td>

                                    <td>{{$address->created_at}} </td>

                                    <td>@if($address->status==0)
                                            <span class="badge badge-danger">Pending</span>
                                        @endif
                                        @if(($address->status==1))
                                            <span class="badge badge-success">Completed</span>
                                        @endif
                                        @if(($address->status==2))
                                            <span class="badge badge-secondary">Cancel</span>
                                        @endif
                                        @if(($address->status==3))
                                            <span class="badge badge-primary">Return</span>
                                        @endif
                                    </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </section>
                <!-- /.col -->
            </div>
            <!-- /.row -->


            <!-- ./end of dynamic content -->

        </div>

    </div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function () {
            var val = [];
            var total = 0;
            $('#example .price').each(function () {
                val.push($(this).html());

            });
            console.log(val);
            for (var i = 0; i < val.length; i++) {
                total += val[i] << 0;
            }
            // $('#info .sub').html(total);
            $('#info .sub').each(function () {
                $(this).html(total);
            });


            var shipping = parseInt('{{$charge->first()->shipping_cost}}');
            var charge = $('#info .charge').html(shipping);
            var tax = parseInt('{{$charge->first()->tax}}') / 100 * total;
            var vat = $('#info .vat').html(tax);
            var cal = total + tax + shipping;
            console.log(cal);
            var grand = $('#info .grand').html('Rs ' + cal.toFixed(2));


        });
    </script>
@endpush