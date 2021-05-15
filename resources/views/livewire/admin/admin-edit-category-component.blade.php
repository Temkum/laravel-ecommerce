<div>
  <div class="container" style="padding: 40px 0">
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            <div class="row">
              <div class="col-md-6">
                <a href="{{ route('admin.categories') }}" class="btn btn-primary">All Categories</a>
              </div>
              <div class="col-md-6">
                EDIT CATEGORY
              </div>
            </div>
          </div>

          {{-- panel body --}}
          <div class="panel-body">
            @if (Session::has('message'))
              <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
            @endif
            <form class="form-horizontal" method="" wire:submit.prevent="updateCategory">
              <div class="form-group">
                <label for="" class="col-md-4 control-label">Category Name</label>
                <div class="col-md-4">
                  <input type="text" placeholder="Category Name" class="form-control input-md" wire:model="name"
                    wire:keyup="generateSlug">
                </div>
              </div>

              <div class="form-group">
                <label for="" class="col-md-4 control-label">Category Slug</label>
                <div class="col-md-4">
                  <input type="text" placeholder="Category Slug" class="form-control input-md" wire:model="slug">
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
