<div>
    @include('livewire.admin.modals.supplier-infomodal')
    <div>
        @if(session('message'))
            <h2 class="alert alert-success">{{ session('message') }}</h2>
        @endif
        <h3 class="mb-4">Supplier Info</h3>
        <!-- Basic Breadcrumb -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb" style="font-size: 12px">
            <li class="breadcrumb-item">
                <a href="{{url('admin/dashboard')}}">Home</a>
            </li>
            <li class="breadcrumb-item active">Supplier Info</li>
            </ol>
        </nav>
        <!-- Basic Breadcrumb -->

        <div class="nav nav-pills flex-column flex-md-row mb-3">
            <div>
                <label class="py-2 mb-0">Search:</label>
                <input type="search" wire:model.live.debounce.300ms="search" wire:keydown="resetPage" class="form-control float-end mx-2 " style="width: 230px" placeholder="Search..."/>
            </div>
            <label class="py-2 mb-0">Category:</label>
            <select wire:model.live="selectedCategory" class="form-select float-end mx-2" style="width: 90px">
                <option value="">All</option>
                @foreach($itemcategories as $category)
                    <option value="{{ $category->category_name }}">{{ $category->category_name }}</option>
                @endforeach
            </select>
            <button
                class="d-block mr-0 ml-auto btn btn-secondary add-new btn-primary"
                tabindex="0" aria-controls="DataTables_Table_0"
                type="button" data-bs-toggle="modal" data-bs-target="#addSupplierInfoModal">
                <span>
                    <i class="bx bx-plus me-0 me-sm-1"></i>
                    <span class="d-none d-sm-inline-block">Add New Supplier</span>
                </span>
            </button>
        </div>
        <!-- Bootstrap Table -->

        @include('livewire.admin.includes.categoryIndicator')
        <div class="card">
            <div class="card-header" style="padding-bottom: 0">
                <h5>Supplier Table</h5>
            </div>
            <div class="card-datatable table-responsive text-nowrap">
                <table id="supplierDataTable" class="table" style="letter-spacing: 0">
                    <thead>
                        <tr align="center">
                            @include('livewire.admin.includes.table-sorttable-th', [
                                'name' => 'id',
                                'displayName' => 'Supplier ID'
                            ])
                            @include('livewire.admin.includes.table-sorttable-th', [
                                'name' => 'supplier_name',
                                'displayName' => 'Supplier Name'
                            ])
                            @include('livewire.admin.includes.table-sorttable-th', [
                                'name' => 'category_id',
                                'displayName' => 'Supplier Type'
                            ])
                            @include('livewire.admin.includes.table-sorttable-th', [
                                'name' => 'user_id',
                                'displayName' => 'Updated By'
                            ])
                            <th class="px-0 py-3 noselect">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @forelse ($suppliers as $supplier)
                            <tr align="center">
                                <td>{{ $supplier->id }}</td>
                                <td>{{ $supplier->supplier_name }}</td>
                                <td>
                                    @if ($supplier->category->category_name == 'ICT')
                                        <label class="badge btn-info">ICT</label>
                                    @elseif ($supplier->category->category_name == 'Non-ICT')
                                        <label class="badge btn-primary">Non-ICT</label>
                                    @else
                                        <label class="badge btn-danger">None</label>
                                    @endif
                                </td>
                                <td>{{ $supplier->user->name }}</td>
                                <td>
                                    <button type="button"
                                            class="btn btn-info"
                                            style="width: 10px"
                                            wire:click="showSupplierInfo({{ $supplier->id }})"
                                            data-bs-toggle="modal"
                                            data-bs-target="#showSupplierInfoModal">
                                        <i class="bx bx-info-circle small"></i>
                                    </button>
                                    <button type="button" class="btn btn-primary" style="width: 10px" wire:click="showSupplierInfo({{$supplier->id}})" data-bs-toggle="modal" data-bs-target="#updateSupplierInfoModal"><i class="bx bx-edit-alt small"></i></button>
                                    <button class='btn btn-danger' style="width: 10px" wire:click="deleteSupplierInfo({{$supplier->id}})" data-bs-toggle="modal" data-bs-target="#deleteSupplierInfoModal"><i class="bx bx-trash small"></i></button>
                                </td>
                            </tr>
                        @empty
                            <tr align="center">
                                <td colspan="7"> No Categories Available</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="px-4 pt-3">
                    @include('livewire.admin.includes.table-perpage')
                    <br>
                    <br>
                    {{ $suppliers->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
