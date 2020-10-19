@extends('frontend.master.master')
@section('content')
    <blockquote>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">

                        <form class="form-group" method="POST"
                              id="payment-form"
                              action="{!! \Illuminate\Support\Facades\URL::to('paypal') !!}" >
                            {{ csrf_field() }}
                            <h2 >Payment Form</h2>
                            <label ><b>Enter Amount</b></label>
                            <input class="form-control" id="amount" type="text" name="amount"></p>
                            <hr>
                            <button class="btn btn-sm">Pay with PayPal</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </blockquote>


@endsection