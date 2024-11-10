<!-- Request Item Product Modal -->
<div wire:ignore.self class="modal fade" id="requestItemProductModal" tabindex="-1" aria-labelledby="requestItemProductLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="requestItemProductLabel">Request Item Product</h1>
                <button type="button" class="btn-close" wire:click="closeModal" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="saveRequestedItem">
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col mb-3">
                                <div class="box">
                                    <label class="form-label">Item Name:</label>
                                    <!-- Add conditional check -->
                                    @if ($selectedItemProduct)
                                    <div class="input-group mb-1">
                                        <input type="text" class="form-control noselect" value="{{ $selectedItemProduct->item_name }}" disabled>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <div class="box">
                                    <label class="form-label">Item Image:</label>
                                    <!-- Add conditional check -->
                                    @if ($selectedItemProduct)
                                        <img src="{{ asset('storage/uploads/products/' . $selectedItemProduct->item_image) }}" width="84px" style="display: block;margin-left: auto;margin-right: auto;">
                                    @endif
                                </div>
                            </div>
                            <div class="col mb-3">
                                <div class="box">
                                    <label class="form-label">Enter Stock(s)</label>
                                    <div class="input-group mb-1">
                                        <input type="text" wire:model="item_stock" name="item_stock" id="item_stock" class="form-control" placeholder="Enter item stock"
                                        oninput="this.value = this.value.replace(/[^0-9]/g, '');">
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
                    <button type="submit" class="btn btn-primary">Request</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Suggest Item Product Modal -->
<div wire:ignore.self class="modal fade" id="suggestItemProductModal" tabindex="-1" aria-labelledby="suggestItemProductModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="suggestItemProductModalLabel">Suggest Item Product</h1>
                <button type="button" class="btn-close" wire:click="closeModal" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="suggestItemProduct">
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col mb-3">
                                <div class="box">
                                    <label class="form-label">Select Item Product</label>
                                    <div class="input-group mb-1">
                                        <select type="text" wire:model="subcategory_id" name="subcategory_id" id="subcategory_id" class="form-select">
                                            <option value="">-- Select Item Product --</option>
                                            @foreach ($itemproducts as $product)
                                                <option value="{{ $product->id }}">{{ $product->item_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('subcategory_id')
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

<!-- View Item Product Info Modal -->
<div wire:ignore.self class="modal fade" id="showItemProductModal" tabindex="-1" aria-labelledby="showItemProductModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="showItemProductModalLabel">Item Product Info</h1>
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
                                data-bs-target="#navs-top-home"
                                aria-controls="navs-top-home"
                                aria-selected="true">
                                Item Product Info
                                </button>
                            </li>
                            </ul>
                            <div class="tab-content">
                                @if($selectedItemProduct)
                                <div class="tab-pane fade show active" id="navs-top-home" role="tabpanel">
                                    <div class="row">
                                        <div class="col mb-3">
                                            <div class="box">
                                                <label class="form-label">Item Name:</label>
                                                <div class="input-group mb-1">
                                                    <input type="text" class="form-control noselect" value="{{ $selectedItemProduct->item_name}}" disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col mb-3">
                                            <div class="box">
                                                <label class="form-label">Item Category:</label>
                                                <div class="input-group mb-1">
                                                    <input type="text" class="form-control noselect" value="{{ $selectedItemProduct->subcategory->category->category_name}}" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col mb-3">
                                            <div class="box">
                                                <label class="form-label">Item Sub Category:</label>
                                                <div class="input-group mb-1">
                                                    <input type="text" class="form-control noselect" value="{{ $selectedItemProduct->subcategory->subcategory_name }}" disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col mb-3">
                                            <div class="box">
                                                <label class="form-label">Item Brand Name:</label>
                                                <div class="input-group mb-1">
                                                    <input type="text" class="form-control noselect" value="{{ $selectedItemProduct->brand->brand_name }}" disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col mb-3">
                                            <div class="box">
                                                <label class="form-label">Serial Number:</label>
                                                <div class="input-group mb-1">
                                                    <input type="text" class="form-control noselect" value="{{ $selectedItemProduct->item_sn }}" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col mb-3">
                                            <div class="box">
                                                <label class="form-label">Model Number:</label>
                                                <div class="input-group mb-1">
                                                    <input type="text" class="form-control noselect" value="{{ $selectedItemProduct->item_mn }}" disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col mb-3">
                                            <div class="box">
                                                <label class="form-label">Item Stock(s):</label>
                                                <div class="input-group mb-1">
                                                    <input type="text" class="form-control noselect" value="{{ $selectedItemProduct->item_stock }}" disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col mb-3">
                                            <div class="box">
                                                <label class="form-label">Item Image:</label>
                                                <div class="input-group mb-1">
                                                    <img src="{{ asset('storage/uploads/products/' . $selectedItemProduct->item_image) }}" width="84px" style="display: block;margin-left: auto;margin-right: auto;">
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

