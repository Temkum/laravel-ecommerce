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
                Add New Product
              </div>
            </div>
          </div>

          <div class="panel-body">
            @if (Session::has('message'))
              <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
            @endif
            <form action="" class="form-horizontal" enctype="multipart/form-data" wire:submit.prevent="addProduct">
              <div class="form-group">
                <label for="" class="col-md-4 control-label">Product Name</label>
                <div class="col-md-4">
                  <input type="text" name="" id="" placeholder="Product Name" class="form-control input-md"
                    wire:model="name" wire:keyup="generateSlug">
                  @error('name')
                    <p class="text-danger">{{ $message }}</p>
                  @enderror
                </div>
              </div>

              <div class="form-group">
                <label for="" class="col-md-4 control-label">Product Slug</label>
                <div class="col-md-4">
                  <input type="text" name="" id="" placeholder="Product Slug" class="form-control input-md"
                    wire:model="slug">
                  @error('slug')
                    <p class="text-danger">{{ $message }}</p>
                  @enderror
                </div>
              </div>

              <div class="form-group">
                <label for="" class="col-md-4 control-label">Short Description</label>
                <div class="col-md-4" wire:ignore>
                  <textarea name="" id="short-description" placeholder="Short Description" class="form-control input-md"
                    wire:model="short_description"></textarea>
                  @error('short_description')
                    <p class="text-danger">{{ $message }}</p>
                  @enderror
                </div>
              </div>

              <div class="form-group">
                <label for="" class="col-md-4 control-label">Description</label>
                <div class="col-md-4" wire:ignore>
                  <textarea rows="10" cols="30" placeholder="Description" class="form-control input-md" id="description"
                    wire:model="description"></textarea>
                  @error('description')
                    <p class="text-danger">{{ $message }}</p>
                  @enderror
                </div>
              </div>

              <div class="form-group">
                <label for="" class="col-md-4 control-label">Regular Price</label>
                <div class="col-md-4">
                  <input type="number" name="" id="" placeholder="Regular price" class="form-control input-md"
                    wire:model="regular_price">
                  @error('regular_price')
                    <p class="text-danger">{{ $message }}</p>
                  @enderror
                </div>
              </div>

              <div class="form-group">
                <label for="" class="col-md-4 control-label">Sale Price</label>
                <div class="col-md-4">
                  <input type="number" name="" id="" placeholder="Sale price" class="form-control input-md"
                    wire:model="sale_price">
                  @error('sale_price')
                    <p class="text-danger">{{ $message }}</p>
                  @enderror
                </div>
              </div>

              <div class="form-group">
                <label for="" class="col-md-4 control-label">SKU</label>
                <div class="col-md-4">
                  <input type="text" name="" id="" placeholder="SKU" class="form-control input-md" wire:model="SKU">
                  @error('SKU')
                    <p class="text-danger">{{ $message }}</p>
                  @enderror
                </div>
              </div>

              <div class="form-group">
                <label for="" class="col-md-4 control-label">Stock</label>
                <div class="col-md-4">
                  <select name="" id="" class="form-control" wire:model="stock_status">
                    <option value="in_stock">In stock</option>
                    <option value="out-of-stock">Out of stock</option>
                  </select>
                  @error('stock_status')
                    <p class="text-danger">{{ $message }}</p>
                  @enderror
                </div>
              </div>

              <div class="form-group">
                <label for="" class="col-md-4 control-label">Feature</label>
                <div class="col-md-4">
                  <select name="" id="" class="form-control" wire:model="featured">
                    <option value="0">No</option>
                    <option value="1">Yes</option>
                  </select>
                  @error('featured')
                    <p class="text-danger">{{ $message }}</p>
                  @enderror
                </div>
              </div>

              <div class="form-group">
                <label for="" class="col-md-4 control-label">Quantity</label>
                <div class="col-md-4">
                  <input type="number" name="" id="" placeholder="Quantity" class="form-control input-md"
                    wire:model="quantity">
                  @error('quantity')
                    <p class="text-danger">{{ $message }}</p>
                  @enderror
                </div>
              </div>

              <div class="form-group">
                <label for="" class="col-md-4 control-label">Product Image</label>
                <div class="col-md-4">
                  <input type="file" name="" id="" class="input-file" wire:model="image">
                  @if ($image)
                    <img src="{{ $image->temporaryUrl() }}" width="120" />
                  @endif
                  @error('image')
                    <p class="text-danger">{{ $message }}</p>
                  @enderror
                </div>
              </div>

              <div class="form-group">
                <label for="" class="col-md-4 control-label">Product Gallery</label>
                <div class="col-md-4">
                  <input type="file" name="" id="" class="input-file" wire:model="images" multiple>
                  @if ($images)
                    @foreach ($images as $image)
                      <img src="{{ $image->temporaryUrl() }}" width="120" />
                    @endforeach
                  @endif
                  @error('images')
                    <p class="text-danger">{{ $message }}</p>
                  @enderror
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
                  @error('category_id')
                    <p class="text-danger">{{ $message }}</p>
                  @enderror
                </div>
              </div>

              <div class="form-group">
                <label for="" class="col-md-4 control-label">Subcategory</label>
                <div class="col-md-4">
                  <select name="" id="" class="form-control" wire:model="subcategory_id"
                    wire:change="changeSubcategory">
                    <option value="0">Select Subcategory</option>
                    @foreach ($subcategories as $subcat)
                      <option value="{{ $subcat->id }}">{{ $subcat->name }}</option>
                    @endforeach
                  </select>
                  @error('subcategory_id')
                    <p class="text-danger">{{ $message }}</p>
                  @enderror
                </div>
              </div>

              <div class="form-group">
                <label for="" class="col-md-4 control-label"></label>
                <div class="col-md-4">
                  <button type="submit" class="btn btn-primary">Submit</button>
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
      tinymce.init({
        selector: '#short-description',
        setup: function(editor) {
          editor.on('Change', function(e) {
            tinyMCE.triggerSave();
            let sd_data = $('#short-description').val();
            @this.set('short_description', sd_data);
          })
        }
      })

      tinymce.init({
        selector: '#description',
        setup: function(editor) {
          editor.on('Change', function(e) {
            tinyMCE.triggerSave();
            let desc_data = $('#description').val();
            @this.set('description', desc_data);
          })
        }
      })

    });
  </script>
@endpush
