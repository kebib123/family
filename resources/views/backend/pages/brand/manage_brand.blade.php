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
        <form method="post" class="form-group" action="{{route('manage-brand')}}" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="col-md-6">

                    <div class="card">
                        <div class="card-body">

                            <div class="form-group">
                                <label for="formGroupExampleInput">Brand Name:</label>
                                <input type="text" name="brand_name" class="form-control" id="formGroupExampleInput"
                                       placeholder="enter brand name">
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput">Company Name:</label>
                                <input type="text" name="company_name" class="form-control" id="formGroupExampleInput"
                                       placeholder="enter company name">
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput">Status:</label>
                                <select class="form-control" name="status">
                                    <option value="1">Enabled</option>
                                    <option value="0">Disabled</option>
                                </select>

                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput">Image:</label>
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
<div class="col-md-12">
    <div class="card">
        <div class="card-body">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                    <tr>
                        <th>Image</th>
                        <th>Brand Name</th>
                        <th>Company Name</th>
                        <th>Status<br>
                        <small>(Click to change status)</small>
                        </th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($brand as $value)
                        <tr>
                            <td><img src="{{url('images/brands/'.$value->brand_image)}}" width="100px"></td>
                            <td>{{$value->brand_name}}</td>
                            <td>{{$value->company_name}}</td>
                            <td>
                                <form method="post" action="{{route('brand-status')}}">
                                    <input type="hidden" name="brand" value="{{$value->id}}">
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
                                <a class="btn btn-danger confirm"
                                   href="{{route('delete-brand',$value->id)}}"
                                   onclick="return confirm('Confirm Delete?')"><i
                                            class="fa fa fa-trash"></i>Delete </a>
                                <a class="display btn btn-outline-info"  href="{{route('edit-brand',$value->id)}}">
                                    <i class="fa fa-edit"></i>Edit</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
    </div>
</div>

    </div>

@stop