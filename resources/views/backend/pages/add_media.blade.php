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
<div class="card-body">
    <div class="card-title">
        <h3 class="text-center">Update your Media</h3>
    </div>
    <hr>
    <form method="post" class="form-group" action="{{route('add-media')}}"
          enctype="multipart/form-data">
        <input type="hidden" value="{{$media->first()->id}}" name="id" >
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="formGroupExampleInput">Facebook</label>
                    <input type="text" name="facebook" class="form-control"
                           id="formGroupExampleInput" value="{{$media->first()->facebook}}"
                           placeholder="Facebook link here..">
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput">Gmail</label>
                    <input type="text" name="google" class="form-control"
                           id="formGroupExampleInput" value="{{$media->first()->google}}"
                           placeholder="Gmail link here..">
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput">Twitter</label>
                    <input type="text" name="twitter" class="form-control"
                           id="formGroupExampleInput" value="{{$media->first()->twitter}}"
                           placeholder="Twitter link here..">
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput2">Instagram</label>
                    <input type="text" name="instagram" class="form-control"
                           id="formGroupExampleInput" value="{{$media->first()->instagram}}"
                           placeholder="Instagram link here..">
                </div>
                <div class="form-group">
                    <button type="submit" class="-pull-right btn btn-primary btn-sm ">
                        <i class="fa fa-save"></i> Update
                    </button>

                </div>
            </div>
        </div>
    </form>
</div>
@endsection