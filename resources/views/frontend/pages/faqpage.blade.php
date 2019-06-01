@extends('frontend.master.master')
@section('content')


    <!-- The whole page content goes here -->


    <!--  category -->
    <section class="faqpage-container mt-2 mb">
    <div class="container">

        <div class="" id="accordion">
            @foreach($faq as $value)
            <div class="card ">
                <div class="card-header">
                    <h4 data-toggle="collapse" data-parent="#accordion" href="#collapse1" class=" expand">
                        <div class="right-arrow float-right">+</div>
                        <a href="#">{!! $value->title !!}</a>
                    </h4>
                </div>
                <div id="collapse1" class="panel-collapse collapse">
                    <div class="card-body">{!! $value->description !!}</div>
                </div>
            </div>
                @endforeach
        </div>
    </div>
</section>
    <!-- footer -->

@endsection