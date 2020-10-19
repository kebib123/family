@extends('frontend.master.master')
@section('title')
    <title>{{$title}}
        {{--| {{ getConfiguration('site_title') ? getConfiguration('site_title') : env('APP_NAME') }}{{ getConfiguration('site_description') ? ' - ' . getConfiguration('site_description') : '' }}</title>--}}
@endsection

@section('content')


    <div class="container">
        <div class="forgot">
            <div class="card" style=" max-width: 360px;
         margin: 1% auto;
         overflow-x: hidden;">
                <div class="middle_body p-3">
                    <form id="forgot_password" method="POST" action="{{route('change-password-action')}}"
                          novalidate="novalidate">
                        @csrf
                        <div class="msg">
                            Update your password
                        </div>
                        <hr>

                        <input  class="form-control" id="email" value="{{$email}}" name="email" type="hidden"/>

                        <div class="form-group mt-3">
                            <label>
                                <span>Password</span>
                                <input class="uk-input" type="password" name="password">
                            </label>
                        </div>
                        <div class="form-group mt-3">
                            <label>
                                <span>Password Confirmation</span>

                                <input class="uk-input" type="password" id="password-c" name="password_confirmation"
                                       placeholder="Enter Password Again"
                                       class="form-control ">
                            </label>
                        </div>



                        <button class="uk-button button-danger text-center" type="submit">CHANGE MY PASSWORD</button>
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
@endsection
@push('script')
    <script>
        @if(Session::has('success'))
        toastr.success("{{Session::get('success')}}");
        @endif
        @if(Session::has('error'))
        toastr.error("{{Session::get('error')}}");
        @endif
        @if ($errors->any())
        @foreach($errors->all() as $error)
        toastr.warning("{{ $error }}");
        @endforeach
        @endif
    </script>
@endpush