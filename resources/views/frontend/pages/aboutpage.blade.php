@extends('frontend.master.master')
@section('content')



    <!-- header -->
    <!--  category -->
    <section  id="about-about">
    <div class="container">
        <div class="card p-5 ">
    <h1 class="text-center ">- Our Mission -</h1>
    {!! $about->last()->mission !!}
    <h2 class="text-center">About</h2>
    <div class="text-justify mx-auto" style="max-width: 74rem;">
        {!!$about->last()->about  !!}
    </div>
    </div>
    </div>
</section>
    <!-- footer -->

@endsection