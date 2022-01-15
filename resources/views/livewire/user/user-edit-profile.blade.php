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

    .btn-md {
      margin-top: 3rem;
    }

  </style>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            Update Profile
          </div>

          <div class="panel-body">
            @if (Session::has('message'))
              <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
            @endif
            <form action="" enctype="multipart/form-data" wire:submit.prevent="updateProfile">
              <div class="col-md-4">
                @if ($new_img)
                  <img src="{{ $new_img->temporaryUrl() }}" width="100" alt="" />
                @elseif ($image)
                  <img src="{{ asset('assets/images/profile') }}/{{ $user->profile->image }}" width="100%" alt="" />
                @else
                  <img src="{{ asset('assets/images/profile/profile.jpg') }}" />
                @endif
                <input type="file" class="p-4" wire:model="new_img">
              </div>

              <div class="col-md-6">
                <p><b>Name: </b><input type="text" class="form-control" wire:model="name"></p>
                <p><b>Email: </b>{{ $email }}</p>
                <p><b>Phone: </b><input type="text" class="form-control" wire:model="mobile"></p>
                <hr>
                <p><b>Line1: </b><input type="text" class="form-control" wire:model="line1"></p>
                <p><b>Line2: </b><input type="text" class="form-control" wire:model="line2"></p>
                <p><b>City: </b><input type="text" class="form-control" wire:model="city"></p>
                <p><b>Region: </b><input type="text" class="form-control" wire:model="region"></p>
                <p><b>zip: </b><input type="text" class="form-control" wire:model="zip"></p>
                <p><b>Country: </b><input type="text" class="form-control" wire:model="country"></p>

                <button type="submit" class="btn btn-info btn-md">Update</button>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
