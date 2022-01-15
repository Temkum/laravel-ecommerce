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

    .btn-info {
      margin-top: 2rem;
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
              <p><b>Line1: </b>{{ $user->profile->line1 }}</p>
              <p><b>Line2: </b>{{ $user->profile->line2 }}</p>
              <p><b>City: </b>{{ $user->profile->city }}</p>
              <p><b>Region: </b>{{ $user->profile->region }}</p>
              <p><b>zip: </b>{{ $user->profile->zip }}</p>
              <p><b>Country: </b>{{ $user->profile->country }}</p>
              <a href="{{ route('user.edit-profile') }}" class="btn btn-info">Update Profile</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
