@extends('frontend.master.master')
@section('content')
    <!-- The whole page content goes here -->
    <div class="container">
        <div class="forgot">
            <div class="card" style=" max-width: 360px;
         margin: 1% auto;
         overflow-x: hidden;">
                <div class="middle_body p-3">
                    <form id="forgot_password" method="POST" novalidate="novalidate">
                        @csrf
                        <div class="msg">
                            Enter your email address that you used to register. We'll send you an email with your
                            username and a
                            link to reset your password.
                        </div>
                        <hr>
                        <div class="form-group mt-3">
                            <label class="control-label" for="email">
                                Email
                            </label>
                            <input class="form-control" id="email" name="email" type="text"/>
                        </div>


                        <button class="uk-button button-danger text-center" type="submit">RESET MY PASSWORD</button>
                        <br>
                        <hr>


                        <div class="text-center py-3">
                            <a href="{{route('home')}}" class="btn-view_more"> Go Home !</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- main footer or top footer -->
@stop