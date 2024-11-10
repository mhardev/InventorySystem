<!-- Add User Account Modal -->
<div wire:ignore.self class="modal fade" id="addUserAccModal" tabindex="-1" aria-labelledby="addUserAccModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="addUserAccModalLabel">Add Account</h1>
                <button type="button" class="btn-close" wire:click="closeModal" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="saveUserAccount">
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col mb-3">
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
                            <div class="col mb-3">
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
                            <div class="col mb-3">
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
                        </div>
                        <div class="row">
                            <div class="col mb-3">
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
                            <div class="col mb-3">
                                <div class="box">
                                    <label class="form-label">Department</label>
                                    <div class="input-group mb-1">
                                        <select wire:model="department" class="form-select">
                                            <option selected>-- Select Department --</option>
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
                        <div class="row">
                            <div class="col mb-3">
                                <div class="box">
                                    <label class="form-label">User Type</label>
                                    <div class="input-group mb-1">
                                        <select type="text" class="form-select">
                                            <option selected>-- Select User Type --</option>
                                            <option value="0">User</option>
                                            <option value="1">Admin</option>
                                        </select>
                                    </div>
                                    @error('role_as')
                                        <span class="error">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col mb-3">
                                <div class="box">
                                    <label class="form-label">Password</label>
                                    <div class="input-group input-group-merge form-password-toggle">
                                        <input id="password" type="password" wire:model="password" class="form-control" placeholder="Enter password" name="password" required>
                                        <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                    </div>
                                    @error('password')
                                        <span class="error">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click="closeModal" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Update User Info Modal -->
<div wire:ignore.self class="modal fade" id="updateUserInfoModal" tabindex="-1" aria-labelledby="updateUserInfoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="updateUserInfoModalLabel">Update User Info Account</h1>
                <button type="button" class="btn-close" wire:click="closeModal" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="updateUserInfo">
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col mb-3">
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
                            <div class="col mb-3">
                                <div class="box">
                                    <label class="form-label">Email</label>
                                    <div class="input-group mb-1">
                                        <input type="text" wire:model="email" class="form-control" placeholder="Enter email" disabled>
                                    </div>
                                    @error('email')
                                        <span class="error">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
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
                            <div class="col mb-3">
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
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <div class="box">
                                    <label class="form-label">Department</label>
                                    <div class="input-group mb-1">
                                        <select wire:model="department" class="form-select">
                                            <option selected>-- Select Department --</option>
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
                            <div class="col mb-3">
                                <div class="box">
                                    <label class="form-label">User Type</label>
                                    <div class="input-group mb-1">
                                        <select id="user-type-select" class="form-select">
                                            <option value="0">User</option>
                                            <option value="1">Admin</option>
                                        </select>
                                    </div>
                                    @error('role_as')
                                        <span class="error">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click="closeModal" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Update User Password Modal -->
<div wire:ignore.self class="modal fade" id="updateUserPassModal" tabindex="-1" aria-labelledby="updateUserPassModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="updateUserPassModalLabel">Update User Password</h1>
                <button type="button" class="btn-close" wire:click="closeModal" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="updateUserPass">
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col mb-3">
                                <div class="box">
                                    <label class="form-label">Email</label>
                                    <div class="input-group mb-1">
                                        <input type="text" wire:model="email" class="form-control" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="col mb-3">
                                <div class="box">
                                    <label class="form-label">Password</label>
                                    <div class="input-group input-group-merge form-password-toggle">
                                        <input id="password" type="password" wire:model="password" class="form-control" placeholder="Enter new password" name="password" required>
                                        <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                    </div>
                                    @error('password')
                                        <span class="error">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click="closeModal" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- View User Info Modal -->
<div wire:ignore.self class="modal fade" id="showUserInfoModal" tabindex="-1" aria-labelledby="showUserInfoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="updateUserInfoModalLabel">User Info Account</h1>
                <button type="button" class="btn-close" wire:click="closeModal" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col mb-3">
                                <div class="box">
                                    <label class="form-label">Full Name</label>
                                    <div class="input-group mb-1">
                                        <input type="text" wire:model="name" class="form-control" placeholder="Enter full name" disabled>
                                    </div>
                                    @error('name')
                                        <span class="error">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col mb-3">
                                <div class="box">
                                    <label class="form-label">Username</label>
                                    <div class="input-group mb-1">
                                        <input type="text" wire:model="username" class="form-control" placeholder="Enter username" disabled>
                                    </div>
                                    @error('username')
                                        <span class="error">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col mb-3">
                                <div class="box">
                                    <label class="form-label">Email</label>
                                    <div class="input-group mb-1">
                                        <input type="text" wire:model="email" class="form-control" placeholder="Enter email" disabled>
                                    </div>
                                    @error('email')
                                        <span class="error">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <div class="box">
                                    <label class="form-label">Position</label>
                                    <div class="input-group mb-1">
                                        <input type="text" wire:model="position" class="form-control" placeholder="Enter position" disabled>
                                    </div>
                                    @error('position')
                                        <span class="error">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col mb-3">
                                <div class="box">
                                    <label class="form-label">Department</label>
                                    <div class="input-group mb-1">
                                        <input type="text" wire:model="department" class="form-control" placeholder="Enter department" disabled>
                                    </div>
                                    @error('department')
                                        <span class="error">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <div class="box">
                                    <label class="form-label">User Type</label>
                                    <div class="input-group mb-1">
                                        <select id="user-type-select" class="form-select" disabled>
                                            <option value="0">User</option>
                                            <option value="1">Admin</option>
                                        </select>
                                    </div>
                                    @error('role_as')
                                        <span class="error">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col mb-3">
                                <div class="box">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click="closeModal" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Delete User Account Modal -->
<div wire:ignore.self class="modal fade" id="deleteUserAccModal" tabindex="-1" aria-labelledby="deleteUserAccModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="deleteUserAccModalLabel">Delete User Account</h1>
                <button type="button" class="btn-close" wire:click="closeModal" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="destroyUserAcc">
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <h4 style="text-align: center">Are you sure you want to delete this Account?</h4>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click="closeModal" data-bs-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-primary">Yes</button>
                </div>
            </form>
        </div>
    </div>
</div>
