<div>
    @include('livewire.admin.modals.item-categorymodal')
    <div>
        @if(session('message'))
            <h2 class="alert alert-success">{{ session('message') }}</h2>
        @endif
        <h3 class="mb-4">Main Categories</h3>
        <!-- Basic Breadcrumb -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb" style="font-size: 12px">
            <li class="breadcrumb-item">
                <a href="{{url('admin/dashboard')}}">Home</a>
            </li>
            <li class="breadcrumb-item">Item Categories</li>
            <li class="breadcrumb-item active">Main Categories</li>
            </ol>
        </nav>
        <!-- Basic Breadcrumb -->

        <div class="nav nav-pills flex-column flex-md-row mb-3">
            <div>
                <label class="py-2 mb-0">Search:</label>
                <input type="search" wire:model.live.debounce.300ms="search" wire:keydown="resetPage" class="form-control float-end mx-2 " style="width: 230px" placeholder="Search..."/>
            </div>
            <button
                class="d-block mr-0 ml-auto btn btn-secondary add-new btn-primary"
                tabindex="0" aria-controls="DataTables_Table_0"
                type="button" data-bs-toggle="modal" data-bs-target="#addItemCategoryModal">
                <span>
                    <i class="bx bx-plus me-0 me-sm-1"></i>
                    <span class="d-none d-sm-inline-block">Add New Category</span>
                </span>
            </button>
        </div>
        <!-- Bootstrap Table -->

        @include('livewire.admin.includes.categoryIndicator')
        <div class="card">
            <h5 class="card-header">Item Category Table</h5>
            <div class="card-datatable table-responsive text-nowrap">
                <table id="itemCategoryDataTable" class="table">
                    <thead>
                        <tr align="center">
                            @include('livewire.admin.includes.table-sorttable-th', [
                                'name' => 'id',
                                'displayName' => 'Item Category ID'
                            ])
                            @include('livewire.admin.includes.table-sorttable-th', [
                                'name' => 'category_name',
                                'displayName' => 'Category Name'
                            ])
                            @include('livewire.admin.includes.table-sorttable-th', [
                                'name' => 'created_at',
                                'displayName' => 'Created At'
                            ])
                            @include('livewire.admin.includes.table-sorttable-th', [
                                'name' => 'updated_at',
                                'displayName' => 'Updated At'
                            ])
                            @include('livewire.admin.includes.table-sorttable-th', [
                                'name' => 'user_id',
                                'displayName' => 'Updated By'
                            ])
                            <th class="px-4 py-3 noselect">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @forelse ($itemcategories as $category)
                            <tr align="center">
                                <td>{{ $category->id }}</td>
                                <td>
                                    @if ($category->category_name == 'ICT')
                                        <label class="badge btn-info">ICT</label>
                                    @elseif ($category->category_name == 'Non-ICT')
                                        <label class="badge btn-primary">Non-ICT</label>
                                    @elseif ($category->category_name == 'PPE')
                                        <label class="badge btn-secondary">PPE</label>
                                    @else
                                        <label class="badge btn-danger">None</label>
                                    @endif
                                </td>
                                <td>{{ $category->created_at }}</td>
                                <td>{{ $category->updated_at }}</td>
                                <td>{{ $category->user->name }}</td>
                                <td>
                                    <button type="button" class="btn btn-primary" style="width: 10px" wire:click="editItemCategory({{$category->id}})" data-bs-toggle="modal" data-bs-target="#updateItemCategoryModal"><i class="bx bx-edit-alt small"></i></button>
                                    <button class='btn btn-danger' style="width: 10px" wire:click="deleteItemCategory({{$category->id}})" data-bs-toggle="modal" data-bs-target="#deleteItemCategoryModal"><i class="bx bx-trash small"></i></button>
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
                    {{ $itemcategories->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
