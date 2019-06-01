@extends('frontend.master.master')
@section('content')


    <!-- The whole page content goes here -->



    <!--  category -->
    <section id="product_request">
    <div class="container py-5 my-2 bg-white">
        <div class="row " >
            <div class="form-horizontal" >
                <legend>Request Product Form</legend>
                <form action="" method="post">
                    <div class="form-group ">
                        <label for="name">Name*</label>
                        <input type="text" name="name" id="name" placeholder="Enter your name" class="form-control">
                    </div>
                    <div class="form-group ">
                        <label for="email">Email*</label>
                        <input type="email" name="email" id="email" placeholder="Example@gmail.com" class="form-control">
                    </div>
                    <div class="form-group ">
                        <label for="phone">Phone*</label>
                        <input type="text" onkeypress="return event.charCode >= 48 &amp;&amp; event.charCode <= 57" class="form-control" name="phone" placeholder="Enter valid phone number (only Nepal)">
                    </div>
                    <div class="form-group ">
                        <label for="title">Product Title*</label>
                        <input type="text" name="title" id="title" placeholder="Enter product title" class="form-control">
                    </div>
                    <div class="form-group ">
                        <label for="pro_specification">Product Specification*</label>
                        <textarea name="product_specification" id="pro_specification" cols="100" rows="10" class="form-control" placeholder="Let us know the product specification"></textarea>
                    </div>
                    <div class="form-group ">
                        <label for="reference">Product Reference Link</label>
                        <input type="text" name="reference" id="reference" placeholder="Did you see this product in any social site or e-commerce site? (Optional)" class="form-control">
                    </div>
                    <div class="form-group ">
                        <label for="category">Category*</label>
                        <input type="text" name="category" id="category" placeholder="Enter product category" class="form-control">
                    </div>
                    <input type="submit" name="submit" value="Submit Request" class="uk-button view-cart">
                </form>
            </div>
        </div>
    </div>
</section>
    <!-- footer -->

    @endsection