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

  </style>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            Profile
          </div>

          <div class="panel-body">
            @if (Session::has('message'))
              <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
            @endif
            <div class="col-md-4">
              @if ($user->profile->image)
                <img src="{{ asset('assets/images/profile') }}/{{ $user->profile->image }}" width="100"
                  alt="{{ $user->profile->name }}" />
              @else
                <img src="{{ asset('assets/images/profile/profile.jpg') }}" />
              @endif
            </div>

            <div class="col-md-8">
              <p><b>Name: </b>{{ $user->name }}</p>
              <p><b>Email: </b>{{ $user->email }}</p>
              <p><b>Phone: </b>{{ $user->profile->mobile }}</p>
              <hr>
              <p><b>Line1: </b>{{ $user->line1 }}</p>
              <p><b>Line2: </b>{{ $user->line2 }}</p>
              <p><b>City: </b>{{ $user->city }}</p>
              <p><b>Region: </b>{{ $user->region }}</p>
              <p><b>zip: </b>{{ $user->zip }}</p>
              <p><b>Country: </b>{{ $user->country }}</p>
            </div>

            {{-- <form class="form-horizontal" wire:submit.prevent="saveSettings">
              <div class="form-group">
                <label class="col-md-4 control-label">Email</label>
                <div class="col-md-4">
                  <input class="form-control input-md" type="email" placeholder="Enter your email" wire:model="email">
                  @error('email')
                    <p class="text-danger">{{ $message }}</p>
                  @enderror
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-4 control-label">Mobile Phone</label>
                <div class="col-md-4">
                  <input class="form-control input-md" type="text" placeholder="Enter your phone number"
                    wire:model="phone">
                  @error('phone')
                    <p class="text-danger">{{ $message }}</p>
                  @enderror
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-4 control-label">Home Phone</label>
                <div class="col-md-4">
                  <input class="form-control input-md" type="text" placeholder="Enter home phone" wire:model="phone2">
                  @error('phone2')
                    <p class="text-danger">{{ $message }}</p>
                  @enderror
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-4 control-label">Address</label>
                <div class="col-md-4">
                  <input class="form-control input-md" type="text" placeholder="Address" wire:model="address">
                  @error('address')
                    <p class="text-danger">{{ $message }}</p>
                  @enderror
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-4 control-label">Map</label>
                <div class="col-md-4">
                  <input class="form-control input-md" type="text" placeholder="Map" wire:model="map">
                  @error('map')
                    <p class="text-danger">{{ $message }}</p>
                  @enderror
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-4 control-label">Twitter</label>
                <div class="col-md-4">
                  <input class="form-control input-md" type="text" placeholder="Twitter" wire:model="twitter">
                  @error('twitter')
                    <p class="text-danger">{{ $message }}</p>
                  @enderror
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-4 control-label">Pinterest</label>
                <div class="col-md-4">
                  <input class="form-control input-md" type="text" placeholder="Pinterest" wire:model="pinterest">
                  @error('pinterest')
                    <p class="text-danger">{{ $message }}</p>
                  @enderror
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-4 control-label">Facebook</label>
                <div class="col-md-4">
                  <input class="form-control input-md" type="text" placeholder="Facebook" wire:model="facebook">
                  @error('facebook')
                    <p class="text-danger">{{ $message }}</p>
                  @enderror
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-4 control-label">Instagram</label>
                <div class="col-md-4">
                  <input class="form-control input-md" type="text" placeholder="Instagram" wire:model="instagram">
                  @error('instagram')
                    <p class="text-danger">{{ $message }}</p>
                  @enderror
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-4 control-label">YouTube</label>
                <div class="col-md-4">
                  <input class="form-control input-md" type="text" placeholder="YouTube" wire:model="youtube">
                  @error('youtube')
                    <p class="text-danger">{{ $message }}</p>
                  @enderror
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-4 control-label"></label>
                <div class="col-md-4">
                  <button type="submit" class="btn btn-primary">Save</button>
                </div>
              </div>
            </form> --}}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
