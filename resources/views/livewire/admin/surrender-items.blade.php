<div>
    @include('livewire.admin.modals.surrender-itemsmodal')
    <div>
        @if(session('message'))
            <h2 class="alert alert-success">{{ session('message') }}</h2>
        @elseif(session('error'))
            <h2 class="alert alert-danger">{{ session('error') }}</h2>
        @endif
        <h3 class="mb-4">Surrendered Items</h3>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb" style="font-style: 12px">
                <li class="breadcrumb-item">
                    <a href="{{url('admin/dashboard')}}">Home</a>
                </li>
                <li class="breadcrumb-item active">Surrendered Items</li>
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
        </div>

        <div class="card">
            <div class="card-header" style="padding-bottom: 0">
                <h5>Surrender Item Table</h5>
            </div>
            <div class="card-datatable table-responsive text-nowrap">
                <table id="surrenderItemTable" class="table" style="letter-spacing: 0">
                    <thead>
                        <tr align="center">
                            @include('livewire.admin.includes.table-sorttable-th', [
                                'name' => 'useritem_id',
                                'displayName' => 'User Item #'
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
                        @foreach ($surrenderitems as $surrenderitem)
                        <tr align="center">
                            <td>{{ $surrenderitem->useritem_id }}</td>
                            <td>{{ $surrenderitem->product->item_name }}</td>
                            <td>{{ $surrenderitem->user->name }}</td>
                            <td>
                                @if ($surrenderitem->product->subcategory->category->category_name == 'ICT')
                                    <label class="badge btn-info">ICT</label>
                                @elseif ($surrenderitem->product->subcategory->category->category_name == 'Non-ICT')
                                    <label class="badge btn-primary">Non-ICT</label>
                                @else
                                    <label class="badge btn-danger">None</label>
                                @endif
                            </td>
                            <td>
                                @if ($surrenderitem->item_stock < 6)
                                    <label class="badge btn-secondary">{{ $surrenderitem->item_stock }}</label>
                                @elseif ($surrenderitem->item_stock < 21)
                                    <label class="badge btn-secondary">{{ $surrenderitem->item_stock }}</label>
                                @else
                                    <label class="badge btn-secondary">{{ $surrenderitem->item_stock }}</label>
                                @endif
                            </td>
                            <td>
                                @if ($surrenderitem->status == '3')
                                    <label class="badge btn-warning">For Surrender</label>
                                @elseif ($surrenderitem->status == '1')
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
                                            wire:click="showItemRequest({{ $surrenderitem->id }})"
                                            data-bs-toggle="modal"
                                            data-bs-target="#showItemRequestModal">
                                        <i class="bx bx-info-circle small"></i>
                                    </button>
                                    <button class="btn btn-primary dropdown-toggle hide-arrow" style="width: 10px" data-bs-toggle="dropdown">
                                        <i class="bx bx-message-square-edit small" ></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <button type="button" wire:click="openSurrenderModal({{$surrenderitem->id}})" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#surrenderItemRequestModal"><i class="bx bxs-flag-alt text-bg-danger" style="border-radius: 5px;"></i> Surrender</button>
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
                    {{ $surrenderitems->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
