
<h1>Receipt</h1>
<table>
    <thead>
        <tr>
            <th>Product name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($cartItems as $item)
        <tr>
            <td>{{ $item['name'] }}</td>
            <td>{{ $item['price'] }}</td>
            <td>{{ $item['quantity'] }}</td>
            <td>{{ $item['total'] }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
