
<div class="tab-pane fade show" id="navs-top-updatepass" role="tabpanel">
    <div class="row">
        <div class="col mb-3">
            <form wire:submit.prevent="updateUserPassword" class="mt-4">
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <div class="box">
                            <label class="form-label">New Password</label>
                            <div class="input-group mb-1">
                                <input type="password" wire:model="new_password" class="form-control" placeholder="Enter new password">
                            </div>
                            @error('new_password')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 col-md-6">
                        <div class="box">
                            <label class="form-label">Confirm New Password</label>
                            <div class="input-group mb-1">
                                <input type="password" wire:model="new_password_confirmation" class="form-control" placeholder="Confirm new password">
                            </div>
                            @error('new_password_confirmation')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mt-3">Update Password</button>
            </form>
        </div>
    </div>
</div>
