<div>
  <style>
    .container {
      padding: 30px 0;
    }

    .heading {
      font-size: 2rem;
      text-transform: uppercase;
      font-weight: 700;
      line-height: 2;
    }

    option:hover {
      background-color: antiquewhite;
    }

  </style>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="panel-default panel">
          <div class="panel-heading heading">
            Sale Setting
          </div>

          <div class="panel-body">
            @if (Session::has('message'))
              <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
            @endif
            <form action="" class="form-horizontal" wire:submit.prevent="updateSale">
              <div class="form-group">
                <label for="" class="col-md-4 control-label">Status</label>
                <div class="col-md-4">
                  <select name="" id="" class="form-control" wire:mode="status">
                    <option value="0">Inactive</option>
                    <option value="1">Active</option>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label for="" class="col-md-4 control-label">Date</label>
                <div class="col-md-4">
                  <input type="text" id="sale-date" placeholder="DD/MM/YYYY H:M:S" class="form-control input-md"
                    wire:model="sale_date">
                </div>
              </div>

              <div class="form-group">
                <label for="" class="col-md-4 control-label"></label>
                <div class="col-md-4">
                  <button type="submit" class="btn btn-primary">Update</button>
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
      $('#sale-date').datetimepicker({
        format: 'Y-MM-DD h:m:s',
      }).on('dp.change', function(e) {
        var data = $('#sale-date').val();
        @this.set('sale_date', data);
      });
    });
  </script>
@endpush
