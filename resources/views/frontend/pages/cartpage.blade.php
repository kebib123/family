@extends('frontend.master.master')
@section('content')

    <!-- all category -->
    <section id="shopping-cart">
        <div class="container box-shadow mt-2 mb">
            <h1>Shopping Cart</h1>

            <div class="shopping-cart">

                <div class="column-labels">
                    <label class="product-image text-center">Image</label>
                    <label class="product-details">Product</label>
                    <label class="product-price">Price</label>
                    <label class="product-quantity">Quantity</label>
                    <label class="product-removal">Remove</label>
                    <label class="product-line-price">Total</label>
                </div>
                <form action="{{route('update-cart')}}" method="post">
                    @csrf

                    @foreach($cart_item as $value)
                        <input type="hidden" name="row[]" value="{{$value->rowId}}">
                        <div class="product">
                            <div class="product-image">
                                <img src="{{url('images/products/'.$value->options->image)}}">
                            </div>
                            <div class="product-details">
                                <div class="product-title">{{$value->name}}</div>
                                <p class="product-description">{!! $value->options->description !!}</p>
                            </div>
                            <div class="product-price">{{$value->price}}</div>
                            <div class="product-quantity">
                                <input type="number" name="quantity[]" class="form-control"
                                       value="{{$value->qty}}" min="1">
                            </div>

                            <div class="product-removal">
                                <a href="{{route('cart-destroy',$value->rowId)}}"
                                   class=" btn btn-danger remove-product ">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </div>
                            <div class="product-line-price"></div>
                        </div>

                    @endforeach

                    <button type="submit" class="btn btn-secondary">Update Cart
                    </button>
                </form>
                <div class="totals">
                    <div class="totals-item">
                        <label>Subtotal</label>
                        <div class="totals-value" id="cart-subtotal"></div>
                    </div>
                    <div class="totals-item">
                        <label>Tax (13%)</label>
                        <div class="totals-value" id="cart-tax"></div>
                    </div>
                    <div class="totals-item">
                        <label>Shipping</label>
                        <div class="totals-value" id="cart-shipping"></div>
                    </div>
                    <div class="totals-item totals-item-total">
                        <label>Grand Total</label>
                        <div class="totals-value" id="cart-total">
                        </div>
                    </div>
                </div>

                <a class="uk-button view-cart" href="{{route('home')}}"> <span uk-icon="icon:chevron-left"></span>Continue
                    Shopping</a>
                <a class="uk-button checkout" href="{{route('checkout')}}">Checkout</a>

                <a class="btn btn-danger " href="{{route('delete-cart')}}">Clear Cart</a>


                <div class="clearfix"></div>


            </div>
        </div>
    </section>

@endsection
