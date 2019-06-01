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
    <!-- Breadcrumbs-->
    <div class="col-md-12">
     <div class="card">
         <div class="card-body">
    <h3 align="center">Update About Page</h3>
             <hr>
    <form method="post" class="form-group" action="{{route('edit-about')}}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{$about->first()->id}}">

        <div class="row">
            <div class="col-md-8">

                <div class="form-group">
                    <label for="formGroupExampleInput2">Our Mission</label>
                    <textarea id="title"
                              name="mission"
                              class="form-control">{{ $about->first()->mission }}</textarea>
                </div>

                <div class="form-group">
                    <label for="formGroupExampleInput2">About</label>
                    <textarea id="desc"
                              name="about"
                              class="form-control">{{ $about->first()->about }}</textarea>
                </div>
                <hr>


                <div class="form-group">
                    <button type="submit" class="-pull-right btn btn-primary btn-sm ">
                        <i class="fa fa-save"></i>Update
                    </button>

                </div>
            </div>
        </div>
    </form>
    </div>
     </div>
     </div>

@endsection