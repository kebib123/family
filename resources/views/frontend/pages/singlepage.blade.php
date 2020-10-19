@extends('frontend.master.master')
@section('content')


    <!--  single page -->
    <section id="single_page">
        <div class="container">
            <section class="breadcrumbs ">
                <ul class="uk-breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Option</a></li>
                    <li><span>Active</span></li>
                </ul>
            </section>
            <form method="post" class="form-group" action="{{route('cart-item')}}"
                  enctype="multipart/form-data">
                <input type="hidden" name="id" value="{{$show->id}}">
                @csrf
                <div class="row">

                    <div class="col-md-6 col-sm-12">
                        <div class="large_device_img">
                            <div class="col-sm-2 col-md-2 col-lg-2 thumb_image_div">
                                <div id="design_gallery">
                                    <div class="thumb_images" id="gal1">

                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-10 col-md-9 col-lg-10 large_img_div" style="padding: 0px;">
                                <div class="large_img">
                                    <img name="image" src="{{url('images/products/'.$show->image)}}">
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-md-6 col-sm-12">
                        <div class="product_short_info">
                            <div class="heading">
                                <h3>{{$show->product_name}}</h3>
                            </div>
                            <div class="product_short_info-price">

                        <span class="actual-price">
                            {{$show->selling_price}}
                        </span>
                                <span class="discount-price text-muted">
                            {{$show->price}}
                        </span>
                            </div>
                            <hr>
                            <div class="product_short_info-desc">
                                {!! $show->description !!}
                            </div>
                            <div class="product_short_info-quantity">
                                <label for="quantity">Quantity</label>
                                <input type="number" name="quantity" value="1">
                            </div>
                            <div class="product_short_info-color">
                                <div class="heading">
                                    <h4>Colors</h4>
                                </div>

                                @foreach($colour as $value)
                                    <div class="radio-item">
                                        <input type="radio" id="{{$value}}" name="ritem" value="{{$value}}">

                                        <label for="{{$value}}" style="background-color:{{$value}}"></label>
                                    </div>
                                @endforeach


                            </div>

                            <div class="product_short_info-buttons">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn_add-to-cart">
                                        <button type="submit" class=" uk-button view-cart">Add to Cart</button>
                                    </div>
                                    @if(Auth::check())
                                        <div class=" btn_add-to-wishlist">
                                            <a class=" uk-button checkout"
                                               href="{{route('wishlist',[Auth::user()->id,$show->id])}}">Add To
                                                Wishlist</a>
                                        </div>
                                    @endif
                                </div>
                            </div>


                            <hr>
                            <div class="product_short_info-social_media">
                                <ul class="liststyle--none social-icons d-flex align-items-center flex-wrap">
                                    <li class="social-icon">
                                        Follow Us On:
                                    </li>
                                    <li class="social-icon ">
                                        <a class="facebook fab fa-facebook-square" href="{{$med->last()->facebook}}"
                                           target="_blank">

                                        </a>
                                    </li>
                                    <li class="social-icon">
                                        <a class="twitter fab fa-twitter-square" href="{{$med->last()->twitter}}"
                                           target="_blank">

                                        </a>
                                    </li>
                                    <li class="social-icon ">
                                        <a class="google-plus fab fa-google-plus-square" href="{{$med->last()->google}}"
                                           target="_blank">

                                        </a>
                                    </li>
                                    <li class="social-icon ">
                                        <a class="linked-in fab fa-instagram" href="{{$med->last()->instagram}}"
                                           target="_blank">

                                        </a>
                                    </li>

                                </ul>


                            </div>
                        </div>
                    </div>

                </div>
            </form>
            <div class="row">
                <div class="single-tour-tabs ">
                    <ul class="nav nav-tabs " role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" href="#tab-description" role="tab" data-toggle="tab"
                               aria-expanded="true">Description</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="#tab-information" role="tab" data-toggle="tab"
                               aria-expanded="false">Information</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="#tab-reviews" role="tab" data-toggle="tab"
                               aria-expanded="false">Reviews ({{count($review)}})</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane fade show active description " id="tab-description">
                            <table class="table  table-striped ">
                                <tbody>
                                <tr>
                                    <td colspan="60" style="font-weight: bold;">
                                        <p><span>Technical Speciﬁcation</span></p></td>
                                </tr>
                                @foreach($description as $value)
                                    <tr>
                                        <td colspan="18"><p><span>Title</span></p></td>
                                        <td colspan="42"><p><span>Description</span></p></td>
                                    </tr>
                                    <tr>
                                        <td colspan="18"><p><span>{{$value->title}}</span></p></td>
                                        <td colspan="42"><p><span>{{$value->description}}</span></p></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                        </div>
                        <div role="tabpanel" class="tab-pane fade itinerary_tab " id="tab-information">
                            {!! $information->first() !!}
                        </div>

                        <div role="tabpanel" class="tab-pane fade reviews " id="tab-reviews">
                            <div class="">

                                <form action="{{route('show-review')}}" method="post">
                                    <input type="hidden" name="id" value="{{$show->id}}">
                                    @csrf
                                    <div class="form-group">
                                        <label for="">
                                            Name
                                        </label>
                                        <input type="text" name="name" placeholder="Your Name" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="">
                                            Email
                                        </label>
                                        <input type="email" name="email" placeholder="Your Email" class="form-control">
                                    </div>


                                    <div class="form-group">
                                        <span class="review--heading">Add review</span>
                                        <fieldset class="rating">
                                            <input type="radio" id="star5" name="rating" value="5"><label class="full"
                                                                                                          for="star5"
                                                                                                          title="Awesome - 5 stars"></label>
                                            <input type="radio" id="star4" name="rating" value="4"><label class="full"
                                                                                                          for="star4"
                                                                                                          title="Pretty good - 4 stars"></label>

                                            <input type="radio" id="star3" name="rating" value="3"><label class="full"
                                                                                                          for="star3"
                                                                                                          title="Meh - 3 stars"></label>

                                            <input type="radio" id="star2" name="rating" value="2"><label class="full"
                                                                                                          for="star2"
                                                                                                          title="Kinda bad - 2 stars"></label>

                                            <input type="radio" id="star1" name="rating" value="1"><label class="full"
                                                                                                          for="star1"
                                                                                                          title="Sucks big time - 1 star"></label>

                                        </fieldset>
                                        <div class="clearfix"></div>
                                    </div>

                                    <label for="comment">write something</label>
                                    <textarea type="text" name="comment" class="form-control" id="comment"
                                              placeholder="write something" rows="3" cols="100">
                                    </textarea>
                                    <button class="btn-view_more float-right mt-1 " href=""> comment</button>
                                    <div class="clearfix"></div>
                                </form>

                                <div class="clearfix"></div>
                                @if($review->isnotempty())
                                    <p class="review-user">{{$average}} average based on {{count($review)}} reviews.</p>
                                @endif
                                <hr style="border:3px solid #f1f1f1; width:70%">
                                <div class="row review-rating">
                                    <div class="side">
                                        <div>5 star</div>
                                    </div>
                                    <div class="middle">
                                        <div class="bar-container">
                                            <div class="bar-{{count($fivestar)}}"></div>
                                        </div>
                                    </div>
                                    <div class="side right">
                                        <div>{{count($fivestar)}}</div>
                                    </div>
                                    <div class="side">
                                        <div>4 star</div>
                                    </div>
                                    <div class="middle">
                                        <div class="bar-container">
                                            <div class="bar-{{count($fourstar)}}"></div>
                                        </div>
                                    </div>
                                    <div class="side right">
                                        <div>{{count($fourstar)}}</div>
                                    </div>
                                    <div class="side">
                                        <div>3 star</div>
                                    </div>
                                    <div class="middle">
                                        <div class="bar-container">
                                            <div class="bar-{{count($threestar)}}"></div>
                                        </div>
                                    </div>
                                    <div class="side right">
                                        <div>{{count($threestar)}}</div>
                                    </div>
                                    <div class="side">
                                        <div>2 star</div>
                                    </div>
                                    <div class="middle">
                                        <div class="bar-container">
                                            <div class="bar-{{count($twostar)}}"></div>
                                        </div>
                                    </div>
                                    <div class="side right">
                                        <div>{{count($twostar)}}</div>
                                    </div>
                                    <div class="side">
                                        <div>1 star</div>
                                    </div>
                                    <div class="middle">
                                        <div class="bar-container">
                                            <div class="bar-{{count($onestar)}}"></div>
                                        </div>
                                    </div>
                                    <div class="side right">
                                        <div>{{count($onestar)}}</div>
                                    </div>
                                </div>
                                <div class="review-container">
                                    <h3 class="review-title">Reviews</h3>
                                    @foreach($review as $value)

                                        <article class="reviews" style="display: block;">
                                            <figure class="user-image">
                                                <img src="https://yt3.ggpht.com/-lASduCKYbGI/AAAAAAAAAAI/AAAAAAAAAAA/bCSffOUUASk/s48-c-k-no-mo-rj-c0xffffff/photo.jpg"
                                                     alt="">
                                            </figure>
                                            <div class="review-right">
                                                <span class="username">{{$value->name}}</span>&nbsp;<span
                                                        class="published">{{\Carbon\Carbon::now()}}</span>&nbsp;&nbsp;<span>I gave {{$value->star}}
                                                    star</span>
                                                <p>{{$value->products->comment}}</p>
                                            </div>
                                            <div class="clearfix"></div>
                                        </article>
                                    @endforeach
                                    <button class="btn show-more center"> show more</button>
                                    <div class="clearfix"></div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>

    </section>


@endsection