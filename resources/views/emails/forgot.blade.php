<h1>Hello, {{$user->name}}</h1>
<p>
    Please click the following reset button to reset your password

</p>
<a href="{{route('reset-password',[$user->email,$code])}}" class="btn btn-primary">Reset</a>