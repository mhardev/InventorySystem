<div class="tab-pane fade show active" id="navs-top-updateinfo" role="tabpanel">
    <div class="row">
        <div class="col mb-3">
            <form wire:submit.prevent="updateUserInfo">
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <div class="box">
                            <label class="form-label">Full Name</label>
                            <div class="input-group mb-1">
                                <input type="text" wire:model="name" class="form-control" placeholder="Enter full name">
                            </div>
                            @error('name')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 col-md-6">
                        <div class="box">
                            <label class="form-label">Email</label>
                            <div class="input-group mb-1">
                                <input type="text" wire:model="email" class="form-control" placeholder="Enter email">
                            </div>
                            @error('email')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 col-md-6">
                        <div class="box">
                            <label class="form-label">Username</label>
                            <div class="input-group mb-1">
                                <input type="text" wire:model="username" class="form-control" placeholder="Enter username">
                            </div>
                            @error('username')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 col-md-6">
                        <div class="box">
                            <label class="form-label">Position</label>
                            <div class="input-group mb-1">
                                <input type="text" wire:model="position" class="form-control" placeholder="Enter position">
                            </div>
                            @error('position')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 col-md-6">
                        <div class="box">
                            <label class="form-label">Department</label>
                            <div class="input-group mb-1">
                                <select wire:model="department" class="form-select">
                                    <option value="">-- Select Department --</option>
                                    <option value="Accounting Unit">Accounting Unit</option>
                                    <option value="Cash Unit">Cash Unit</option>
                                    <option value="COA Unit">COA Unit</option>
                                    <option value="HR Unit">HR Unit</option>
                                    <option value="LGS Unit">LGS Unit</option>
                                    <option value="MIS Unit">MIS Unit</option>
                                    <option value="Property and Supply Unit">Property and Supply Unit</option>
                                    <option value="Records Unit">Records Unit</option>
                                    <option value="SIKAP Unit">SIKAP Unit</option>
                                    <option value="SMART Unit">SMART Unit</option>
                                    <option value="Special Order Unit">Special Order Unit</option>
                                    <option value="Technical Unit">Technical Unit</option>
                                    <option value="UNIFAST Unit">UNIFAST Unit</option>
                                </select>
                            </div>
                            @error('department')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mt-3">Update</button>
            </form>
        </div>
    </div>
</div>
