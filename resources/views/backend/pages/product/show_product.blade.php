@extends('backend.master.master')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">All products</h5>

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
                        <div class="row">
                            <div class="col-md-12">
                                <table id="example-1" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Category</th>
                                        <th>Brand</th>
                                        <th>Stock</th>
                                        <th>Actual Price</th>
                                        <th>Selling Price</th>
                                        <th>Deal of the day</th>
                                        <th>Created at</th>
                                        <th class="sorting-false">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($product as $key=>$value)
                                        <tr>
                                            <td>{{$value->id}}</td>
                                            <td><img src="{{asset('images/products/'.$value->image)}}"width="60px"></td>
                                            <td>{{$value->product_name}}</td>
                                            <td>{{$value->category_id != null ? $value->categories->name : '-'}}</td>
                                            <td>{{$value->brand_id !=null ? $value->brands->brand_name : '-'}}</td>
                                            <td>{{$value->stocks->stock_availability==1 ? 'In stock'.'('.$value->stocks->quantity.')':'Out of stock'}}</td>
                                            <td>{{$value->price}}</td>
                                            <td>{{$value->selling_price}}</td>
                                            <td>
                                                <form method="post" action="{{route('deal-status')}}">
                                                    <input type="hidden" name="deal" value="{{$value->id}}">
                                                    @csrf
                                                @if(($value->is_special)==0)
                                                <button class="btn btn-danger btn btn-sm" name="inactive"><i
                                                            class="fa fa-times"></i>
                                                </button>
                                            @else
                                                <button class="btn btn-success btn btn-sm" name="active"><i
                                                            class="fa fa-check"></i>
                                                </button>
                                            @endif
                                        </td>

                                            <td>{{\Illuminate\Support\Carbon::now()}}</td>
                                            <td>
                                                <a class="btn btn-outline-danger confirm"
                                                   href="{{route('delete-product',$value->id)}}"
                                                   onclick="return confirm('Confirm Delete?')"><i
                                                            class="fa fa fa-trash"></i></a>
                                                <a class="btn btn-sm btn-outline-primary confirm"
                                                   href="{{route('edit-product',$value->id)}}"
                                                ><i class="fa fa fa-edit"></i></a>
                                                <a class="btn btn-sm btn-outline-primary confirm"
                                                   href="{{route('edit-product',$value->id)}}"
                                                ><i class="fa fa fa-eye"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.row -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
