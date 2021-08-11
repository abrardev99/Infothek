<div class="row">
    <div class="col-sm-8 offset-md-2">
        <div class="card">
            <div class="card-header"><strong>Change Password</strong></div>
            <form wire:submit.prevent="update">
                <div class="card-body">
                    <div class="row">

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="current_password">Current Password</label>
                                <input wire:model.lazy="state.current_password" id="current_password" type="password" class="form-control @error('current_password') is-invalid @enderror">
                                @error('current_password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="password">New Password</label>
                                <input wire:model.lazy="state.password" id="password" type="password" class="form-control @error('password') is-invalid @enderror">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="password_confirmation">Confirm Password</label>
                                <input wire:model.lazy="state.password_confirmation" id="password_confirmation" type="password" class="form-control @error('password_confirmation') is-invalid @enderror">
                                @error('password_confirmation')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-sm btn-primary" type="submit">Change Password</button>
                </div>
            </form>
        </div>
    </div>
</div>
