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
        <form method="post" class="form-group" action="{{route('add-category')}}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <!-- general form elements -->
                            <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Add New</h3>
                                </div>

                                <!-- form start -->
                                <div class="box-body">
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Name" name="name" type="text">

                                    </div>

                                    <div class="form-group mb-none">
                                        <select name="parent_id" id="parent" class="form-control select2">
                                            <option value="0">Select Parent Category</option>
                                            @foreach($cat as $value)
                                                <option value="{{$value->id}}">{{$value->name}}</option>
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



        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="box-header">
                        <h3 class="box-title">All Categories</h3>
                    </div>
                    <div class="box-body">
                        <table id="example" class="table table-bordered table-striped datatable">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Parent</th>
                                <th>Created at</th>
                                <th class="sorting-false">Action</th>
                            </tr>
                            </thead>
                            @foreach($abc as $key=>$value)
                            <tbody>
                             <td>{{$value->id}}</td>
                             <td>{{$value->name}}</td>
                             <td>{{App\Model\Category::where('id','=',$value->parent_id)->first() ? App\Model\Category::where('id','=',$value->parent_id)->first()->name : '-'}}</td>
{{--                             <td>{{\Illuminate\Support\Carbon::now()}}</td>--}}
                             <td>{{$value->parent_id}}</td>
                            <td>
                                <a class="btn btn-danger confirm"
                                   href="{{route('delete-category',$value->id)}}"
                                   onclick="return confirm('Confirm Delete?')"><i
                                            class="fa fa fa-trash"></i>Delete </a>
                                <a class="btn btn-outline-primary confirm"
                                   href="{{route('edit-category',$value->id)}}"
                                   ><i class="fa fa fa-edit"></i>Edit </a>
                            </td>
                            </tbody>
                            @endforeach
                            <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th class="sorting-false">Parent</th>
                                <th>Created at</th>
                                <th class="sorting-false">Action</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.box-body -->

                    <!-- /.box -->
                </div>
            </div>
        </div>
    </div>

    </div>
@stop

@push('scripts')
    <script>
    $('.datatable').DataTable({

});
    </script>
@endpush
