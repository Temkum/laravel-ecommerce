<div>
  <style>
    nav svg {
      height: 20px;
    }

    nav .hidden {
      display: block !important;
    }

    .panel-heading1 {
      text-transform: uppercase;
      line-height: 30px;
      font-weight: 700;
      font-size: 2rem;
    }

    .margin {
      margin-left: 15px;
    }

  </style>

  <div class="container" style="padding:30px 0;">
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            <div class="row">
              <div class="col-md-6 text-uppercase text-lg panel-heading1">
                All Coupons
              </div>
              <div class="col-md-6 pull-right">
                <a href="{{ route('admin.addcoupon') }}" class="btn btn-primary">Add New Coupons</a>
              </div>
            </div>
          </div>

          <div class="panel-body">
            @if (Session::has('message'))
              <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
            @endif
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Coupon Code</th>
                  <th>Coupon Type</th>
                  <th>Coupon Value</th>
                  <th>Cart Value</th>
                  <th>Expiry Date</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @if ($coupons->count() > 0)
                  @foreach ($coupons as $coupon)
                    <tr>
                      <td>{{ $coupon->id }}</td>
                      <td>{{ $coupon->code }}</td>
                      <td>{{ $coupon->type }}</td>
                      @if ($coupon->type == 'fixed')
                        <td>${{ $coupon->value }}</td>
                      @else
                        <td>{{ $coupon->value }}%</td>
                      @endif
                      <td>{{ $coupon->cart_value }}</td>
                      <td>{{ $coupon->expiry_date }}</td>
                      <td>
                        <a href="{{ route('admin.editcoupon', ['coupon_id' => $coupon->id]) }}"> <i
                            class="fa fa-edit fa-2x"></i></a>
                        <a href="#"
                          onclick="confirm('Are you sure you want to delete this coupon?') || event.stopImmediatePropagation()"
                          wire:click.prevent="deleteCoupon({{ $coupon->id }})">
                          <i class="fa fa-trash fa-2x text-danger margin"></i></a>
                      </td>
                    </tr>
                  @endforeach
                @else
                  <p class="no-products">No coupons available!</p>
                @endif
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
