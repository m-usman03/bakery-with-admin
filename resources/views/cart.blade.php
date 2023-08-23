@extends('layout.master')
@section('content')
<section class="breadcrumbs-custom">
    <div class="parallax-container" data-parallax-img="images/breadcrumbs-bg.jpg">
        <div class="breadcrumbs-custom-body parallax-content context-dark">
            <div class="container">
                <h2 class="breadcrumbs-custom-title">Cart Page</h2>
            </div>
        </div>
    </div>
    <div class="breadcrumbs-custom-footer">
        <div class="container">
            <ul class="breadcrumbs-custom-path">
                <li><a href="index.html">Home</a></li>
                <li><a href="grid-shop.html">Shop</a></li>
                <li class="active">Cart Page</li>
            </ul>
        </div>
    </div>
</section>
<!-- Shopping Cart-->
<section class="section section-xl bg-default">
    <div class="container">
        <!-- shopping-cart-->
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
                    <tr>
                        <td>
                            <div class="prod-card-inner">
                                <a class="table-cart-figure" href="{{ route('product.detail', $item['slug']) }}">
                                    <img src="{{ $item['thumbnail'] }}" alt="{{ $item['name'] }}" width="146" height="132" />
                                </a>
                                <a class="table-cart-link" href="{{ route('product.detail', $item['slug']) }}">{{ $item['name'] }}</a>
                            </div>
                        </td>
                        <td>${{ $item['price'] }}</td>
                        <td>
                            <div class="table-cart-stepper">
                                <input class="form-input" type="number" data-zeros="true" value="{{ $item['quantity'] }}" min="1" max="1000" name="qty">
                            </div>
                        </td>
                        <td>${{ $item['price'] * $item['quantity'] }}</td>
                    </tr>
                    @php
                    $totalPrice += $item['price'] * $item['quantity'];
                    @endphp
                    @endforeach
                </tbody>

            </table>
        </div>
        <div class="group-xl group-justify justify-content-center justify-content-md-between">
            <div>
                <form class="rd-form rd-mailform rd-form-inline rd-form-coupon">
                    <div class="form-wrap">
                        <input class="form-input form-input-inverse" id="coupon-code" type="text" name="text">
                        <label class="form-label" for="coupon-code">Coupon code</label>
                    </div>
                    <div class="form-button">
                        <button class="button button-lg button-secondary button-zakaria" type="submit">Apply</button>
                    </div>
                </form>
            </div>
            <div>
                <div class="group-xl group-middle">
                    <div>
                        <div class="group-md group-middle">
                            <div class="heading-5 font-weight-medium text-gray-500">Total</div>
                            <div class="heading-3 font-weight-normal">${{ number_format($totalPrice, 2) }}</div>
                        </div>
                    </div><a class="button button-lg button-primary button-zakaria" href="checkout.html">Proceed to checkout</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection