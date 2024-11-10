<div>
    @include('livewire.admin.modals.request-reportsmodal')
    <div>
        @if(session('message'))
            <h2 class="alert alert-success">{{ session('message') }}</h2>
        @elseif(session('error'))
            <h2 class="alert alert-danger">{{ session('error') }}</h2>
        @endif
        <h3 class="mb-4">Issued Items</h3>
        <!-- Basic Breadcrumb -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb" style="font-size: 12px">
                <li class="breadcrumb-item">
                    <a href="{{url('home')}}">Home</a>
                </li>
                <li class="breadcrumb-item active">Issued Items</li>
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
            <label class="py-2 mb-0">Stock(s):</label>
            <select wire:model.live="selectedColor" class="form-select float-end mx-2" style="width: 90px">
                <option value="">All</option>
                <option value="0">0-5</option>
                <option value="1">6-20</option>
                <option value="2">21+</option>
            </select>
            <label class="py-2 mb-0">Status:</label>
            <select wire:model.live="selectedStatus" id="statusSelect" class="form-select float-end mx-2" style="width: 100px">
                <option value="">All</option>
                <option value="1">Approved</option>
                <option value="2">Cancelled</option>
            </select>
            <button
                class="d-block mr-0 ml-auto btn btn-secondary add-new btn-primary dropdown-toggle hide-arrow"
                tabindex="0" aria-controls="Genarate_Reports"
                type="button" data-bs-toggle="dropdown" data-bs-target="#"
                style="margin-right: 1.3%;">
                <span>
                    <i class="bx bx-detail me-0 me-sm-1"></i>
                    <span class="d-none d-sm-inline-block">Generate Reports</span>
                </span>
            </button>
            <div class="dropdown-menu">
                <button type="button" class="dropdown-item" data-bs-toggle="" data-bs-target="#"><i class="bx bx-file me-2"></i> Generate Document Reports</button>
                <button type="button" class="dropdown-item" data-bs-toggle="" data-bs-target="#"><i class="bx bx-table me-2"></i> Generate Spreadsheet Reports</button>
            </div>
        </div>

        <div class="card">
            <div class="card-header" style="padding-bottom: 0">
                <h5>Issued Items Table</h5>
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
                                'name' => 'user_id',
                                'displayName' => 'User Name'
                            ])
                            @include('livewire.admin.includes.table-sorttable-th', [
                                'name' => 'product_id',
                                'displayName' => 'Product Name'
                            ])
                            @include('livewire.admin.includes.table-sorttable-th', [
                                'name' => 'total_item_stock',
                                'displayName' => 'Total Item Stock'
                            ])
                            @include('livewire.admin.includes.table-sorttable-th', [
                                'name' => 'status',
                                'displayName' => 'Status'
                            ])
                            <th class="px-0 py-3 noselect">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @php $counter = 1; @endphp
                        @foreach ($itemrequests as $itemrequest)
                        <tr align="center">
                            <td>{{ $counter++ }}</td>
                            <td>{{ $itemrequest->user_name }}</td>
                            <td>{{ $itemrequest->product_name }}</td>
                            <td>{{ $itemrequest->item_stock }}</td>
                            <td>
                                @foreach (explode(',', $itemrequest->status) as $status)
                                    @if ($status == '0')
                                        <label class="badge btn-info">Pending</label>
                                    @elseif ($status == '1')
                                        <label class="badge btn-success">Approved</label>
                                    @elseif ($status == '2')
                                        <label class="badge btn-danger">Cancelled</label>
                                    @elseif ($status == '4')
                                        <label class="badge btn-primary">Surrendered</label>
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                <button type="button"
                                        class="btn btn-info"
                                        style="width: 10px"
                                        wire:click="showItemRequest({{ $itemrequest->id }})"
                                        data-bs-toggle="modal"
                                        data-bs-target="#showItemRequestModal">
                                    <i class="bx bx-info-circle small"></i>
                                </button>
                                <button class='btn btn-danger' wire:click="openUndoModal({{ $itemrequest->id }})" style="width: 10px" data-bs-toggle="modal" data-bs-target="#undoItemRequestModal"><i class="bx bx-arrow-back small"></i></button>
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
