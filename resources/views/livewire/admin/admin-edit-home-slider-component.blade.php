<div>
  <style>
    .container {
      padding: 30px 0;
    }

    .slider-h {
      font-size: 1.8rem;
      text-transform: uppercase;
    }

    .add-new {
      float: left;
    }

    .mb {
      margin-bottom: 7px;
    }

  </style>

  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            <div class="row">
              <div class="col-md-6">
                <a href="{{ route('admin.homeslider') }}" class="btn btn-primary">Back to slides</a>
              </div>
              <div class="col-md-6 slider-h">
                Edit Slide
              </div>
            </div>
          </div>

          <div class="panel-body">
            @if (Session::has('message'))
              <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
            @endif
            <form action="" class="form-horizontal" enctype="multipart/form-data" wire:submit.prevent="updateSlide">
              <div class="form-group">
                <label for="" class="col-md-4 control-label">Title</label>
                <div class="col-md-4">
                  <input type="text" placeholder="Title" class="form-control input-md" wire:model="title">
                </div>
              </div>

              <div class="form-group">
                <label for="" class="col-md-4 control-label">Subtitle</label>
                <div class="col-md-4">
                  <input type="text" placeholder="Subtitle" class="form-control input-md" wire:model="subtitle">
                </div>
              </div>

              <div class="form-group">
                <label for="" class="col-md-4 control-label">Price</label>
                <div class="col-md-4">
                  <input type="number" placeholder="Price" class="form-control input-md" wire:model="price">
                </div>
              </div>

              <div class="form-group">
                <label for="" class="col-md-4 control-label">Link</label>
                <div class="col-md-4">
                  <input type="text" placeholder="Link" class="form-control input-md" wire:model="link">
                </div>
              </div>

              <div class="form-group">
                <label for="" class="col-md-4 control-label">Status</label>
                <div class="col-md-4">
                  <select name="" id="" wire:model="status">
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label for="" class="col-md-4 control-label">Image</label>
                <div class="col-md-4">
                  <input type="file" placeholder="Image" class="input-file mb" wire:model="new_image">
                  @if ($new_image)
                    <img src="{{ $new_image->temporaryUrl() }}" width="120" class="mt-3" />
                  @else
                    <img src="{{ asset('assets/images/sliders') }}/{{ $image }}" width="120" />
                  @endif
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
