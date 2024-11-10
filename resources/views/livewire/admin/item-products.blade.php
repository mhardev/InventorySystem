<div>
    @include('livewire.admin.modals.item-productsmodal')
    <div>
        @if(session('message'))
            <h2 class="alert alert-success">{{ session('message') }}</h2>
        @endif
        <h3 class="mb-4">Products</h3>
        <!-- Basic Breadcrumb -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb" style="font-size: 12px">
                <li class="breadcrumb-item">
                    <a href="{{url('admin/dashboard')}}">Home</a>
                </li>
                <li class="breadcrumb-item active">Products</li>
            </ol>
        </nav>
        <!-- Basic Breadcrumb -->

        <div class="nav nav-pills flex-column flex-md-row mb-3">
            <div>
                <label class="py-2 mb-0">Search:</label>
                <input type="search" wire:model.live.debounce.300ms="search" wire:keydown="resetPage" class="form-control float-end mx-2 " style="width: 230px" placeholder="Search..."/>
            </div>
            <label class="py-2 mb-0">Category:</label>
            <select wire:model.live="selectedCategory" id="categorySelect" class="form-select float-end mx-2" style="width: 90px">
                <option value="">All</option>
                @foreach($categories as $category)
                    <option value="{{ $category->category_name }}">{{ $category->category_name }}</option>
                @endforeach
            </select>
            <label class="py-2 mb-0">Quantity:</label>
            <select wire:model.live="selectedColor" class="form-select float-end mx-2" style="width: 90px">
                <option value="">All</option>
                <option value="0">0-5</option>
                <option value="1">6-20</option>
                <option value="2">21+</option>
            </select>
            <button
                class="d-block mr-0 ml-auto btn btn-secondary add-new btn-primary"
                tabindex="0" aria-controls="DataTables_Table_0"
                type="button" data-bs-toggle="modal" data-bs-target="#addItemProductModal">
                <span>
                    <i class="bx bx-plus me-0 me-sm-1"></i>
                    <span class="d-none d-sm-inline-block">Add New Product</span>
                </span>
            </button>
        </div>

        @include('livewire.admin.includes.stockIndicator')
        <div class="card">
            <div class="card-header" style="padding-bottom: 0">
                <h5>Product Table</h5>
            </div>
            <div class="card-datatable table-responsive text-nowrap">
                <table id="itemProductDataTable" class="table" style="letter-spacing: 0">
                    <thead>
                        <tr align="center">
                            @include('livewire.admin.includes.table-sorttable-th', [
                                'name' => 'id',
                                'displayName' => '#'
                            ])
                            <th class="px-0 py-3">Product Image</th>
                            @include('livewire.admin.includes.table-sorttable-th', [
                                'name' => 'item_name',
                                'displayName' => 'Product Name'
                            ])
                            @include('livewire.admin.includes.table-sorttable-th', [
                                'name' => 'subcategory_id',
                                'displayName' => 'Category'
                            ])
                            @include('livewire.admin.includes.table-sorttable-th', [
                                'name' => 'item_stock',
                                'displayName' => 'Quantity'
                            ])
                            @include('livewire.admin.includes.table-sorttable-th', [
                                'name' => 'user_id',
                                'displayName' => 'Updated By'
                            ])
                            <th class="px-4 py-3 noselect">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @forelse ($itemproducts as $product)
                            <tr align="center">
                                <td>{{ $product->id }}</td>
                                <td><img src="{{ asset('public/storage/uploads/products/' . $product->item_image) }}" width="64px"></td>
                                <td>{{ $product->item_name }}</td>
                                <td>
                                    @if ($product->subcategory->category->category_name == 'ICT')
                                        <label class="badge btn-info">ICT</label>
                                    @elseif ($product->subcategory->category->category_name == 'Non-ICT')
                                        <label class="badge btn-primary">Non-ICT</label>
                                    @else
                                        <label class="badge btn-danger">None</label>
                                    @endif
                                </td>
                                <td>
                                    @if ($product->item_stock < 6)
                                        <label class="badge btn-danger">{{ $product->item_stock }}</label>
                                    @elseif ($product->item_stock < 21)
                                        <label class="badge btn-warning">{{ $product->item_stock }}</label>
                                    @else
                                        <label class="badge btn-success">{{ $product->item_stock }}</label>
                                    @endif
                                </td>
                                <td>{{ $product->user->name }}</td>
                                <td>
                                    <button type="button"
                                            class="btn btn-info"
                                            style="width: 10px"
                                            wire:click="showItemProduct({{ $product->id }})"
                                            data-bs-toggle="modal"
                                            data-bs-target="#showItemProductModal">
                                        <i class="bx bx-info-circle small"></i>
                                    </button>
                                    <button type="button" class="btn btn-primary" style="width: 10px" data-bs-toggle="modal" data-bs-target="#updateItemProductModal" wire:click="editItemProduct({{ $product->id }})" data-subcategory-id="{{ $product->subcategory_id }}"><i class="bx bx-edit-alt small"></i></button>
                                    <button type="button" class="btn btn-success" style="width: 10px" wire:click="editItemStock({{$product->id}})" data-bs-toggle="modal" data-bs-target="#updateItemStockModal"><i class="bx bx-cart-add small"></i></button>
                                    <button class='btn btn-danger' style="width: 10px" wire:click="deleteItemProduct({{$product->id}})" data-bs-toggle="modal" data-bs-target="#deleteItemProductModal"><i class="bx bx-trash small"></i></button>
                                </td>
                            </tr>
                        @empty
                        <tr align="center">
                            <td colspan="7"> No Item Products</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="px-4 pt-3">
                    @include('livewire.admin.includes.table-perpage')
                    <br>
                    {{ $itemproducts->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
