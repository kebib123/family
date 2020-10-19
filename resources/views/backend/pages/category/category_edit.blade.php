@extends('backend.master.master')
@section('content')
    <form method="post" class="form-group" action="{{route('edit-category')}}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{$edit_cat->id}}">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <!-- general form elements -->
                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Edit Category</h3>
                            </div>

                            <!-- form start -->
                            <div class="box-body">
                                <div class="form-group">
                                    <input class="form-control" placeholder="Name" name="name" type="text"
                                           value="{{$edit_cat->name}}">

                                </div>
                                <div class="form-group mb-none">
                                    <select name="parent_id" id="parent" class="form-control select2">
                                        <option value="0">Select Parent Category</option>
                                        @foreach($cat as $value)
                                            <option @if($edit_cat->parent_id==$value->id) selected
                                                    @endif value="{{$value->id}}">{{$value->name}}</option>
                                            @include('backend.pages.category.category_dropdown',['category'=>$value])

                                        @endforeach
                                    </select>

                                </div>

                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer">
                                <input class="btn btn-danger btn-xs pull-right" type="submit" value="Save">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- /.box -->
    </form>
    </div>
@endsection