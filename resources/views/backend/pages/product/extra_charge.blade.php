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
    <h3 align="left">Extra Charges</h3>
    <hr>
        <form method="post" class="form-group" action="{{route('charges')}}" enctype="multipart/form-data">
            <input type="hidden" name="id" value="{{$charge->first()->id}}">
            @csrf

            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                    <div class="form-group">
                        <label for="formGroupExampleInput">Tax:(%)</label>
                        <input type="text" name="tax" class="form-control" id="formGroupExampleInput" value="{{$charge->first()->tax}}"
                               placeholder="enter tax rate">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Shipping Cost:</label>
                        <input type="text" name="shipping_cost" class="form-control" id="formGroupExampleInput" value="{{$charge->first()->shipping_cost}}"
                               placeholder="enter your shippping charge">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="-pull-right btn btn-primary btn-sm ">
                            <i class="fa fa-save"></i> Update
                        </button>

                    </div>
                </div>
            </div>
            </div>
            </div>
        </form>


@endsection