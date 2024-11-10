<div>
    @include('livewire.admin.modals.item-requestsmodal')
    <div>
        @if(session('message'))
            <h2 class="alert alert-success">{{ session('message') }}</h2>
        @elseif(session('error'))
            <h2 class="alert alert-danger">{{ session('error') }}</h2>
        @endif
        <h3 class="mb-4">Requested Items</h3>
        <!-- Basic Breadcrumb -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb" style="font-size: 12px">
                <li class="breadcrumb-item">
                    <a href="{{url('home')}}">Home</a>
                </li>
                <li class="breadcrumb-item active">Requested Items</li>
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
        </div>

        <div class="card">
            <div class="card-header" style="padding-bottom: 0">
                <h5>Request Items Table</h5>
            </div>
            <div class="card-datatable table-responsive text-nowrap">
                <table id="itemProductDataTable" class="table" style="letter-spacing: 0">
                    <thead>
                        <tr align="center">
                            @include('livewire.admin.includes.table-sorttable-th', [
                                'name' => 'id',
                                'displayName' => '#'
                            ])
                            @include('livewire.admin.includes.table-sorttable-th', [
                                'name' => 'product_id',
                                'displayName' => 'Product Name'
                            ])
                            @include('livewire.admin.includes.table-sorttable-th', [
                                'name' => 'user_id',
                                'displayName' => 'User Name'
                            ])
                            @include('livewire.client.includes.table-sorttable-th', [
                                'name' => 'product_id',
                                'displayName' => 'Category'
                            ])
                            @include('livewire.admin.includes.table-sorttable-th', [
                                'name' => 'item_stock',
                                'displayName' => 'Quantity'
                            ])
                            @include('livewire.admin.includes.table-sorttable-th', [
                                'name' => 'status',
                                'displayName' => 'Status'
                            ])
                            <th class="px-4 py-3 noselect">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($itemrequests as $itemrequest)
                        <tr align="center">
                            <td>{{ $itemrequest->id }}</td>
                            <td>{{ $itemrequest->product->item_name }}</td>
                            <td>{{ $itemrequest->user->name }}</td>
                            <td>
                                @if ($itemrequest->product->subcategory->category->category_name == 'ICT')
                                    <label class="badge btn-info">ICT</label>
                                @elseif ($itemrequest->product->subcategory->category->category_name == 'Non-ICT')
                                    <label class="badge btn-primary">Non-ICT</label>
                                @else
                                    <label class="badge btn-danger">None</label>
                                @endif
                            </td>
                            <td>
                                @if ($itemrequest->item_stock < 6)
                                    <label class="badge btn-info">{{ $itemrequest->item_stock }}</label>
                                @elseif ($itemrequest->item_stock < 21)
                                    <label class="badge btn-info">{{ $itemrequest->item_stock }}</label>
                                @else
                                    <label class="badge btn-info">{{ $itemrequest->item_stock }}</label>
                                @endif
                            </td>
                            <td>
                                @if ($itemrequest->status == '0')
                                    <label class="badge btn-info">Pending</label>
                                @elseif ($itemrequest->status == '1')
                                    <label class="badge btn-success">Approved</label>
                                @else
                                    <label class="badge btn-danger">Cancelled</label>
                                @endif
                            </td>
                            <td>
                                <div class="dropdown">
                                    <button type="button"
                                            class="btn btn-info"
                                            style="width: 10px"
                                            wire:click="showItemRequest({{ $itemrequest->id }})"
                                            data-bs-toggle="modal"
                                            data-bs-target="#showItemRequestModal">
                                        <i class="bx bx-info-circle small"></i>
                                    </button>
                                    <button class="btn btn-primary dropdown-toggle hide-arrow" style="width: 10px" data-bs-toggle="dropdown">
                                        <i class="bx bx-message-square-edit small" ></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <button type="button" wire:click="openApproveModal({{$itemrequest->id}})" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#approvedItemRequestModal"><i class="bx bx-check text-bg-success" style="border-radius: 5px;"></i> Approved</button>
                                        <button type="button" wire:click="openCancelModal({{$itemrequest->id}})" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#cancelledItemRequestModal"><i class="bx bx-x text-bg-danger" style="border-radius: 5px;"></i> Cancelled</button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="px-4 pt-3">
                    @include('livewire.admin.includes.table-perpage')
                    <br>
                    {{ $itemrequests->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
