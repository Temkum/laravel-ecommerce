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
        <div class="panel panel-default">
          <div class="panel-heading heading">
            Manage home categories
          </div>

          <div class="panel-body">
            @if (Session::has('message'))
              <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
            @endif
            <form class="form-horizontal" wire:submit.prevent="updateHomeCategory">
              <div class="form-group">
                <label for="" class="col-md-4 control-label">Choose Categories</label>
                <div class="col-md-4" wire:ignore>
                  <select name="categories[]" id="" class="sel_categories form-control" multiple="multiple"
                    wire:model="selected_categories">
                    @foreach ($categories as $category)
                      <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label for="" class="col-md-4 control-label">Number of Products</label>
                <div class="col-md-4">
                  <input type="text" name="" id="" class="form-control input-md" wire:model="number_of_products">
                </div>
              </div>

              <div class="form-group">
                <label for="" class="col-md-4"></label>
                <div class="col-md-4">
                  <button type="submit" name="" id="" class="btn btn-primary">Save</button>
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
    $(document).ready(function() {
      $('.sel_categories').select2();
      // change event
      $('.sel_categories').on('change', function(e) {
        const data = $('.sel_categories').select2('val');
        $this.set('select_category', data);
      });

    });

  </script>
@endpush
