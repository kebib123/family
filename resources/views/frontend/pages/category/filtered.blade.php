@foreach($filter as $value)

    <article class="product instock sale purchasable">
        <div class="product-wrap">
            <div class="product-top">
                <span class="product-label discount">new</span>

                <figure>
                    <a href="{{route('show-products',$value->id)}}">
                        <div class="product-image">
                            <img width="320" height="320"
                                 src="{{url('images/products/'.$value->image)}}"
                                 class="attachment-shop_catalog size-shop_catalog" alt="">
                        </div>
                    </a>
                </figure>


            </div>
            <div class="product-description">

                <div class="product-meta">
                    <div class="title-wrap">
                        <p class="product-title">
                            <a href="{{route('show-products',$value->id)}}">{{$value->product_name}}</a>
                        </p>
                    </div>
                </div>
                <div class="d-flex align-items-center justify-content-between">
                    <div class="product_price">
                        <div class="product_price-actual">
                            {{$value->selling_price}}
                        </div>
                        <div class="product_price-discount">
                                                 <span class="line-through">
                                                     {{$value->price}}
                                                 </span>
                            <span>{{$value->discount_percentage}}</span><span>%</span>
                        </div>
                    </div>
                    <div class="product_cart">
                        <a href="javascript:void(0)">
                            <ion-icon name="cart" uk-tooltip=" Add to Cart"></ion-icon>
                        </a></div>
                </div>
            </div>
        </div>
    </article>
@endforeach
