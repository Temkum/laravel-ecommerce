<div>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-heading">Modify password</div>

          <div class="panel-body">
            @if (Session::has('pwd_success'))
              <div class="alert alert-success" role="alert">{{ Session::get('pwd_success') }}</div>
            @endif
            @if (Session::has('pwd_error'))
              <div class="alert alert-danger" role="alert">{{ Session::get('pwd_error') }}</div>
            @endif
            <form class="form-horizontal" wire:submit.prevent="changePassword">
              <div class="form-group">
                <label for="" class="col-md-4 control-label">Current password</label>
                <div class="col-md-4">
                  <input type="password" name="current_password" id="" placeholder="Current password"
                         class="form-control input-md" wire:model="current_password">
                  @error('current_password')
                    <p class="text-danger">{{ $message }}</p>
                  @enderror
                </div>
              </div>

              <div class="form-group">
                <label for="" class="col-md-4 control-label">New password</label>
                <div class="col-md-4">
                  <input type="password" name="password" id="" placeholder="New password"
                         class="form-control input-md" wire:model="password">
                  @error('password')
                    <p class="text-danger">{{ $message }}</p>
                  @enderror
                </div>
              </div>
              <div class="form-group">
                <label for="" class="col-md-4 control-label">Repeat password</label>
                <div class="col-md-4">
                  <input type="password" name="confirm_password" id="" placeholder="Repeat password"
                         class="form-control input-md" wire:model="confirm_password">
                  @error('confirm_password')
                    <p class="text-danger">{{ $message }}</p>
                  @enderror
                </div>
              </div>

              <div class="form-group">
                <label for="" class="col-md-4"></label>
                <div class="col-md-4">
                  <button type="submit" class="btn btn-primary">Update
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
