@extends('backend.master.master')
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="container">
        <form method="post" class="form-group" action="{{route('edit-brand')}}" enctype="multipart/form-data">
            @csrf
          <input type="hidden" name="id" value="{{$brand->id}}">
            <div class="row">
                <div class="col-md-6">

                    <div class="card">
                        <div class="card-body">

                            <div class="form-group">
                                <label for="formGroupExampleInput">Brand Name:</label>
                                <input type="text" name="brand_name" class="form-control" id="formGroupExampleInput"
                                       placeholder="enter product name" value="{{$brand->brand_name}}">
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput">Company Name:</label>
                                <input type="text" name="company_name" class="form-control" id="formGroupExampleInput"
                                       placeholder="enter product price" value="{{$brand->company_name}}">
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput">Status:</label>
                                <select class="form-control" name="status">
                                    <option value="1">Enabled</option>
                                    <option value="0">Disabled</option>
                                </select>

                            </div>
                            <div class="form-group">
                                <label>Current Picture:</label>
                                <br>
                                <img src="{{url('images/brands/'.$brand->brand_image)}}" width="100">
                                <input type="file" name="image" class="form-control" id="formGroupExampleInput">
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-sm">
                                    <i class="fa fa-plus-circle"></i> Add Brand
                                </button>
                                <button type="reset" class="btn btn-danger btn-sm">
                                    <i class="fa fa-ban"></i> Reset
                                </button>

                            </div>

                        </div>
                    </div>
                </div>
        </form>
    </div>
    </div>
    @stop