<!-- Add Item Product Modal -->
<div wire:ignore.self class="modal fade" id="addItemProductModal" tabindex="-1" aria-labelledby="addItemProductModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="addItemProductModalLabel">Add Item Product</h1>
                <button type="button" class="btn-close" wire:click="closeModal" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="saveItemProduct($event.target)">
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            @include('livewire.admin.includes.modal-col', [
                                'labelName' => 'Item Name',
                                'wireName' => 'item_name',
                                'name' => 'item_name',
                                'placeHolder' => 'Enter item name',
                                'errorMsg' => 'item_name'
                            ])
                            <div class="col mb-3">
                                <div class="box">
                                    <label class="form-label">Sub Category</label>
                                    <div class="input-group mb-1">
                                        <select type="text" wire:model="subcategory_id" name="subcategory_id" id="subcategory_id" class="form-select">
                                            <option value="">-- Select Sub Category --</option>
                                            @foreach ($subcategories as $subcategory)
                                                <option value="{{ $subcategory->id }}">{{ $subcategory->subcategory_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('subcategory_id')
                                        <span class="error">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <div class="box">
                                    <label class="form-label">Item Category</label>
                                    <div class="input-group mb-1">
                                        <input type="text" id="category_name" class="form-control" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="col mb-3">
                                <div class="box">
                                    <label class="form-label">Item Brand</label>
                                    <div class="input-group mb-1">
                                        <select type="text" wire:model="brand_id" name="brand_id" class="form-select">
                                            <option value="">-- Select Brand --</option>
                                            @foreach ($itembrands as $brand)
                                                <option value="{{ $brand->id }}">{{ $brand->brand_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('brand_id')
                                        <span class="error">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <div class="box">
                                    <label class="form-label">Supplier</label>
                                    <div class="input-group mb-1">
                                        <select type="text" wire:model="supplier_id" name="supplier_id" class="form-select">
                                            <option value="">-- Select Supplier --</option>
                                            @foreach ($suppliers as $supplier)
                                                <option value="{{ $supplier->id }}">{{ $supplier->supplier_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('supplier_id')
                                        <span class="error">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            @include('livewire.admin.includes.modal-col', [
                                'labelName' => 'Serial Number',
                                'wireName' => 'item_sn',
                                'name' => 'item_sn',
                                'placeHolder' => 'Enter serial number',
                                'errorMsg' => 'item_sn'
                            ])
                        </div>
                        <div class="row">
                            @include('livewire.admin.includes.modal-col', [
                                'labelName' => 'Model Number',
                                'wireName' => 'item_mn',
                                'name' => 'item_mn',
                                'placeHolder' => 'Enter model number',
                                'errorMsg' => 'item_mn'
                            ])
                            @include('livewire.admin.includes.modal-col', [
                                'labelName' => 'Stock(s)',
                                'wireName' => 'item_stock',
                                'name' => 'item_stock',
                                'placeHolder' => 'Enter item stock',
                                'errorMsg' => 'item_stock'
                            ])
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <div class="box">
                                    <label class="form-label">Status</label>
                                    <div class="input-group mb-1">
                                        <select type="text" class="form-select" wire:model="status" name="status">
                                            <option selected>-- Select Status --</option>
                                            <option value="0">Active</option>
                                            <option value="1">Inactive</option>
                                        </select>
                                    </div>
                                    @error('status')
                                        <span class="error">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col mb-3">
                                <div class="box">
                                    <label class="form-label">Item Image</label>
                                    <div class="input-group mb-1">
                                        <input type="file" wire:model="item_image" name="item_image" class="form-control" placeholder="Upload image" accept="image/png, image/jpeg">
                                    </div>
                                    @error('item_image')
                                        <span class="error">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <div class="box">
                                    <label class="form-label">Item Description</label>
                                    <textarea class="form-control" wire:model="item_details" name="item_details" rows="" style="text-align: start;"></textarea>
                                </div>
                            </div>
                            <div class="col mb-3">
                                <div class="box">
                                    <label class="form-label">Remarks</label>
                                    <textarea class="form-control" wire:model="item_remark" name="item_remark" rows="" style="text-align: start;"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click="closeModal" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Update Item Product Modal -->
<div wire:ignore.self class="modal fade" id="updateItemProductModal" tabindex="-1" aria-labelledby="updateItemProductLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="updateItemProductLabel">Update Item Product Info</h1>
                <button type="button" class="btn-close" wire:click="closeModal" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="updateItemProduct">
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            @include('livewire.admin.includes.modal-col', [
                                'labelName' => 'Item Name',
                                'wireName' => 'item_name',
                                'name' => 'item_name',
                                'placeHolder' => 'Enter item name',
                                'errorMsg' => 'item_name'
                            ])
                            <div class="col mb-3">
                                <div class="box">
                                    <label class="form-label">Sub Category</label>
                                    <div class="input-group mb-1">
                                        <select type="text" wire:model="subcategory_id" name="subcategory_id" id="subcategory_id" class="form-select">
                                            <option value="">-- Select Sub Category --</option>
                                            @foreach ($subcategories as $subcategory)
                                                <option value="{{ $subcategory->id }}">{{ $subcategory->subcategory_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('subcategory_id')
                                        <span class="error">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <div class="col mb-3">
                                    <div class="box">
                                        <label class="form-label">Item Category</label>
                                        <div class="input-group mb-1">
                                            <input type="text" id="category_name" wire:model="category_name" name="category_name" class="form-control" disabled>
                                        </div>
                                        @error($category_name)
                                            <span class="error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col mb-3">
                                <div class="box">
                                    <label class="form-label">Item Brand</label>
                                    <div class="input-group mb-1">
                                        <select type="text" wire:model="brand_id" name="brand_id" class="form-select">
                                            <option value="">-- Select Brand --</option>
                                            @foreach ($itembrands as $brand)
                                                <option value="{{ $brand->id }}">{{ $brand->brand_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('brand_id')
                                        <span class="error">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <div class="box">
                                    <label class="form-label">Supplier</label>
                                    <div class="input-group mb-1">
                                        <select type="text" wire:model="supplier_id" name="supplier_id" class="form-select">
                                            <option value="">-- Select Supplier --</option>
                                            @foreach ($suppliers as $supplier)
                                                <option value="{{ $supplier->id }}">{{ $supplier->supplier_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('supplier_id')
                                        <span class="error">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            @include('livewire.admin.includes.modal-col', [
                                'labelName' => 'Serial Number',
                                'wireName' => 'item_sn',
                                'name' => 'item_sn',
                                'placeHolder' => 'Enter serial number',
                                'errorMsg' => 'item_sn'
                            ])
                        </div>
                        <div class="row">
                            @include('livewire.admin.includes.modal-col', [
                                'labelName' => 'Model Number',
                                'wireName' => 'item_mn',
                                'name' => 'item_mn',
                                'placeHolder' => 'Enter model number',
                                'errorMsg' => 'item_mn'
                            ])
                            <div class="col mb-3">
                                <div class="box">
                                    <label class="form-label">Status</label>
                                    <div class="input-group mb-3">
                                        <select type="text" class="form-select" wire:model="status" name="status">
                                            <option selected>-- Select Status --</option>
                                            <option value="0">Active</option>
                                            <option value="1">Inactive</option>
                                        </select>
                                    </div>
                                    @error('status')
                                        <span class="error">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <div class="box">
                                    <label class="form-label">Item Description</label>
                                    <textarea class="form-control" wire:model="item_details" name="item_details" rows="" style="text-align: start;"></textarea>
                                </div>
                            </div>
                            <div class="col mb-3">
                                <div class="box">
                                    <label class="form-label">Remarks</label>
                                    <textarea class="form-control" wire:model="item_remark" name="item_remark" rows="" style="text-align: start;"></textarea>
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

<!-- Update Item Stock Modal -->
<div wire:ignore.self class="modal fade" id="updateItemStockModal" tabindex="-1" aria-labelledby="updateItemStockLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="updateItemStockLabel">Update Item Stock</h1>
                <button type="button" class="btn-close" wire:click="closeModal" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="updateItemStock">
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
                                    <label class="form-label">Current Stock(s)</label>
                                    <div class="input-group mb-1">
                                        <input type="text" wire:model="current_item_stock" name="current_item_stock" id="current_item_stock" class="form-control" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col mb-3">
                                <div class="box">
                                    <label class="form-label"><b>+</b>&ensp;New Stock(s)</label>
                                    <div class="input-group mb-1">
                                        <input type="text" wire:model="new_item_stock" name="new_item_stock" id="new_item_stock" class="form-control" placeholder="Enter item stock"
                                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" />
                                    </div>
                                    @error('new_item_stock')
                                        <span class="error">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col mb-3">
                                <div class="box">
                                    <label class="form-label"><b>=</b>&ensp;Total Stock(s)</label>
                                    <div class="input-group mb-1">
                                        <input type="text" class="form-control" wire:model="total_stock" id="total_stock" disabled>
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
                            <li class="nav-item">
                                <button
                                type="button"
                                class="nav-link"
                                role="tab"
                                data-bs-toggle="tab"
                                data-bs-target="#navs-top-description"
                                aria-controls="navs-top-description"
                                aria-selected="true">
                                Item Product Description
                                </button>
                            </li>
                            <li class="nav-item">
                                <button
                                type="button"
                                class="nav-link"
                                role="tab"
                                data-bs-toggle="tab"
                                data-bs-target="#navs-top-profile"
                                aria-controls="navs-top-profile"
                                aria-selected="false">
                                History
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
                                                    <input type="text" class="form-control noselect" value="{{ $selectedItemProduct->item_name }}" disabled>
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
                                <div class="tab-pane fade" id="navs-top-description" role="tabpanel">
                                    <div class="row">
                                        <div class="col mb-3">
                                            <div class="box">
                                                <label class="form-label">Item Description</label>
                                                <textarea class="form-control" rows="5" style="text-align: start;" disabled>{{ $selectedItemProduct->item_details }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="navs-top-profile" role="tabpanel">
                                    <div class="input-group mb-1">
                                        <label class="form-label">Item Created At:&emsp;&emsp;&ensp;{{ $selectedItemProduct->created_at }}&#13;&#10;</label>
                                    </div>
                                    <div class="input-group mb-1">
                                        <label class="form-label">Item Updated At: &emsp;&ensp;&ensp;{{ $selectedItemProduct->updated_at }}&#13;&#10;</label>
                                    </div>
                                    <div class="input-group mb-1">
                                        <label class="form-label">Item Upadated By:&emsp;&ensp;{{ $selectedItemProduct->user->name }}&#13;&#10;</label>
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

<!-- Delete Item Product Modal -->
<div wire:ignore.self class="modal fade" id="deleteItemProductModal" tabindex="-1" aria-labelledby="deleteItemProductModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="deleteItemProductModalLabel">Delete Item Product</h1>
                <button type="button" class="btn-close" wire:click="closeModal" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="destroyItemProduct">
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <h4 style="text-align: center">Are you sure you want to delete this item?</h4>
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
