{{$category->name}}@extends('frontend.master.master')
@section('content')

    <!-- The whole page content goes here -->
    <!--  category -->
    <section id="category-filter">
        <div class="container">
            <div class="row">
                <div class=" col-lg-2 col-md-3 col-sm-12  ">
                    <aside class="left__side mb mt-3">

                        <ul uk-accordion="multiple: true">
                            <li class="uk-open">
                                <a class="uk-accordion-title" href="#"><h5> Category</h5></a>
                                <div class="uk-accordion-content">
                                    <div class="scrollbar   mCustomScrollbar">
                                        <ul>
                                            <li class="category-list"><a class="link-category"
                                                                         href="{{route('show-category',$abc->id)}}">{{$abc->name}}
                                                </a></li>
                                            @foreach($cat_list as $value)
                                                <li class="category-list"><a class="link-category"
                                                                             href="{{route('show-category',$value->id)}}">-{{$value->name}}
                                                    </a></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li class="">
                                <a class="uk-accordion-title" href="#"><h5> Price</h5></a>
                                <div class="uk-accordion-content">
                                    <div class="price-list ">


                                        <form class="">
                                            <p class="">Max Price: <span class="uk-badge  " id="rangeValue"
                                                                         placeholder=""
                                                                         style="background-color: #e6191a">100</span>
                                            </p>
                                            <input id="range" class="item_filter max_price uk-range " type="range" value="" min="100"
                                                   max="10000" step="1"
                                                   oninput="document.getElementById('rangeValue').innerHTML = this.value">
                                        </form>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <a class="uk-accordion-title" href="#"><h5> Brand</h5></a>
                                <div class="uk-accordion-content brand__filter">
                                    @foreach($brand as $value)
                                        <form>
                                            <label><input class="item_filter brand uk-checkbox"
                                                          value="{{$value->brand_name}}" type="checkbox">{{$value->brand_name}}</label>

                                        </form>
                                    @endforeach
                                </div>
                            </li>
                            <li>
                                <a class="uk-accordion-title" href="#"><h5> Size</h5></a>
                                <div class="uk-accordion-content brand__filter">
                                    <form>
                                        <label><input class="item_filter size uk-checkbox" value="small" type="checkbox"> Small</label>
                                        <label><input class="item_filter size uk-checkbox" value="medium" type="checkbox"> Medium</label>
                                        <label><input class="item_filter size uk-checkbox" value="large" type="checkbox"> Large</label>
                                        <label><input class="item_filter size uk-checkbox" value="xl" type="checkbox"> XL</label>
                                        <label><input class="item_filter size uk-checkbox" value="x-x-l" type="checkbox"> XXL</label>
                                        <label><input class="item_filter size uk-checkbox" value="x-x-x-l" type="checkbox"> XXXL</label>


                                    </form>
                                </div>
                            </li>
                        </ul>

                    </aside>

                </div>
                <div class=" col-lg-10 col-md-9 box-shadow-xy">

                    <div class="d-flex align-items-center justify-content-between">
                        <div class="Name__of__category mt-2">
                            <div class="heading d-flex">
                                <h3>{{$abc->name}} </h3><span class="text-muted">(showing 1-40 products)</span>
                            </div>

                        </div>
                        <div class="product_sort_by ">
                            <div class="d-flex align-items-center">
                                <div class="heading">
                                    <h3>Sort by:</h3>

                                </div>
                                <select name="" class="item_sort uk-select" style="width: 200px">
                                    <option selected="selected" value="">--Select--</option>
                                    <option class="newproduct" value="new">New</option>
                                    <option class="price" value="price">Price</option>
                                    <option class="newpopular" value="popular">Popular</option>


                                </select>
                            </div>

                        </div>
                    </div>
                    <div class="product-category white-product" id="filter_id">
                        @foreach($pro as $value)

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

                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- footer -->




@endsection
@push('script')
    <script>
        $(document).ready(function () {
            $('.item_filter').click(function (e) {
                brand = multilple_values('brand');
                size=multilple_values('size');
                console.log(size);
                max_price=$('.max_price').val();

                $.ajax({
                    url: document.URL,
                    type: 'get',
                    data: {
                        brand: brand,
                        size:size,
                        max_price:max_price,
                    },
                    success:function (result) {
                        $('#filter_id').replaceWith($('#filter_id')).html(result);
                    }
                });


            });
            $('.item_sort').change(function (e) {
                var val = $(this).find(':checked').val();
                console.log(val);

                $.ajax({
                    url: document.URL,
                    type: 'get',
                    data: {
                        value: val,
                    },
                    success: function (result) {
                        $('#filter_id').replaceWith($('#filter_id')).html(result);
                    }
                });

            })
        });


        function multilple_values(inputclass) {
            var val = new Array();
            $("." + inputclass + ":checked").each(function () {
                val.push($(this).val());
            });
            return val;

        }
    </script>

@endpush
