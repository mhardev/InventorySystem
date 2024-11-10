<div>
    @include('livewire.client.modals.item-productsmodal')
    <div>
        <h3 class="mb-4">Products</h3>
        <!-- Basic Breadcrumb -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb" style="font-size: 12px">
                <li class="breadcrumb-item">
                    <a href="{{url('client/homepage')}}">Home</a>
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
                type="button" data-bs-toggle="modal" data-bs-target="#suggestItemProductModal">
                <span>
                    <i class="bx bx-plus me-0 me-sm-1"></i>
                    <span class="d-none d-sm-inline-block">Suggest Product</span>
                </span>
            </button>
        </div>
        <!-- Bootstrap Table -->

        @include('livewire.client.includes.stockIndicator')
        <div class="card">
            <div class="card-header" style="padding-bottom: 0">
                <h5>Product Table</h5>
            </div>
            <div class="card-datatable table-responsive text-nowrap">
                <table id="itemProductDataTable" class="table" style="letter-spacing: 0">
                    <thead>
                        <tr align="center">
                            @include('livewire.client.includes.table-sorttable-th', [
                                'name' => 'id',
                                'displayName' => '#'
                            ])
                            <th class="px-0 py-3">Product Image</th>
                            @include('livewire.client.includes.table-sorttable-th', [
                                'name' => 'item_name',
                                'displayName' => 'Product Name'
                            ])
                            @include('livewire.client.includes.table-sorttable-th', [
                                'name' => 'subcategory_id',
                                'displayName' => 'Category'
                            ])
                            @include('livewire.client.includes.table-sorttable-th', [
                                'name' => 'item_stock',
                                'displayName' => 'Quantity'
                            ])
                            <th class="px-0 py-3 noselect">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($itemproducts as $product)
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
                            <td>
                                <button type="button"
                                        class="btn btn-info"
                                        style="width: 10px"
                                        wire:click="showItemProduct({{ $product->id }})"
                                        data-bs-toggle="modal"
                                        data-bs-target="#showItemProductModal">
                                    <i class="bx bx-info-circle small"></i>
                                </button>
                                <button type="button" class="btn btn-success" style="width: 10px" wire:click="requestItemProduct({{$product->id}})" data-bs-toggle="modal" data-bs-target="#requestItemProductModal"><i class="bx bx-message-square-add small"></i></button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="px-4 pt-3">
                    @include('livewire.client.includes.table-perpage')
                    <br>
                    {{ $itemproducts->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
