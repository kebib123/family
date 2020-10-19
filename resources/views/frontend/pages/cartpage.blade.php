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
                                <div class="product-title" id="item_name">{{$value->name}}</div>
                                <p class="product-description">{!! $value->options->description !!}</p>
                            </div>
                            <div class="product-price" id="prc">{{$value->price}}</div>
                            <div class="product-quantity">
                                <input type="number" name="quantity[]" class="form-control" id="qty"
                                       value="{{$value->qty}}" min="1">
                            </div>
                            <div class="product-removal">
                                <a href="{{route('cart-destroy',$value->rowId)}}"
                                   class=" btn btn-danger remove-product ">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </div>
                            <div class="product-line-price" id="total">{{$value->price*$value->qty}}</div>
                        </div>

                    @endforeach

                    <button type="submit" class="btn btn-secondary">Update Cart
                    </button>
                </form>
                <div class="totals">
                    <div class="totals-item">
                        <label>Subtotal</label>
                        <div class="totals-value"
                             id="cart-subtotal">{{\Gloudemans\Shoppingcart\Facades\Cart::subtotal()}}</div>
                    </div>
                    <div class="totals-item">
                        <label>Tax (13%)</label>
                        <div class="totals-value" id="cart-tax">{{($charge->first()->tax)/100*$final}}</div>

                    </div>
                    <div class="totals-item">
                        <label>Shipping</label>
                        <div class="totals-value" id="cart-shipping">@if(Cart::content()->isnotEmpty()){{$charge->first()->shipping_cost}}@endif</div>
                    </div>
                    <div class="totals-item totals-item-total">
                        <label>Grand Total</label>
                        <div class="totals-value" id="cart-total">
                            @if(Cart::content()->isnotEmpty()){{$final+$charge->first()->shipping_cost+($charge->first()->tax)/100*$final}}@endif
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
@push('script')
    <script>
        $(document).ready(function () {

            /* Set rates + misc */
            var tax = parseInt('{{$charge->first()->tax}}');
            var taxRate = tax / 100;
            var shippingRate = parseInt('{{$charge->first()->shipping_cost}}');
            console.log(shippingRate);
            var fadeTime = 300;


            /* Assign actions */
            $('.product-quantity input').change(function () {
                updateQuantity(this);
            });

            $('.product-removal button').click(function () {
                removeItem(this);
            });


            /* Recalculate cart */
            function recalculateCart() {
                var subtotal = 0;

                /* Sum up row totals */
                $('.product').each(function () {
                    subtotal += parseFloat($(this).children('.product-line-price').text());
                });

                /* Calculate totals */
                var tax = subtotal * taxRate;
                var shipping = (subtotal > 0 ? shippingRate : 0);
                var total = subtotal + tax + shipping;

                /* Update totals display */
                $('.totals-value').fadeOut(fadeTime, function () {
                    $('#cart-subtotal').html(subtotal.toFixed(2));
                    $('#cart-tax').html(tax.toFixed(2));
                    $('#cart-shipping').html(shipping.toFixed(2));
                    $('#cart-total').html(total.toFixed(2));
                    if (total == 0) {
                        $('.checkout').fadeOut(fadeTime);
                    } else {
                        $('.checkout').fadeIn(fadeTime);
                    }
                    $('.totals-value').fadeIn(fadeTime);
                });
            }


            /* Update quantity */
            function updateQuantity(quantityInput) {
                /* Calculate line price */
                var productRow = $(quantityInput).parent().parent();
                var price = parseFloat(productRow.children('.product-price').text());
                var quantity = $(quantityInput).val();
                var linePrice = price * quantity;

                /* Update line price display and recalc cart totals */
                productRow.children('.product-line-price').each(function () {
                    $(this).fadeOut(fadeTime, function () {
                        $(this).text(linePrice.toFixed(2));
                        recalculateCart();
                        $(this).fadeIn(fadeTime);
                    });
                });
            }


            /* Remove item from cart */
            function removeItem(removeButton) {
                /* Remove row from DOM and recalc cart total */
                var productRow = $(removeButton).parent().parent();
                productRow.slideUp(fadeTime, function () {
                    productRow.remove();
                    recalculateCart();
                });
            }

        });

    </script>
@endpush
