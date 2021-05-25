<div>
  <style>
    .no-details {
      padding: 2rem;
      font-size: 2rem;
      background-color: rgba(238, 131, 131, 0.474);
    }

    .fa-exclamation-triangle {
      color: red !important;
      margin-right: 1rem;
    }

    .text-lg {
      font-size: 2.5rem;
      text-transform: uppercase;
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
          <div class="panel-heading">
            <div class="row">
              <div class="col-md-6 mr-3">
                <a href="{{ route('user.orders') }}" class="btn btn-default btn-small">Back to My Orders </a>
              </div>
              <div class="col-md-6 text-lg">
                My DETAILS
              </div>
            </div>
          </div>

          <div class="panel-body">
            <div class="wrap-iten-in-cart">
              <h3 class="box-title">Product Name</h3>
              <ul class="products-cart">
                @foreach ($order->orderItems as $item)
                  <li class="pr-cart-item">
                    <div class="product-image">
                      <figure><img src="{{ asset('assets/images/products') }}/{{ $item->product->image }}"
                          alt="{{ $item->product->name }}">
                      </figure>
                    </div>

                    <div class="product-name">
                      <a class="link-to-product"
                        href="{{ route('product.details', ['slug' => $item->product->slug]) }}">{{ $item->product->name }}</a>
                    </div>
                    <div class="price-field produtc-price">
                      <p class="price">${{ $item->price }}</p>
                    </div>

                    <div class="quantity">
                      <h5>{{ $item->quantity }}</h5>
                    </div>

                    <div class="price-field sub-total">
                      <p class="price">${{ $item->price * $item->quantity }}</p>
                    </div>
                  </li>
                @endforeach
              </ul>
            </div>

            <div class="summary">
              <div class="order-summary">
                <h4 class="title-box">Order Summary</h4>
                <p class="summary-info">
                  <span class="title">Subtotal</span>
                  <b class="index">${{ $order->subtotal }}</b>
                </p>

                <p class="summary-info">
                  <span class="title">Tax</span>
                  <b class="index">${{ $order->tax }}</b>
                </p>
                <p class="summary-info">
                  <span class="title">Shipping</span>
                  <b class="index">Free Shipping</b>
                </p>
                <p class="summary-info total-info ">
                  <span class="title">Total</span>
                  <b class="index">${{ $order->total }}</b>
                </p>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-heading text-lg">
            Billing Details
          </div>
          <div class="panel-body">
            <table class="table">
              <tr>
                <th>Full Name</th>
                <td>{{ $order->first_name }} {{ $order->last_name }}</td>
              </tr>

              <tr>
                <th>Phone</th>
                <td>{{ $order->mobile }}</td>
                <th>Email</th>
                <td>{{ $order->email }}</td>
              </tr>

              <tr>
                <th>Address 1</th>
                <td>{{ $order->line1 }}</td>
                <th>Address 2</th>
                <td>{{ $order->line2 }}</td>
              </tr>

              <tr>
                <th>State</th>
                <td>{{ $order->state }}</td>
                <th>City</th>
                <td>{{ $order->city }}</td>
              </tr>

              <tr>
                <th>Zipcode</th>
                <td>{{ $order->zip_code }}</td>
                <th>Country</th>
                <td>{{ $order->country }}</td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>

    @if ($order->is_shipping_different)
      <div class="row">
        <div class="col-md-12">
          <div class="panel panel-default">
            <div class="panel-heading text-lg">
              Shipping
            </div>
            <div class="panel-body">
              <table class="table">
                <tr>
                  <th>Full Name</th>
                  <td>{{ $order->shipping->first_name }} {{ $order->shipping->last_name }}</td>
                </tr>

                <tr>
                  <th>Phone</th>
                  <td>{{ $order->shipping->mobile }}</td>
                  <th>Email</th>
                  <td>{{ $order->shipping->email }}</td>
                </tr>

                <tr>
                  <th>Address 1</th>
                  <td>{{ $order->shipping->line1 }}</td>
                  <th>Address 2</th>
                  <td>{{ $order->shipping->line2 }}</td>
                </tr>

                <tr>
                  <th>State</th>
                  <td>{{ $order->shipping->state }}</td>
                  <th>City</th>
                  <td>{{ $order->shipping->city }}</td>
                </tr>

                <tr>
                  <th>Zipcode</th>
                  <td>{{ $order->shipping->zip_code }}</td>
                  <th>Country</th>
                  <td>{{ $order->shipping->country }}</td>
                </tr>
              </table>
            </div>
          </div>
        </div>
      </div>
    @endif

    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-heading text-lg">
            Transaction
          </div>
          <div class="panel-body">
            <table class="table">
              <tr>
                <th>Mode</th>
                <td>{{ $order->transaction->mode }}</td>
              </tr>
              <tr>
                <th>Status</th>
                <td>{{ $order->transaction->status }}</td>
              </tr>
              <tr>
                <th>Date</th>
                <td>{{ $order->transaction->created_at }}</td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
