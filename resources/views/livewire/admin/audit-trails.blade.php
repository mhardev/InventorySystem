<div>
    @include('livewire.admin.modals.audit-trailsmodal')
    <div>
        <h3 class="mb-4">Audit Trails</h3>
        <!-- Basic Breadcrumb -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb" style="font-size: 12px">
            <li class="breadcrumb-item">
                <a href="{{url('admin/dashboard')}}">Home</a>
            </li>
            <li class="breadcrumb-item active">Audit Trails</li>
            </ol>
        </nav>
        <!-- Basic Breadcrumb -->

        <div class="dropdown nav nav-pills flex-column flex-md-row mb-3">
            <div>
                <label class="py-2 mb-0">Search:</label>
                <input type="search" wire:model.live.debounce.300ms="search" wire:keydown="resetPage" class="form-control float-end mx-2 " style="width: 230px" placeholder="Search..."/>
            </div>
            <label class="py-2 mb-0">User Type:</label>
            <select wire:model.live="selectedUserType" class="form-select float-end mx-2" style="width: 90px">
                <option value="">All</option>
                <option value="Admin">Admin</option>
                <option value="User">User</option>
            </select>
            <button
                class="d-block mr-0 ml-auto btn btn-secondary add-new btn-primary dropdown-toggle hide-arrow"
                tabindex="0" aria-controls="Genarate_Reports"
                type="button" data-bs-toggle="dropdown" data-bs-target="#">
                <span>
                    <i class="bx bx-detail me-0 me-sm-1"></i>
                    <span class="d-none d-sm-inline-block">Generate Logs</span>
                </span>
            </button>
            <div class="dropdown-menu">
                <button type="button" class="dropdown-item" data-bs-toggle="" data-bs-target="#"><i class="bx bx-file me-2"></i> Generate Document Logs</button>
                <button type="button" class="dropdown-item" data-bs-toggle="" data-bs-target="#"><i class="bx bx-table me-2"></i> Generate Spreadsheet Logs</button>
            </div>
        </div>
        <!-- Bootstrap Table -->

        @include('livewire.admin.includes.userTypeIndicator')
        <div class="card">
            <div class="card-header" style="padding-bottom: 0">
                <h5>Audit Trail Table</h5>
            </div>
            <div class="card-datatable table-responsive text-nowrap">
                <table id="auditTrailDataTable" class="table">
                    <thead>
                        <tr align="center">
                            @include('livewire.admin.includes.table-sorttable-th', [
                                'name' => 'id',
                                'displayName' => 'Audit Trail ID'
                            ])
                            @include('livewire.admin.includes.table-sorttable-th', [
                                'name' => 'user_id',
                                'displayName' => 'Name'
                            ])
                            @include('livewire.admin.includes.table-sorttable-th', [
                                'name' => 'user_type',
                                'displayName' => 'User Type'
                            ])
                            @include('livewire.admin.includes.table-sorttable-th', [
                                'name' => 'activity_name',
                                'displayName' => 'Activity Name'
                            ])
                            @include('livewire.admin.includes.table-sorttable-th', [
                                'name' => 'created_at',
                                'displayName' => 'Created At'
                            ])
                            <th class="px-4 py-3 noselect">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($auditlogs as $audit)
                        <tr align="center">
                            <td>{{ $audit->id }}</td>
                            <td>{{ $audit->user->name }}</td>
                            <td>
                                @if ($audit->user_type == 'User')
                                    <label class="badge btn-info">User</label>
                                @elseif ($audit->user_type == 'Admin')
                                    <label class="badge btn-primary">Admin</label>
                                @else
                                    <label class="badge btn-danger">None</label>
                                @endif
                            </td>
                            <td>{{ $audit->activity_name }}</td>
                            <td>{{ $audit->created_at }}</td>
                            <td>
                                <button type="button"
                                        class="btn btn-info"
                                        style="width: 10px"
                                        wire:click="showAuditTrail({{ $audit->id }})"
                                        data-bs-toggle="modal"
                                        data-bs-target="#showActivityDetailsModal">
                                    <i class="bx bx-info-circle small"></i>
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="px-4 pt-3">
                    @include('livewire.admin.includes.table-perpage')
                    <br>
                    {{ $auditlogs->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

