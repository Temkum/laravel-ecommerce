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
      /* text-align: center; */
      line-height: 50px;
      font-weight: 300;
      font-size: 2rem;
      margin-left: 15px;
    }

  </style>

  <div class="container" style="padding:30px 0;">
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-heading1">
            <div class="col-md-6">
              All Categories
            </div>
            <div class="col-md-6">
              <a href="{{ route('admin.add-category') }}" class="btn btn-primary">Add New Category</a>
            </div>
          </div>

          <div class="panel-heading">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>id</th>
                  <th>Category Name</th>
                  <th>Slug</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($categories as $category)
                  <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->slug }}</td>
                  </tr>
                @endforeach
              </tbody>
            </table>

            {{ $categories->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
