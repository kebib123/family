@extends('backend.master.master')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Dashboard</h1>
                </div><!-- /.col -->
                {{--col -->--}}
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{count($cat)}}</h3>

                            <p>Total Categories</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="{{route('add-category')}}" class="small-box-footer">More info <i
                                    class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{count($order)}}</h3>

                            <p>Total Orders</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="{{route('show-order')}}" class="small-box-footer">More info <i
                                    class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>


                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{count($product)}}</h3>

                            <p>Products</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="{{route('show-product')}}" class="small-box-footer">More info <i
                                    class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{count($user)}}</h3>

                            <p>User Registrations</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="{{route('show-user')}}" class="small-box-footer">More info <i
                                    class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->

                <!-- ./col -->
            </div>
            <!--/.box -->
        </div>

        <!-- PRODUCT LIST -->
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Recently Added Products</h3>

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
                    <div class="card-body p-0">
                        <ul class="products-list product-list-in-card pl-2 pr-2">
                            @foreach($product as $value)
                                <li class="item">
                                    <div class="product-img">
                                        <img src="{{asset('images/products/'.$value->image)}}" alt="Product Image"
                                             class="img-size-50">
                                    </div>
                                    <div class="product-info">
                                        <a href="javascript:void(0)" class="product-title">{{$value->product_name}}
                                            <span class="badge badge-warning float-right">{{$value->selling_price}}</span></a>
                                        <span class="product-description">
                        {!! $value->description !!}
                      </span>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer text-center">
                        <a href="{{route('show-product')}}" class="uppercase">View All Products</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <p class="text-center">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Goal Completion</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-widget="collapse">
                                <i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-widget="remove">
                                <i class="fa fa-times"></i>
                            </button>
                        </div>
                    </div>
                </div>
                </p>

                <div class="progress-group">
                    Add Products to Cart
                    <span class="float-right"><b>{{count($product)}}</b>/100</span>
                    <div class="progress progress-sm">
                        <div class="progress-bar bg-primary" style="width:{{count($product)}}%"></div>
                    </div>
                </div>
                <!-- /.progress-group -->

                <div class="progress-group">
                    Complete Orders
                    <span class="float-right"><b>{{count($completed)}}</b>/100</span>
                    <div class="progress progress-sm">
                        <div class="progress-bar bg-danger" style="width: {{count($completed)}}%"></div>
                    </div>
                </div>

                <!-- /.progress-group -->
                <div class="progress-group">
                    <span class="progress-text">Pending Orders</span>
                    <span class="float-right"><b>{{count($pending)}}</b>/100</span>
                    <div class="progress progress-sm">
                        <div class="progress-bar bg-success" style="width:{{count($pending)}}%"></div>
                    </div>
                </div>

                <div class="progress-group">
                    <span class="progress-text">Cancelled Orders</span>
                    <span class="float-right"><b>{{count($cancel)}}</b>/100</span>
                    <div class="progress progress-sm">
                        <div class="progress-bar bg-success" style="width:{{count($cancel)}}%"></div>
                    </div>
                </div>
                <!-- /.progress-group -->
                <div class="progress-group">
                    Return Order
                    <span class="float-right"><b>{{count($return)}}</b>/100</span>
                    <div class="progress progress-sm">
                        <div class="progress-bar bg-warning" style="width: {{count($return)}}%"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header border-transparent">
                        <h3 class="card-title">Latest Orders</h3>

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
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table m-0">
                                <thead>
                                <tr>
                                    <th>Order ID</th>
                                    <th>Product</th>
                                    <th>Order Date</th>
                                    <th>Customer</th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($order as $value)
                                <tr>
                                    <td><a href="pages/examples/invoice.html">{{$value->id}}</a></td>
                                    <td>{{$value->product}}</td>
                                    <td>{{$value->created_at}} </td>
                                    <td>{{$value->users->name}} </td>
                                    <td>@if($value->addresses->status==0)
                                            <span class="badge badge-danger">Pending</span>
                                        @endif
                                        @if(($value->addresses->status==1))
                                            <span class="badge badge-success">Completed</span>
                                        @endif
                                        @if(($value->addresses->status==2))
                                            <span class="badge badge-secondary">Cancel</span>
                                        @endif
                                        @if(($value->addresses->status==3))
                                            <span class="badge badge-primary">Return</span>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix">
                        <a href="{{route('show-order')}}" class="btn btn-sm btn-secondary float-right">View All Orders</a>
                    </div>
                    <!-- /.card-footer -->
                </div>
            </div>
        </div>
    </section>
@stop

