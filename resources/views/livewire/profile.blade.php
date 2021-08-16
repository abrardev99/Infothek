<div class="row">
    <div class="col-sm-8 offset-md-2">
        <div class="card">
            <div class="card-header"><strong>Update Profile</strong></div>
            <form wire:submit.prevent="update">
                <div class="card-body">
                    <div class="row">

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input wire:model.lazy="user.name" id="name" type="text" class="form-control @error('user.name') is-invalid @enderror" name="name" autocomplete="name">
                                @error('user.name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input wire:model.lazy="user.email" id="email" type="email" class="form-control @error('user.email') is-invalid @enderror" name="email" required autocomplete="email">
                                @error('user.email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-sm btn-primary" type="submit"> Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
