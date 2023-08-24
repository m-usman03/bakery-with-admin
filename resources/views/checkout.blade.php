@extends('layout.master')
@section("header")
<script src="https://js.stripe.com/v3/"></script>
@endsection
@section('content')
<section class="breadcrumbs-custom">
    <div class="parallax-container" data-parallax-img="images/breadcrumbs-bg.jpg">
        <div class="breadcrumbs-custom-body parallax-content context-dark">
            <div class="container">
                <h2 class="breadcrumbs-custom-title">Checkout</h2>
            </div>
        </div>
    </div>
    <div class="breadcrumbs-custom-footer">
        <div class="container">
            <ul class="breadcrumbs-custom-path">
                <li><a href="index.html">Home</a></li>
                <li><a href="grid-shop.html">Shop</a></li>
                <li class="active">Checkout</li>
            </ul>
        </div>
    </div>
</section>
<!-- Section checkout form-->
<form action="{{route('checkout.process')}}" method="POST" data-stripe-public-key="{{env('STRIPE_PUBLIC_KEY')}}" id="stripe-form">
@csrf
<section class="section section-sm section-first bg-default text-md-left">
    <div class="container">
        <div class="row row-50 justify-content-center">
        
            <div class="col-md-12 col-lg-12">
                <h3 class="font-weight-medium">Delivery Address</h3>
               
                    <div class="row row-30">
                        <div class="col-sm-6">
                            <div class="form-wrap">
                                <input class="form-input" id="checkout-first-name-2" type="text" name="first_name" value="{{ old('first_name') }}" required />
                                <label class="form-label" for="checkout-first-name-2">First Name</label>
                                @error('first_name')
                                  <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-wrap">
                                <input class="form-input" id="checkout-last-name-2" type="text" name="last_name" value="{{ old('last_name') }}" required/>
                                <label class="form-label" for="checkout-last-name-2">Last Name</label>
                                @error('last_name')
                                  <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                     
                        <div class="col-12">
                            <div class="form-wrap">
                                <input class="form-input" id="checkout-address-2" type="text" name="address" value="{{ old('address') }}" required />
                                <label class="form-label" for="checkout-address-2">Address</label>
                                @error('address')
                                  <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-wrap">
                                <input class="form-input" id="checkout-city-2" type="text" name="city" value="{{ old('city') }}" />
                                <label class="form-label" for="checkout-city-2">City/Town</label>
                                @error('city')
                                  <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-wrap">
                                <input class="form-input" id="checkout-email-2" type="email" name="email" value="{{ old('email') }}" required />
                                <label class="form-label" for="checkout-email-2">E-Mail</label>
                                @error('email')
                                  <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-wrap">
                                <input class="form-input" id="checkout-phone-2" type="text" name="phone" value="{{ old('phone') }}" />
                                <label class="form-label" for="checkout-phone-2">Phone</label>
                                @error('phone')
                                  <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
               
            </div>
        </div>
    </div>
</section>

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
                            <div class="table-cart-stepper">
                                <input class="form-input" type="number" data-zeros="true" value="{{ $item['quantity'] }}" min="1" max="1000" name="qty">
                            </div>
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
            <div class="col-md-10 col-lg-6 border">
                <h3 class="font-weight-medium">Card</h3>
                <div id="card-element" class="my-5"></div>
                <div id="card-errors" role="alert"></div>
            </div>
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
<button class="btn btn-primary btn-lg" type="submit">Pay</button>
</form>
@endsection
@section("scripts")
<script src="{{asset('js/checkout.js')}}"></script>
@endsection