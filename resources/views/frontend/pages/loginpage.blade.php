@extends('frontend.master.master')
@section('content')
    <!-- The whole page content goes here -->
    <!--  login section -->
    <section id="form_login">
    <form class="form-login" method="post" action="{{route('signin')}}">
        @csrf

        <div class="form-log-in-with-email">

            <div class="form-white-background">

                <div class="form-title-row">
                    <h1>Log in</h1>
                </div>

                <div class="form-row">
                    <label>
                        <span>Email</span>
                        <input type="email" name="email">
                    </label>
                </div>

                <div class="form-row">
                    <label>
                        <span>Password</span>
                        <input type="password" name="password">
                    </label>
                </div>

                <div class="form-row">
                    <button type="submit" class="uk-button view-cart center">Log in</button>
                </div>
                <a href="{{route('forgot')}}" class="form-forgotten-password">Forgotten password &middot;</a>
                <a href="{{route('register')}}" class="form-create-an-account">Create an account &rarr;</a>

            </div>


        </div>

        <div class="form-sign-in-with-social">

            <div class="form-row form-title-row">
                <span class="form-title">Sign in with</span>
            </div>

            <a href="{{route('gmail-signin','google')}}" class="form-google-button">Google</a>
            <a href="{{ url('/login/facebook') }}" class="form-facebook-button">Facebook</a>

        </div>

    </form>

</section>
    <!-- footer -->


@endsection