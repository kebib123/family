@extends('backend.master.master')
@section('content')


    <div class="col-md-7">
        <nav>
            <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Description</a>
                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Information</a>
                <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Reviews</a>
            </div>
        </nav>
        <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                <div class="form-group">
                    <label for="formGroupExampleInput2">Description</label>
                    <textarea id="title"
                              name="description"
                              class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="-pull-right btn btn-primary btn-sm ">
                        <i class="fa fa-save"></i>Save
                    </button>

                </div>
            </div>
            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                <div class="form-group">
                    <label for="formGroupExampleInput2">Information</label>
                    <textarea id="desc"
                              name="description"
                              class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="-pull-right btn btn-primary btn-sm ">
                        <i class="fa fa-save"></i>Save
                    </button>

                </div>
            </div>
            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                <div class="form-group">
                    <label for="formGroupExampleInput">Name:</label>
                    <input type="text" name="name" class="form-control" id="formGroupExampleInput"
                           placeholder="enter your name">
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput">Email:</label>
                    <input type="text" name="email" class="form-control" id="formGroupExampleInput"
                           placeholder="enter your email">
                </div>
                <div class="form-group">
                 <textarea id="desc" name="description"
                           class="form-control">Write something</textarea>
                    <button type="submit" class="-pull-right btn btn-primary btn-sm ">
                        <i class="fa fa-receipt"></i>Comment
                    </button>
                </div>
            </div>

        </div>
    </div>

@stop