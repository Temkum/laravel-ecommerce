<div>
  <style>
    .caps {
      text-transform: uppercase;
      font-size: 2rem;
    }

  </style>
  <div class="container" style="padding: 40px 0">
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            <div class="row">
              <div class="col-md-6">
                <a href="{{ route('admin.coupons') }}" class="btn btn-primary">Back to All Coupons</a>
              </div>
              <div class="col-md-6 caps">
                Modify coupons
              </div>
            </div>
          </div>

          {{-- panel body --}}
          <div class="panel-body">
            @if (Session::has('message'))
              <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
            @endif
            <form class="form-horizontal" method="" wire:submit.prevent="updateCoupon">
              <div class="form-group">
                <label for="" class="col-md-4 control-label">Coupon Code</label>
                <div class="col-md-4">
                  <input type="text" placeholder="Coupon Code" class="form-control input-md" wire:model="code">
                  @error('code')
                    <p class="text-danger">{{ $message }}</p>
                  @enderror
                </div>
              </div>

              <div class="form-group">
                <label for="" class="col-md-4 control-label">Coupon Type</label>
                <div class="col-md-4">
                  <select name="" id="" class="form-control" wire:model="type">
                    <option value="">Select</option>
                    <option value="fixed">Fixed</option>
                    <option value="percent">Percent</option>
                  </select>
                  @error('type')
                    <p class="text-danger">{{ $message }}</p>
                  @enderror
                </div>
              </div>

              <div class="form-group">
                <label for="" class="col-md-4 control-label">Coupon Value</label>
                <div class="col-md-4">
                  <input type="text" placeholder="Coupon Value" class="form-control input-md" wire:model="value">
                  @error('value')
                    <p class="text-danger">{{ $message }}</p>
                  @enderror
                </div>
              </div>

              <div class="form-group">
                <label for="" class="col-md-4 control-label">Cart Value</label>
                <div class="col-md-4">
                  <input type="text" placeholder="Cart Value" class="form-control input-md" wire:model="cart_value">
                  @error('cart_value')
                    <p class="text-danger">{{ $message }}</p>
                  @enderror
                </div>
              </div>

              <div class="form-group">
                <label for="" class="col-md-4 control-label">Expiry Date</label>
                <div class="col-md-4" wire:ignore>
                  <input type="text" placeholder="Expiry Date" id="expiry-date" class="form-control input-md"
                    wire:model="expiry_date">
                  @error('expiry_date')
                    <p class="text-danger">{{ $message }}</p>
                  @enderror
                </div>
              </div>

              <div class="form-group">
                <label for="" class="col-md-4 control-label"></label>
                <div class="col-md-4">
                  <button type="submit" class="btn btn-success">Update</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@push('scripts')
  <script>
    $(function() {
      $('#expiry-date').datetimepicker({
        format: 'Y-MM-DD h:m:s'
      }).on('dp.change', function(e) {
        let data = $('#expiry-date').val();
        @this.set('expiry_date', data);
      })
    })

  </script>
@endpush
