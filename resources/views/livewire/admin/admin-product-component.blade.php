<div>
  <style>
    nav svg {
      height: 20px;
    }

    nav .hidden {
      display: block !important;
    }

    .add-new {
      float: right;
    }

    .text-lg {
      font-size: 2.5rem;
    }

  </style>

  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-heading heading-1">
            <div class="row">
              <div class="col-md-6 text-uppercase text-lg">
                All products
              </div>
              <div class="col-md-6 add-new">
                <a href="{{ route('admin.add-product') }}" class="btn btn-primary pull-right">Add New Product</a>
              </div>
            </div>
          </div>

          <div class="panel-body">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Image</th>
                  <th>Name</th>
                  <th>Stock</th>
                  <th>Price</th>
                  <th>Category</th>
                  <th>Date</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($products as $product)
                  <tr>
                    <td>{{ $product->id }}</td>
                    <td><img src="{{ asset('assets/images/products') }}/{{ $product->image }}"
                        alt="{{ $product->name }}" width="60"></td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->stock_status }}</td>
                    <td>{{ $product->regular_price }}</td>
                    <td>{{ $product->category->name }}</td>
                    <td>{{ $product->created_at }}</td>
                    <td>
                      <a href="{{ route('admin.edit-product', ['product_slug' => $product->slug]) }}"><i
                          class="fa fa-edit fa-2x text-purple-100"></i></a>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>

            {{-- pagination --}}
            {{ $products->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
