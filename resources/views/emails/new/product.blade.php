@component('mail::message')
    # New Product on our list {!!$productname !!}

    Check to see our New Products
    {!!$productdescription !!}
    @component('mail::button', ['url' => 'http://localhost:8000/Category/show-products/'.$productid])

        View Product

    @endcomponent
    Thanks<br>
@endcomponent
