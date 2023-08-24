@extends("admin.layout.master")
@section("content")
<div class="container">
    <div class="col-xl-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Order Details</h4>
            </div>
            <div class="card-body">
                <h5>Customer Information</h5>
                <table class="table">
                    <tr>
                        <th>First Name</th>
                        <td>{{ $order->customer->first_name }}</td>
                    </tr>
                    <tr>
                        <th>Last Name</th>
                        <td>{{ $order->customer->last_name }}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{ $order->customer->email }}</td>
                    </tr>
                    <tr>
                        <th>Address</th>
                        <td>{{ $order->customer->address }}</td>
                    </tr>
                    <tr>
                        <th>Phone</th>
                        <td>{{ $order->customer->phone }}</td>
                    </tr>
                    <tr>
                        <th>City</th>
                        <td>{{ $order->customer->city }}</td>
                    </tr>
                </table>
                
                <h5>Order Information</h5>
                <table class="table">
                    <tr>
                        <th>ID</th>
                        <td>{{ $order->id }}</td>
                    </tr>
                    <tr>
                        <th>Total Amount</th>
                        <td>${{ $order->amount }}</td>
                    </tr>
                    <!-- Add more order details here -->

                    <tr>
                        <th>Products</th>
                        <td>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($order->orderProducts as $orderProduct)
                                    <tr>
                                        <td>{{ $orderProduct->product->name }}</td>
                                        <td>${{ $orderProduct->price }}</td>
                                        <td>{{ $orderProduct->quantity }}</td>
                                        <td>${{ $orderProduct->price * $orderProduct->quantity}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
