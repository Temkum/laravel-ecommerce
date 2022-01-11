<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Order Confirmation</title>

  <style>
    .tab {
      width: 600px;
      text-align: right;
    }

    .subt {
      font-size: 1rem;
      font-weight: bold;
      border-top: 1px solid #ccc;
    }

  </style>
</head>

<body>
  <p>Hi {{ $order->first_name }} {{ $order->last_name }}</p>
  <p>Your order has been successfully placed.</p>
  <br>

  <table class="tab">
    <thead>
      <tr>
        <th>Image</th>
        <th>Name</th>
        <th>Quantity</th>
        <th>Price</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($order->orderItems as $item)
        <tr>
          <td><img src="{{ asset('assets/images/products') }}/{{ $item->product->image }}"
              alt="{{ $item->product->name }}" width="100"></td>
          <td>{{ $item->name }}</td>
          <td>{{ $item->quantity }}</td>
          <td>{{ $item->price }}</td>
        </tr>
      @endforeach
      <tr>
        <td colspan="3"></td>
        <td class="subt">Subtotal: ${{ $order->subtotal }}</td>
      </tr>
      <tr>
        <td colspan="3"></td>
        <td>Tax: ${{ $order->tax }}</td>
      </tr>
      <tr>
        <td colspan="3"></td>
        <td>Shipping: Free Shipping</td>
      </tr>
      <tr>
        <td colspan="3"></td>
        <td>Total: ${{ $order->total }}</td>
      </tr>
    </tbody>

  </table>

</body>

</html>
