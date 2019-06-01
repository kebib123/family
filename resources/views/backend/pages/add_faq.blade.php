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
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h3 align="center">Add Faq </h3>
                <hr>
                <form method="post" class="form-group" action="{{route('add-faq')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-8">

                            <div class="form-group">
                                <label for="formGroupExampleInput2">Title</label>
                                <textarea id="title"
                                          name="title"
                                          class="form-control"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="formGroupExampleInput2">Description</label>
                                <textarea id="desc"
                                          name="description"
                                          class="form-control"></textarea>
                            </div>
                            <hr>

                            <div class="form-group">
                                <button type="submit" class="-pull-right btn btn-primary btn-sm ">
                                    <i class="fa fa-save"></i>Add
                                </button>

                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
