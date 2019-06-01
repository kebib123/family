@extends('frontend.master.master')
@section('content')

    <!-- The whole page content goes here -->
    <!--  register section -->
    <div id="form_register">

    <!-- You only need this form and the form-register.css -->

    <form class="form-register" method="post" action="{{route('add-user')}}">
        @csrf

        <div class="form-register-with-email">

            <div class="form-white-background">

                <div class="form-title-row">
                    <h1>Create an account</h1>
                </div>

                <div class="form-row">
                    <label>
                        <span>Name</span>
                        <input class="uk-input" type="text" name="name">
                    </label>
                </div>

                <div class="form-row">
                    <label>
                        <span>Email</span>
                        <input class="uk-input"  type="email" name="email">
                    </label>
                </div>
                <div class="form-row">
                    <label>
                        <span>Phone</span>
                        <input class="uk-input"  type="text" name="phone">
                    </label>
                </div>

                <div class="form-row">
                    <label>
                        <span>Password</span>
                        <input class="uk-input"  type="password" name="password">
                    </label>
                </div>


<div class="mb">
                    <label for=""> <input type="checkbox" class="uk-checkbox" name="checkbox" checked>
                   I agree to the <a href="#">terms and conditions</a></label>

</div>

                <div class="form-row">
                    <button type="submit" class="center uk-button view-cart">Register</button>
                </div>
                <a href="{{route('signin')}}" class="form-log-in-with-existing">Already have an account? Login here &rarr;</a>

            </div>


        </div>

        <div class="form-sign-in-with-social">

            <div class="form-row form-title-row">
                <span class="form-title">Sign in with</span>
            </div>

            <a href="#" class="form-google-button">Google</a>
            <a href="#" class="form-facebook-button">Facebook</a>
            <a href="#" class="form-twitter-button">Twitter</a>

        </div>

    </form>

</div>
    <!-- footer -->



@endsection