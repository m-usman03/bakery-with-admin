@extends('layout.master')
@section('content')
<section class="breadcrumbs-custom">
    <div class="parallax-container" data-parallax-img="images/breadcrumbs-bg.jpg">
        <div class="breadcrumbs-custom-body parallax-content context-dark">
            <div class="container">
                <h2 class="breadcrumbs-custom-title">Confirm</h2>
            </div>
        </div>
    </div>
    <div class="breadcrumbs-custom-footer">
        <div class="container">
            <ul class="breadcrumbs-custom-path">
                <li><a href="index.html">Home</a></li>
                <li><a href="grid-shop.html">Shop</a></li>
                <li class="active">Confirm</li>
            </ul>
        </div>
    </div>
</section>
<!-- Section checkout form-->
<h4>Order Recieved Invoice is sent to your email</h4>
<!-- Shopping Cart-->
<section class="section section-sm bg-default text-md-left">
    <div class="container">
        <h3 class="font-weight-medium">Your shopping cart</h3>
        <div class="table-custom-responsive">
            <table class="table-custom table-cart">
                <thead>
                    <tr>
                        <th>Product name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $totalPrice = 0;
                    @endphp

                    @foreach($cartItems as $item)
                    @php
                    $itemTotal = $item['price'] * $item['quantity']; 
                    $totalPrice += $itemTotal; 
                    @endphp
                    <tr>
                        <td>
                            <div class="prod-card-inner"><a class="table-cart-figure" href="{{ route('product.detail', $item['slug']) }}"><img src="{{ $item['thumbnail'] }}" alt="{{ $item['name'] }}" width="146" height="132" /></a><a class="table-cart-link" href="{{ route('product.detail', $item['slug']) }}">{{ $item['name'] }}</a></div>
                        </td>
                        <td>${{ $item['price'] }}</td>
                        <td>
                        {{ $item['quantity'] }}
                        </td>
                        <td>${{ $itemTotal }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
      
    </div>
</section>


<!-- Section Payment-->
<section class="section section-sm section-last bg-default text-md-left">
    <div class="container">
        <div class="row row-50 justify-content-center">
           
            <div class="col-md-10 col-lg-6">
                <h3 class="font-weight-medium">Cart total</h3>
                <div class="table-custom-responsive">
                    <table class="table-custom table-custom-primary table-checkout">
                        <tbody>
                            <tr>
                                <td>Cart Subtotal</td>
                                <td>${{ $totalPrice }}</td>
                            </tr>
                            <tr>
                                <td>Shipping</td>
                                <td>Free</td>
                            </tr>
                            <tr>
                                <td>Total</td>
                                <td>${{ $totalPrice }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection
@section("scripts")
<script src="{{asset('js/checkout.js')}}"></script>
@endsection