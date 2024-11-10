<!-- Approved Item Request Modal -->
<div wire:ignore.self class="modal fade" id="approvedItemRequestModal" tabindex="-1" aria-labelledby="approvedItemRequestModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="approvedItemRequestModalLabel">Approved Item Request</h1>
                <button type="button" class="btn-close" wire:click="closeModal" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="approveItemRequest">
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <h4 style="text-align: center">Are you sure you want to approve this Item Request?</h4>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click="closeModal" data-bs-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-primary">Yes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Cancelled Item Request Modal -->
<div wire:ignore.self class="modal fade" id="cancelledItemRequestModal" tabindex="-1" aria-labelledby="cancelledItemRequestModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="cancelledItemRequestModalLabel">Cancelled Item Request</h1>
                <button type="button" class="btn-close" wire:click="closeModal" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="cancelItemRequest">
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col mb-3">
                                <div class="box">
                                    <label class="form-label">Remarks</label>
                                    <div class="input-group mb-1">
                                        <select wire:model="request_remark" name="request_remark" class="form-select">
                                            <option selected>-- Select Remarks --</option>
                                            <option value="Request For cancellation">Request for cancellation</option>
                                            <option value="Change of item">Change of item</option>
                                            <option value="Out of stocks">Out of stocks</option>
                                        </select>
                                    </div>
                                    @error('request_remark')
                                        <span class="error">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click="closeModal" data-bs-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-primary">Yes</button>
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
                                                <label class="form-label">User Name:</label>
                                                <div class="input-group mb-1">
                                                    <input type="text" class="form-control noselect" value="{{ $selectedItemRequest->user->name }}" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
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
                                        <div class="col mb-3">
                                            <div class="box">
                                                <label class="form-label">Created At:</label>
                                                <div class="input-group mb-1">
                                                    <input type="text" class="form-control noselect" value="{{ $selectedItemRequest->created_at }}" disabled>
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
