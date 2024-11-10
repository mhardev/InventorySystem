<div>
    @include('livewire.admin.modals.item-brandsmodal')
    <div>
        <h3 class="mb-4">Item Brands</h3>
        <!-- Basic Breadcrumb -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb" style="font-size: 12px">
              <li class="breadcrumb-item">
                <a href="{{url('admin/dashboard')}}">Home</a>
              </li>
              <li class="breadcrumb-item active">Item Brands</li>
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
                type="button" data-bs-toggle="modal" data-bs-target="#addItemBrandModal">
                <span>
                    <i class="bx bx-plus me-0 me-sm-1"></i>
                    <span class="d-none d-sm-inline-block">Add New Brand</span>
                </span>
            </button>
        </div>
        <!-- Bootstrap Table -->

        @include('livewire.admin.includes.categoryIndicator')
        <div class="card">
            <div class="card-header" style="padding-bottom: 0">
                <h5>Item Brand Table</h5>
            </div>
            <div class="card-datatable table-responsive text-nowrap">
                <table id="itemBrandDataTable" class="table">
                <thead>
                    <tr align="center">
                        @include('livewire.admin.includes.table-sorttable-th', [
                            'name' => 'id',
                            'displayName' => 'Item Brand ID'
                        ])
                        @include('livewire.admin.includes.table-sorttable-th', [
                            'name' => 'brand_name',
                            'displayName' => 'Item Brand Name'
                        ])@include('livewire.admin.includes.table-sorttable-th', [
                            'name' => 'category_id',
                            'displayName' => 'Brand Category'
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
                    @forelse ($itembrands as $brand)
                        <tr  align="center">
                            <td>{{ $brand->id }}</td>
                            <td>{{ $brand->brand_name }}</td>
                            <td>
                                @if ($brand->category->category_name == 'ICT')
                                    <label class="badge btn-info">ICT</label>
                                @elseif ($brand->category->category_name == 'Non-ICT')
                                    <label class="badge btn-primary">Non-ICT</label>
                                @else
                                    <label class="badge btn-danger">None</label>
                                @endif
                            </td>
                            <td>{{ $brand->updated_at }}</td>
                            <td>{{ $brand->user->name }}</td>
                            <td>
                                <button type="button" class="btn btn-primary" style="width: 10px" wire:click="editItemBrand({{$brand->id}})" data-bs-toggle="modal" data-bs-target="#updateItemBrandModal"><i class="bx bx-edit-alt small"></i></button>
                                <button class='btn btn-danger' style="width: 10px" wire:click="deleteItemBrand({{$brand->id}})" data-bs-toggle="modal" data-bs-target="#deleteItemBrandModal"><i class="bx bx-trash small"></i></button>
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
                    {{ $itembrands->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
