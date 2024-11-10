<div>
    @include('livewire.admin.modals.user-accountmodal')
    <div>
        @if(session('message'))
            <h2 class="alert alert-success">{{ session('message') }}</h2>
        @endif
        <h3 class="mb-4">User Accounts</h3>
        <!-- Basic Breadcrumb -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb" style="font-size: 12px">
            <li class="breadcrumb-item">
                <a href="{{url('admin/dashboard')}}">Home</a>
            </li>
            <li class="breadcrumb-item active">User Accounts</li>
            </ol>
        </nav>
        <!-- Basic Breadcrumb -->
        <div class="nav nav-pills flex-column flex-md-row mb-3">
            <div>
                <label class="py-2 mb-0">Search:</label>
                <input type="search" wire:model.live.debounce.300ms="search" wire:keydown="resetPage" class="form-control float-end mx-2 " style="width: 230px" placeholder="Search..."/>
            </div>
            <label class="py-2 mb-0">User Type:</label>
            <select wire:model.live="selectedRole" class="form-select float-end mx-2" style="width: 90px" >
                <option value="">All</option>
                <option value="1">Admin</option>
                <option value="0">User</option>
            </select>
            <button
                class="d-block mr-0 ml-auto btn btn-secondary add-new btn-primary"
                tabindex="0" aria-controls="DataTables_Table_0"
                type="button" data-bs-toggle="modal" data-bs-target="#addUserAccModal">
                <span>
                    <i class="bx bx-plus me-0 me-sm-1"></i>
                    <span class="d-none d-sm-inline-block">Add New User</span>
                </span>
            </button>
        </div>
        <!-- Bootstrap Table -->

        @include('livewire.admin.includes.userTypeIndicator')
        <div class="card">
            <div class="card-header" style="padding-bottom: 0">
                <h5>User Account Table</h5>
            </div>
            <div class="card-datatable table-responsive text-nowrap">
                <table id="userDataTable" class="table">
                    <thead>
                        <tr align="center">
                            @include('livewire.admin.includes.table-sorttable-th', [
                                'name' => 'name',
                                'displayName' => 'Name'
                            ])
                            @include('livewire.admin.includes.table-sorttable-th', [
                                'name' => 'username',
                                'displayName' => 'Username'
                            ])
                            @include('livewire.admin.includes.table-sorttable-th', [
                                'name' => 'email',
                                'displayName' => 'Email'
                            ])
                            @include('livewire.admin.includes.table-sorttable-th', [
                                'name' => 'role_as',
                                'displayName' => 'User Type'
                            ])
                            @include('livewire.admin.includes.table-sorttable-th', [
                                'name' => 'updated_by',
                                'displayName' => 'Updated By'
                            ])
                            <th class="px-4 py-3 noselect">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($users as $user)
                        @if ($user->role_as != '1') <!-- Check if role_as is not equal to 1 -->
                            <tr align="center">
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @if ($user->role_as == '0')
                                        <label class="badge btn-info">User</label>
                                    @else
                                        <label class="badge btn-danger">None</label>
                                    @endif
                                </td>
                                <td>{{ $user->updatedBy && $user->updatedBy->role_as == 1 ? $user->updatedBy->name : 'Unknown' }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button"
                                                class="btn btn-info"
                                                style="width: 10px"
                                                wire:click="editUserInfo({{ $user->id }})"
                                                data-bs-toggle="modal"
                                                data-bs-target="#showUserInfoModal">
                                            <i class="bx bx-info-circle small"></i>
                                        </button>
                                        <button class="btn btn-primary dropdown-toggle hide-arrow" style="width: 10px" data-bs-toggle="dropdown">
                                            <i class="bx bx-message-square-edit small"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <button type="button" class="dropdown-item" wire:click="editUserInfo({{$user->id}})" data-bs-toggle="modal" data-bs-target="#updateUserInfoModal"><i class="bx bx-edit-alt me-2"></i> Update Info</button>
                                            <button type="button" class="dropdown-item" wire:click="editUserPass({{$user->id}})" data-bs-toggle="modal" data-bs-target="#updateUserPassModal"><i class="bx bxs-key me-2"></i> Update Password</button>
                                        </div>
                                        <button class='btn btn-danger' style="width: 10px" wire:click="deleteUserAcc({{$user->id}})" data-bs-toggle="modal" data-bs-target="#deleteUserAccModal"><i class="bx bx-trash small"></i></button>
                                    </div>
                                </td>
                            </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
                <div class="px-4 pt-3">
                    @include('livewire.admin.includes.table-perpage')
                    <br>
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
