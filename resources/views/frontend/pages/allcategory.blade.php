@extends('frontend.master.master')
@section('content')




    <!-- The whole page content goes here -->

    <!-- all category -->
<section id="Allcategory-page">
    <div class="container">

        <div class="row all-category-row ">
            @foreach($cat as $value)
            <div class="col-lg-3 col-sm-6" >
                <div class="card all-category ">
                <h6 class="card-header all-category-header">{{$value->name}}</h6>
                    @foreach($value->subCategory as $child)
                        <ul class="all-category-list">
                    <li><a href="{{route('show-category',$child->id)}}" class="nav_a">{{$child->name}}</a></li>
                   @endforeach
                </ul>
                </div>
            </div>
            @endforeach
        </div>
    </div>

</section>

    <!-- footer -->
 @endsection