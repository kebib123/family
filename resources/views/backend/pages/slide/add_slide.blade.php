@extends('backend.master.master')
@section('content')
    <br>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Add Slides</h5>

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

                        <form method="POST" action="{{route('manage-slide')}}"
                              accept-charset="UTF-8" class=""
                              enctype="multipart/form-data">
                            @csrf

                            <div class="box box-default">
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div class="form-group ">
                                                <label for="name" class="control-label">Name *</label>
                                                <input class="form-control" name="slide_name" type="text" id="name">
                                            </div>
                                        </div>
                                        <div class="col-sm-3">

                                            <div class="form-group ">
                                                <label for="caption" class="control-label">Image</label>
                                                <input class="form-control" name="image" type="file"
                                                       id="caption">
                                            </div>
                                        </div>

                                        <div class="col-sm-3">
                                            <div class="form-group ">
                                                <label for="status" class="control-label">Status</label>
                                                <select class="form-control" id="status" name="status">
                                                    <option value="1">Enabled</option>
                                                    <option value="0">Disabled</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group ">
                                                <label for="status" class="control-label">Section</label>
                                                <select class="form-control" id="status" name="section">
                                                    <option value="1">Section 1</option>
                                                    <option value="2">Section 2</option>
                                                    <option value="3">Section 3</option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                            <div class="col-sm-3">
                                                <div class="form-group ">
                                                    <label for="name" class="control-label">Link *</label>
                                                    <input class="form-control" name="link" type="text" id="name">
                                                </div>
                                            </div>
                                        {{--<div class="col-sm-4">--}}
                                            {{--<div class="form-group ">--}}
                                                {{--<label for="product" class="control-label">Choose Your--}}
                                                    {{--Product*</label>--}}
                                                {{--<select class="form-control" name="product" id="product"--}}
                                                        {{--placeholder="Choose Product">--}}
                                                    {{--<option selected disabled>Please Choose Product</option>--}}
                                                    {{--@foreach($product as $value)--}}
                                                        {{--<option value="{{$value->id}}">{{$value->productname}}</option>--}}
                                                    {{--@endforeach--}}
                                                {{--</select>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="col-sm-4">--}}
                                            {{--<div class="form-group mb-none">--}}
                                                {{--<label for="parent" class="control-label">Choose Your--}}
                                                    {{--Category*</label>--}}
                                                {{--<select name="parent_id" id="parent" class="form-control select2">--}}
                                                    {{--<option value="0">Select Parent Category</option>--}}
                                                    {{--@foreach($categorycomp as $value)--}}
                                                        {{--<option value="{{$value->id}}">{{$value->name}}</option>--}}
                                                        {{--@include('backend.pages.category.category_dropdown',['category'=>$value])--}}
                                                    {{--@endforeach--}}


                                                {{--</select>--}}

                                            {{--</div>--}}
                                        {{--</div>--}}

                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary">Add Slide</button>


                                <!-- /.box-body -->
                            </div>
                            <!-- /.box -->
                        </form>

                    </div>

                    <!-- ./card-body -->

                    <!-- /.card-footer -->
                </div>
            </div>

            <div class="col-md-12">


                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">All Slides</h5>

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

                        <!-- /.row -->
                        <table id="user" class="table table-bordered table-sm">
                            <thead>
                            <tr>
                                <th>Sn</th>
                                <th><i class="fa fa-image"></i></th>
                                <th>Slide Name</th>
                                <th>Section</th>
                                <th>Status <br>
                                    <small>(Click to Unpublish)</small>
                                </th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($slides as $key => $value)
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td><img src="{{asset('images/slides/'.$value->image)}}" width="80px"></td>
                                    <td>{{$value->name}}</td>
                                    <td>{{$value->section}}</td>
                                    <td>
                                        <form method="post" action="{{route('slide-status')}}">
                                            <input type="hidden" name="status" value="{{$value->id}}">
                                            @csrf
                                            @if(($value->status)==0)
                                                <button class="btn btn-danger btn btn-sm" name="inactive"><i
                                                            class="fa fa-times"></i>
                                                </button>
                                            @else
                                                <button class="btn btn-success btn btn-sm" name="active"><i
                                                            class="fa fa-check"></i>
                                                </button>
                                            @endif

                                        </form>
                                    </td>
                                    <td>
                                        <a href="{{route('delete-slide',$value->id)}}"
                                           class="btn btn-sm btn btn-danger"><i class="fa fa-trash"></i> </a>
                                        <a href="{{route('edit-slide',$value->id)}}" class="btn btn-sm btn btn-primary"><i
                                                    class="fa fa-edit"></i> </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- ./card-body -->

                    <!-- /.card-footer -->
                </div>
            </div>
            <!-- /.col -->
        </div>
    </div>

@endsection
