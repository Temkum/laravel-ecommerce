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

    .margin {
      margin-left: 15px;
    }

    .subcat {
      list-style: none;
    }

    .subcat li {
      line-height: 35px;
    }

    .subcat li a {
      margin: 1rem;
    }

  </style>

  <div class="container" style="padding:30px 0;">
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            <div class="row">
              <div class="col-md-6 text-uppercase text-lg">
                ATTRIBUTES
              </div>
              <div class="col-md-6">
                <a href="{{ route('admin.add-attribute') }}" class="btn btn-primary">Add New Attribute</a>
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
                  <th>Name</th>
                  <th>Date Added</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($prod_attributes as $p_attribute)
                  <tr>
                    <td>{{ $p_attribute->id }}</td>
                    <td>{{ $p_attribute->name }}</td>
                    <td>{{ $p_attribute->created_at }}</td>
                    <td>
                      <a href="{{ route('admin.edit-attribute', ['attribute_id' => $p_attribute->id]) }}"> <i
                          class="fa fa-edit"></i></a>
                      <a href="#"
                        onclick="confirm('Sure you want to delete this attribute?') || event.stopImmediatePropagation()"
                        wire:click.prevent="deleteAttribute({{ $p_attribute->id }})">
                        <i class="fa fa-trash text-danger margin"></i></a>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>

            {{ $prod_attributes->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
