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
<h3 align="center">Add Contact</h3>
<hr>
<div class="container">
    <form method="post" class="form-group" action="{{route('add-contact')}}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="formGroupExampleInput">Toll Free:</label>
                    <input type="text" name="toll" class="form-control" id="formGroupExampleInput"
                           placeholder="enter toll free number">
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput">Contact Number:</label>
                    <input type="text" name="contact" class="form-control" id="formGroupExampleInput"
                           placeholder="enter your contact">
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput">Email:</label>
                    <input type="email" name="email" class="form-control" id="formGroupExampleInput" placeholder="enter your email">
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput">Address:</label>
                    <input type="text" name="address" class="form-control" id="formGroupExampleInput"
                           placeholder="enter your address">
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput">Website:</label>
                    <input type="text" name="website" class="form-control" id="formGroupExampleInput"
                           placeholder="enter your website link">
                </div>
                <div class="form-group">
                    <button type="submit" class="-pull-right btn btn-primary btn-sm ">
                        <i class="fa fa-save"></i> Submit
                    </button>

                </div>
            </div>
        </div>
    </form>
</div>

    @endsection