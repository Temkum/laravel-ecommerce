<div class="content">
  <style>
    .content {
      padding-top: 40px;
      padding-bottom: 40px;
    }

    .icon-stat {
      display: block;
      overflow: hidden;
      position: relative;
      padding: 15px;
      margin-bottom: 1em;
      background-color: #fff;
      border-radius: 4px;
      border: 1px solid #ddd;
    }

    .icon-stat-label {
      display: block;
      color: #999;
      font-size: 13px;
    }

    .icon-stat-value {
      display: block;
      font-size: 28px;
      font-weight: 600;
    }

    .icon-stat-visual {
      position: relative;
      top: 22px;
      display: inline-block;
      width: 32px;
      height: 32px;
      border-radius: 4px;
      text-align: center;
      font-size: 16px;
      line-height: 30px;
    }

    .bg-primary {
      color: #fff;
      background: #d74b4b;
    }

    .bg-secondary {
      color: #fff;
      background: #6685a4;
    }

    .icon-stat-footer {
      padding: 10px 0 0;
      margin-top: 10px;
      color: #aaa;
      font-size: 12px;
      border-top: 1px solid #eee;
    }

    .text-lg {
      font-size: 1.5rem;
      text-transform: uppercase;
      font-weight: bold;
    }

    .panel-header {
      padding: 2rem;
      background: rgba(209, 201, 201, 0.644);
    }

  </style>
  <div class="container">
    <div class="row">
      <div class="col-md-3 col-sm-6">
        <div class="icon-stat">
          <div class="row">
            <div class="col-xs-8 text-left">
              <span class="icon-stat-label">Total Purchased</span>
              <span class="icon-stat-value">{{ $total_purchase }}</span>
            </div>
            <div class="col-xs-4 text-center">
              <i class="fa fa-gift icon-stat-visual bg-warning"></i>
            </div>
          </div>
          <div class="icon-stat-footer">
            <i class="fa fa-clock-o"></i> Updated Now
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-6">
        <div class="icon-stat">
          <div class="row">
            <div class="col-xs-8 text-left">
              <span class="icon-stat-label">Total Cost</span>
              <span class="icon-stat-value">${{ $total_cost }}</span>
            </div>
            <div class="col-xs-4 text-center">
              <i class="fa fa-dollar icon-stat-visual bg-secondary"></i>
            </div>
          </div>
          <div class="icon-stat-footer">
            <i class="fa fa-clock-o"></i> Updated Now
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-6">
        <div class="icon-stat">
          <div class="row">
            <div class="col-xs-8 text-left">
              <span class="icon-stat-label">Today Delivered</span>
              <span class="icon-stat-value">{{ $total_delivered }}</span>
            </div>
            <div class="col-xs-4 text-center">
              <i class="fa fa-gift icon-stat-visual bg-success"></i>
            </div>
          </div>
          <div class="icon-stat-footer">
            <i class="fa fa-clock-o"></i> Updated Now
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-6">
        <div class="icon-stat">
          <div class="row">
            <div class="col-xs-8 text-left">
              <span class="icon-stat-label">Total Cancelled</span>
              <span class="icon-stat-value">{{ $total_cancelled }}</span>
            </div>
            <div class="col-xs-4 text-center">
              <i class="fa fa-gift icon-stat-visual bg-danger"></i>
            </div>
          </div>
          <div class="icon-stat-footer">
            <i class="fa fa-clock-o"></i> Updated Now
          </div>
        </div>
      </div>
    </div>
    {{-- latest order --}}
    <div class="row mt">
      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-header text-lg">
            Latest Orders
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
                    {{-- <td>{{ ucfirst($order->status) }}</td> --}}
                    <td>
                      @if ($order->status == 'delivered')
                        <span class="badge btn-success">Delivered</span>
                      @elseif($order->status == 'cancelled')
                        <span class="badge bg-primary">Cancelled</span>
                      @else
                        <span class="badge bg-secondary">Processing</span>
                      @endif
                    </td>
                    <td>{{ $order->created_at }}</td>
                    <td><a href="{{ route('user.orderdetails', ['order_id' => $order->id]) }}"
                        class="btn btn-small btn-info"><i class="fa fa-eye"></i></a></td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
