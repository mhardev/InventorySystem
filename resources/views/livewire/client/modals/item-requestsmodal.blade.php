<!-- Request Item Product Modal -->
<div wire:ignore.self class="modal fade" id="itemRequestModal" tabindex="-1" aria-labelledby="itemRequestModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="itemRequestLabel">Item Request</h1>
                <button type="button" class="btn-close" wire:click="closeModal" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="requestItemProduct">
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            @include('livewire.admin.includes.modal-col', [
                                'labelName' => 'Item Name',
                                'wireName' => 'item_name',
                                'name' => 'item_name',
                                'placeHolder' => '',
                                'errorMsg' => 'item_name'
                            ])
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <div class="box">
                                    <label class="form-label">Enter Stock(s)</label>
                                    <div class="input-group mb-1">
                                        <input type="text" wire:model="item_stock" name="item_stock" id="item_stock" class="form-control" placeholder="Enter item stock"
                                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" />
                                    </div>
                                    @error('item_stock')
                                        <span class="error">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click="closeModal" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- View Request Details Modal -->
<div wire:ignore.self class="modal fade" id="showItemRequestModal" tabindex="-1" aria-labelledby="showItemRequestModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="showItemRequestModalLabel">Request Info</h1>
                <button type="button" class="btn-close" wire:click="closeModal" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form>
                <div class="modal-body">
                    <div class="col-xl-auto">
                        <div class="nav-align-top mb-4">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <button
                                    type="button"
                                    class="nav-link active"
                                    role="tab"
                                    data-bs-toggle="tab"
                                    data-bs-target="#navs-top-request"
                                    aria-controls="navs-top-request"
                                    aria-selected="true">
                                    Item Request Details
                                    </button>
                                </li>
                                <li class="nav-item">
                                    <button
                                    type="button"
                                    class="nav-link"
                                    role="tab"
                                    data-bs-toggle="tab"
                                    data-bs-target="#navs-top-item"
                                    aria-controls="navs-top-item"
                                    aria-selected="true">
                                    Item Product Details
                                    </button>
                                </li>
                            </ul>
                            <div class="tab-content">
                                @if ($selectedItemRequest)
                                <div class="tab-pane fade show active" id="navs-top-request" role="tabpanel">
                                    <div class="row">
                                        <div class="col mb-3">
                                            <div class="box">
                                                <label class="form-label">Request ID:</label>
                                                <div class="input-group mb-1">
                                                    <input type="text" class="form-control noselect" value="{{ $selectedItemRequest->id }}" disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col mb-3">
                                            <div class="box">
                                                <label class="form-label">Item Name:</label>
                                                <div class="input-group mb-1">
                                                    <input type="text" class="form-control noselect" value="{{ $selectedItemRequest->product->item_name }}" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col mb-3">
                                            <div class="box">
                                                <label class="form-label">Item Stock(s):</label>
                                                <div class="input-group mb-1">
                                                    <input type="text" class="form-control noselect" value="{{ $selectedItemRequest->item_stock }}" disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col mb-3">
                                            <div class="box">
                                                <label class="form-label">Status:</label>
                                                <div class="input-group mb-1">
                                                    <input type="text" class="form-control noselect"
                                                    @if ($selectedItemRequest->status == '0')
                                                        value="Pending"
                                                    @elseif ($selectedItemRequest->status == '1')
                                                        value="Approved"
                                                    @elseif ($selectedItemRequest->status == '2')
                                                        value="Cancelled"
                                                    @endif disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade show" id="navs-top-item" role="tabpanel">
                                    <div class="row">
                                        <div class="col mb-3">
                                            <div class="box">
                                                <label class="form-label">Item Name:</label>
                                                <div class="input-group mb-1">
                                                    <input type="text" class="form-control noselect" value="{{ $selectedItemRequest->product->item_name }}" disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col mb-3">
                                            <div class="box">
                                                <label class="form-label">Item Category:</label>
                                                <div class="input-group mb-1">
                                                    <input type="text" class="form-control noselect" value="{{ $selectedItemRequest->product->subcategory->category->category_name }}" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col mb-3">
                                            <div class="box">
                                                <label class="form-label">Item Sub Category:</label>
                                                <div class="input-group mb-1">
                                                    <input type="text" class="form-control noselect" value="{{ $selectedItemRequest->product->subcategory->subcategory_name }}" disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col mb-3">
                                            <div class="box">
                                                <label class="form-label">Item Brand Name:</label>
                                                <div class="input-group mb-1">
                                                    <input type="text" class="form-control noselect" value="{{ $selectedItemRequest->product->brand->brand_name }}" disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col mb-3">
                                            <div class="box">
                                                <label class="form-label">Serial Number:</label>
                                                <div class="input-group mb-1">
                                                    <input type="text" class="form-control noselect" value="{{ $selectedItemRequest->product->item_sn }}" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col mb-3">
                                            <div class="box">
                                                <label class="form-label">Model Number:</label>
                                                <div class="input-group mb-1">
                                                    <input type="text" class="form-control noselect" value="{{ $selectedItemRequest->product->item_mn }}" disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col mb-3">
                                            <div class="box">
                                                <label class="form-label">Item Image:</label>
                                                <div class="input-group mb-1">
                                                    <img src="{{ asset('storage/uploads/products/' . $selectedItemRequest->product->item_image) }}" width="84px" style="display: block;margin-left: auto;margin-right: auto;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click="closeModal" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Update Request Item Quantity Modal -->
<div wire:ignore.self class="modal fade" id="updateRequestQuantityModal" tabindex="-1" aria-labelledby="updateRequestQuantityModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="updateRequestQuantityModalLabel">Update Item Stock</h1>
                <button type="button" class="btn-close" wire:click="closeModal" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="updateRequestItemStock">
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            @include('livewire.admin.includes.modal-col', [
                                'labelName' => 'Item Name',
                                'wireName' => 'item_name',
                                'name' => 'item_name',
                                'placeHolder' => '',
                                'errorMsg' => 'item_name'
                            ])
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <div class="box">
                                    <label class="form-label">Current Quantity</label>
                                    <div class="input-group mb-1">
                                        <input type="text" wire:model="current_request_stock" name="current_request_stock" id="current_request_stock" class="form-control" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col mb-3">
                                <div class="box">
                                    <label class="form-label"><b>+</b>&ensp;New Quantity</label>
                                    <div class="input-group mb-1">
                                        <input type="text" wire:model="new_request_stock" name="new_request_stock" id="new_request_stock" class="form-control" placeholder="Enter quantity"
                                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" />
                                    </div>
                                    @error('new_request_stock')
                                        <span class="error">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col mb-3">
                                <div class="box">
                                    <label class="form-label"><b>=</b>&ensp;Total Quantity</label>
                                    <div class="input-group mb-1">
                                        <input type="text" class="form-control" wire:model="total_request_stock" id="total_request_stock" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click="closeModal" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

