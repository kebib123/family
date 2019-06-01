@extends('backend.master.master')
@section('content')
    <br>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Update Your Slides</h5>

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

                        <form method="POST" action="{{route('edit-slide')}}"
                              accept-charset="UTF-8" class=""
                              enctype="multipart/form-data">
                            <input type="hidden" name="id" value="{{$slide->id}}">

                            @csrf

                            <div class="col col-md-12">
                                <label class="">Current Slide Image:</label>
                                <div class="container">
                                    <div class="round-img">
                                        <a href="#"><img class="fa-times-rectangle"
                                                         src="{{url('images/slides/'.$slide->image)}}"
                                                         width="600px"
                                                         alt=""></a>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="box box-default">
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div class="form-group ">
                                                <label for="name" class="control-label">Name *</label>
                                                <input class="form-control" name="slide_name"
                                                       value="{{$slide->name}}" type="text" id="name">
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
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div class="form-group ">
                                                <label for="name" class="control-label">Link *</label>
                                                <input class="form-control" name="link" type="text" id="name" value="{{$slide->link}}">
                                            </div>
                                        </div>
                                    <div class="col-sm-3">
                                        <div class="form-group ">
                                            <label for="status" class="control-label">Section</label>
                                            <select class="form-control" id="status" name="section">
                                                <option value="1" @if($slide->section=='1') selected @endif>Section 1</option>
                                                <option value="2" @if($slide->section=='2') selected @endif>Section 2</option>
                                                <option value="3" @if($slide->section=='3') selected @endif>Section 3</option>
                                            </select>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>


                            <button type="submit" class="btn btn-primary">Update Slide</button>
                                {{--<a href="{{route('slideshow')}}" class="btn btn-dark"><i class="fa fa-backward"></i>--}}
                                </a>

                        </form>
                                <!-- /.box-body -->
                            </div>
                            <!-- /.box -->

                    </div>

                    <!-- ./card-body -->

                    <!-- /.card-footer -->
                </div>
            </div>


            <!-- /.col -->
        </div>
    </div>

@endsection
