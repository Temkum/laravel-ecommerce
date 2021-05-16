<div>
  <div class="container" style="padding: 40px 0;">
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            <div class="row">
              <div class="col-md-6">
                <a href="{{ route('admin.products') }}" class="btn btn-primary pull-left">ALL PRODUCTS</a>
              </div>
              <div class="col-md-6 text-lg">
                EDIT PRODUCT
              </div>
            </div>
          </div>

          <div class="panel-body">
            @if (Session::has('message'))
              <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
            @endif
            <form action="" class="form-horizontal" enctype="multipart/form-data" wire:submit.prevent="updateProduct">
              <div class="form-group">
                <label for="" class="col-md-4 control-label">Product Name</label>
                <div class="col-md-4">
                  <input type="text" name="" id="" placeholder="Product Name" class="form-control input-md"
                    wire:model="name" wire:keyup="generateSlug">
                </div>
              </div>

              <div class="form-group">
                <label for="" class="col-md-4 control-label">Product Slug</label>
                <div class="col-md-4">
                  <input type="text" name="" id="" placeholder="Product Slug" class="form-control input-md"
                    wire:model="slug">
                </div>
              </div>

              <div class="form-group">
                <label for="" class="col-md-4 control-label">Short Description</label>
                <div class="col-md-4">
                  <textarea name="" id="" placeholder="Short Description" class="form-control input-md"
                    wire:model="short_description"></textarea>
                </div>
              </div>

              <div class="form-group">
                <label for="" class="col-md-4 control-label">Description</label>
                <div class="col-md-4">
                  <textarea rows="10" cols="30" placeholder="Description" class="form-control input-md"
                    wire:model="description"></textarea>
                </div>
              </div>

              <div class="form-group">
                <label for="" class="col-md-4 control-label">Regular Price</label>
                <div class="col-md-4">
                  <input type="number" name="" id="" placeholder="Regular price" class="form-control input-md"
                    wire:model="regular_price">
                </div>
              </div>

              <div class="form-group">
                <label for="" class="col-md-4 control-label">Sale Price</label>
                <div class="col-md-4">
                  <input type="number" name="" id="" placeholder="Sale price" class="form-control input-md"
                    wire:model="sale_price">
                </div>
              </div>

              <div class="form-group">
                <label for="" class="col-md-4 control-label">SKU</label>
                <div class="col-md-4">
                  <input type="text" name="" id="" placeholder="SKU" class="form-control input-md" wire:model="SKU">
                </div>
              </div>

              <div class="form-group">
                <label for="" class="col-md-4 control-label">Stock</label>
                <div class="col-md-4">
                  <select name="" id="" class="form-control" wire:model="stock_status">
                    <option value="in_stock">In stock</option>
                    <option value="out-of-stock">Out of stock</option>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label for="" class="col-md-4 control-label">Feature</label>
                <div class="col-md-4">
                  <select name="" id="" class="form-control" wire:model="featured">
                    <option value="0">No</option>
                    <option value="1">Yes</option>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label for="" class="col-md-4 control-label">Quantity</label>
                <div class="col-md-4">
                  <input type="number" name="" id="" placeholder="Quantity" class="form-control input-md"
                    wire:model="quantity">
                </div>
              </div>

              <div class="form-group">
                <label for="" class="col-md-4 control-label">Product Image</label>
                <div class="col-md-4">
                  <input type="file" name="" id="" class="input-file" wire:model="new_image">
                  @if ($new_image)
                    <img src="{{ $new_image->temporaryUrl() }}" width="120" />
                  @else
                    <img src="{{ asset('assets/images/products') }}/{{ $image }}" width="120" />
                  @endif
                </div>
              </div>

              <div class="form-group">
                <label for="" class="col-md-4 control-label">Category</label>
                <div class="col-md-4">
                  <select name="" id="" class="form-control" wire:model="category_id">
                    <option value="0">Select Category</option>
                    @foreach ($categories as $category)
                      <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                  </select>
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
