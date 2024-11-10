<div>
    @include('livewire.client.modals.user-itemsmodal')
    <div>
        <h3 class="mb-4">User Items</h3>
        <!-- Basic Breadcrumb -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb" style="font-size: 12px">
                <li class="breadcrumb-item">
                    <a href="{{url('client/homepage')}}">Home</a>
                </li>
                <li class="breadcrumb-item active">User Items</li>
            </ol>
        </nav>

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
            <label class="py-2 mb-0">Stock(s):</label>
            <select wire:model.live="selectedColor" class="form-select float-end mx-2" style="width: 90px">
                <option value="">All</option>
                <option value="0">0-5</option>
                <option value="1">6-20</option>
                <option value="2">21+</option>
            </select>
        </div>

        <div class="card">
            <div class="card-header" style="padding-bottom: 0">
                <h5>User Item Table</h5>
            </div>
            <div class="card-datatable table-responsive text-nowrap">
                <table id="userItemDataTable" class="table" style="letter-spacing: 0">
                    <thead>
                        <tr align="center">
                            <th class="px-0 py-3">Product Image</th>
                            @include('livewire.client.includes.table-sorttable-th', [
                                'name' => 'product_id',
                                'displayName' => 'Product Name'
                            ])
                            @include('livewire.client.includes.table-sorttable-th', [
                                'name' => 'product_id',
                                'displayName' => 'Category'
                            ])
                            @include('livewire.client.includes.table-sorttable-th', [
                                'name' => 'item_stock',
                                'displayName' => 'Quantity'
                            ])
                            <th class="px-0 py-3">Details</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        <!--@/foreach($useritems as $item)
                            <tr align="center">
                                <td><img src="{/{ asset('public/storage/uploads/products/' . $item->product->item_image) }}" width="64px"></td>
                                <td>{/{ $item->product_name }}</td>
                                <td><label class="badge btn-primary">{/{ $item->total_item_stock }}</label></td>
                                <td>
                                    @/if ($item->status == '0')
                                        <label class="badge btn-info">Pending</label>
                                    @/elseif ($item->status == '1')
                                        <label class="badge btn-success">Approved</label>
                                    @/else
                                        <label class="badge btn-danger">Cancelled</label>
                                    @/endif
                                </td>
                                <td>
                                    <button type="button" class="btn btn-danger" style="width: 10px" data-bs-toggle="modal" data-bs-target="#surrenderUserItem"><i class="bx bxs-flag-alt small"></i></button>
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button"
                                                class="btn btn-info"
                                                style="width: 10px"
                                                wire:/click="showItemRequest({/{ $item->id }})"
                                                data-bs-toggle="modal"
                                                data-bs-target="#showItemRequestModal">
                                            <i class="bx bx-info-circle small"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @/endforeach-->
                        @foreach ($useritems as $useritem)
                        <tr align="center">
                            <td><img src="{{ asset('public/storage/uploads/products/' . $useritem->itemrequest->product->item_image) }}" width="64px"></td>
                            <td>{{ $useritem->itemrequest->product->item_name }}</td>
                            <td>
                                @if ($useritem->itemrequest->product->subcategory->category->category_name == 'ICT')
                                    <label class="badge btn-info">ICT</label>
                                @elseif ($useritem->itemrequest->product->subcategory->category->category_name == 'Non-ICT')
                                    <label class="badge btn-primary">Non-ICT</label>
                                @else
                                    <label class="badge btn-danger">None</label>
                                @endif
                            </td>
                            <td><label class="badge btn-primary">{{ $useritem->item_stock }}</label></td>
                            <td>
                                <button type="button"
                                        class="btn btn-info"
                                        style="width: 10px"
                                        wire:click="showItemDetails({{ $useritem->id }})"
                                        data-bs-toggle="modal"
                                        data-bs-target="#showItemModal">
                                    <i class="bx bx-info-circle small"></i>
                                </button>
                                <button type="button" class="btn btn-danger" style="width: 10px" wire:click="openSurrenderModal({{ $useritem->id }})" data-bs-toggle="modal" data-bs-target="#surrenderItemModal"><i class="bx bxs-flag-alt small"></i></button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="px-4 pt-3">
                    @include('livewire.client.includes.table-perpage')
                    <br>
                    {{ $useritems->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
