<div>
  <style>
    .add-new {
      float: right;
    }

    .text-lg {
      font-size: 2.5rem;
      text-transform: uppercase;
      font-weight: bold;
    }

    nav svg {
      height: 20px;
    }

    nav .hidden {
      display: block !important;
    }

  </style>

  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-heading text-lg">
            Orders
          </div>
          <div class="panel-body">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Order ID</th>
                  <th>Subtotal</th>
                  <th>Discount</th>
                  <th>Tax</th>
                  <th>Total</th>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Mobile</th>
                  <th>Email</th>
                  <th>Zipcode</th>
                  <th>Status</th>
                  <th>Order Date</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($orders as $order)
                  <tr>
                    <td>{{ $order->id }}</td>
                    <td>${{ $order->subtotal }}</td>
                    <td>${{ $order->discount }}</td>
                    <td>${{ $order->tax }}</td>
                    <td>${{ $order->total }}</td>
                    <td>{{ $order->first_name }}</td>
                    <td>{{ $order->last_name }}</td>
                    <td>{{ $order->mobile }}</td>
                    <td>{{ $order->email }}</td>
                    <td>{{ $order->zip_code }}</td>
                    <td>{{ $order->status }}</td>
                    <td>{{ $order->created_at }}</td>
                    <td><a href="{{ route('user.orderdetails', ['order_id' => $order->id]) }}"
                        class="btn btn-small btn-info"><i class="fa fa-eye"></i></a></td>
                  </tr>
                @endforeach
              </tbody>
            </table>
            {{ $orders->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
