<div>
  <style>
    .container {
      padding: 40px 0;
    }

    .slider-h {
      font-size: 1.8rem;
    }

    .add-new {
      float: right;
    }

    .ml {
      margin-left: 5px;
    }

  </style>

  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            <div class="row">
              <div class="col-md-6 slider-h">
                All SLIDES
              </div>
              <div class="col-md-6 add-new">
                <a href="{{ route('admin.addhomeslider') }}" class="btn btn-primary">Add New Slides</a>
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
                  <th>ID</th>
                  <th>Image</th>
                  <th>Title</th>
                  <th>Subtitle</th>
                  <th>Price</th>
                  <th>Link</th>
                  <th>Status</th>
                  <th>Date</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @if ($sliders->count() > 0)
                  @foreach ($sliders as $slider)
                    <tr>
                      <td>{{ $slider->id }}</td>
                      <td><img src="{{ asset('assets/images/sliders') }}/{{ $slider->image }}" width="120" />
                      </td>
                      <td>{{ $slider->title }}</td>
                      <td>{{ $slider->subtitle }}</td>
                      <td>{{ $slider->price }}</td>
                      <td>{{ $slider->link }}</td>
                      <td>{{ $slider->status == 1 ? 'Active' : 'Inactive' }}</td>
                      <td>{{ $slider->created_at }}</td>
                      <td>
                        <a href="{{ route('admin.edithomeslider', ['slide_id' => $slider->id]) }}"><i
                            class="fa fa-edit fa-2x text-info mr-5"></i>
                        </a>
                        <a href="#" wire:click.prevent="deleteSlide({{ $slider->id }})"><i
                            class="fa fa-trash fa-2x text-danger"></i>
                        </a>
                      </td>
                    </tr>
                  @endforeach
              </tbody>
            @else
              <p class="no-products">No slides available!</p>
              @endif
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
