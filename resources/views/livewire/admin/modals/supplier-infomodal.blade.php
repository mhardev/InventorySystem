<!-- Add Supplier Modal -->
<div wire:ignore.self class="modal fade" id="addSupplierInfoModal" tabindex="-1" aria-labelledby="addSupplierInfoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="addSupplierInfoModalLabel">Add Supplier</h1>
                <button type="button" class="btn-close" wire:click="closeModal" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="saveSupplierInfo($event.target)">
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col mb-3">
                                <div class="box">
                                    <label class="form-label">Supplier Name</label>
                                    <div class="input-group mb-1">
                                        <input type="text" wire:model="supplier_name" name="supplier_name" class="form-control" placeholder="Enter supplier name">
                                        @error('supplier_name') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col mb-3">
                                <div class="box">
                                    <label class="form-label">Supplier Type</label>
                                    <div class="input-group mb-1">
                                        <select type="text" wire:model="category_id" name="category_id" class="form-select">
                                            <option value="">-- Select Type --</option>
                                            @foreach ($itemcategories as $category)
                                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('category_id')
                                        <span class="error">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <div class="box">
                                    <label class="form-label">Supplier Contact Number</label>
                                    <div class="input-group mb-1 input-group-merge">
                                        <span class="input-group-text">PH (+63)</span>
                                        <input type="text" wire:model="supplier_contact" name="supplier_contact" class="form-control" placeholder="Enter contact number">
                                        @error('supplier_contact') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col mb-3">
                                <div class="box">
                                    <label class="form-label">Supplier Email</label>
                                    <div class="input-group mb-1">
                                        <input type="text" wire:model="supplier_email" name="supplier_email" class="form-control" placeholder="Enter supplier email">
                                        @error('supplier_email') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <div class="box">
                                    <label class="form-label">Supplier Owner</label>
                                    <div class="input-group mb-1">
                                        <input type="text" wire:model="supplier_owner" name="supplier_owner" class="form-control" placeholder="Enter supplier owner">
                                        @error('supplier_owner') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col mb-3">
                                <div class="box">
                                    <label class="form-label">Supplier Address</label>
                                    <div class="input-group mb-1">
                                        <input type="text" wire:model="supplier_address" name="supplier_address" class="form-control" placeholder="Enter supplier address">
                                        @error('supplier_address') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <div class="box">
                                    <label class="form-label">Supplier City</label>
                                    <div class="input-group mb-1">
                                        <input type="text" wire:model="supplier_city" name="supplier_city" class="form-control" placeholder="Enter supplier city">
                                        @error('supplier_city') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col mb-3">
                                <div class="box">
                                    <label class="form-label">Supplier TIN Number</label>
                                    <div class="input-group mb-1">
                                        <input type="text" wire:model="supplier_tin" name="supplier_tin" class="form-control" placeholder="Enter supplier TIN number">
                                        @error('supplier_tin') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <div class="box">
                                    <label class="form-label">Business Permit</label>
                                    <div class="input-group mb-1">
                                        <input type="text" wire:model="supplier_bp" name="supplier_bp" class="form-control" placeholder="Enter business permit">
                                        @error('supplier_bp') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col mb-3">
                                <div class="box">
                                    <label class="form-label">JePS Cert. Number</label>
                                    <div class="input-group mb-1">
                                        <input type="text" wire:model="supplier_jepscert" name="supplier_jepscert" class="form-control" placeholder="Enter JePS cert. number">
                                        @error('supplier_jepscert') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <div class="box">
                                    <label class="form-label">Mayor's Permit</label>
                                    <div class="input-group mb-1">
                                        <input type="text" wire:model="supplier_myrp" name="supplier_myrp" class="form-control" placeholder="Enter mayor's permit">
                                        @error('supplier_myrp') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col mb-3">
                                <div class="box">
                                    <label class="form-label">Phil Cert. Number</label>
                                    <div class="input-group mb-1">
                                        <input type="text" wire:model="supplier_philcert" name="supplier_philcert" class="form-control" placeholder="Enter Phil cert. number">
                                        @error('supplier_philcert') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>
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
                                    <label class="form-label">Remarks</label><textarea class="form-control" wire:model="supplier_remark" name="supplier_remark" rows="" style="text-align: start;"></textarea>
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

<!-- Update Supplier Info Modal -->
<div wire:ignore.self class="modal fade" id="updateSupplierInfoModal" tabindex="-1" aria-labelledby="updateSupplierInfoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="updateSupplierInfoModalLabel">Update Supplier Info</h1>
                <button type="button" class="btn-close" wire:click="closeModal" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="updateSupplierInfo">
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col mb-3">
                                <div class="box">
                                    <label class="form-label">Supplier Name</label>
                                    <div class="input-group mb-1">
                                        <input type="text" wire:model="supplier_name" name="supplier_name" class="form-control" placeholder="Enter supplier name">
                                        @error('supplier_name') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col mb-3">
                                <div class="box">
                                    <label class="form-label">Supplier Type</label>
                                    <div class="input-group mb-1">
                                        <select type="text" wire:model="category_id" name="category_id" class="form-select">
                                            <option value="">-- Select Type --</option>
                                            @foreach ($itemcategories as $category)
                                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('category_id')
                                        <span class="error">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <div class="box">
                                    <label class="form-label">Supplier Contact Number</label>
                                    <div class="input-group mb-1 input-group-merge">
                                        <span class="input-group-text">PH (+63)</span>
                                        <input type="text" wire:model="supplier_contact" name="supplier_contact" class="form-control" placeholder="Enter contact number">
                                        @error('supplier_contact') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col mb-3">
                                <div class="box">
                                    <label class="form-label">Supplier Email</label>
                                    <div class="input-group mb-1">
                                        <input type="text" wire:model="supplier_email" name="supplier_email" class="form-control" placeholder="Enter supplier email">
                                        @error('supplier_email') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <div class="box">
                                    <label class="form-label">Supplier Owner</label>
                                    <div class="input-group mb-1">
                                        <input type="text" wire:model="supplier_owner" name="supplier_owner" class="form-control" placeholder="Enter supplier owner">
                                        @error('supplier_owner') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col mb-3">
                                <div class="box">
                                    <label class="form-label">Supplier Address</label>
                                    <div class="input-group mb-1">
                                        <input type="text" wire:model="supplier_address" name="supplier_address" class="form-control" placeholder="Enter supplier address">
                                        @error('supplier_address') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <div class="box">
                                    <label class="form-label">Supplier City</label>
                                    <div class="input-group mb-1">
                                        <input type="text" wire:model="supplier_city" name="supplier_city" class="form-control" placeholder="Enter supplier city">
                                        @error('supplier_city') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col mb-3">
                                <div class="box">
                                    <label class="form-label">Supplier TIN Number</label>
                                    <div class="input-group mb-1">
                                        <input type="text" wire:model="supplier_tin" name="supplier_tin" class="form-control" placeholder="Enter supplier TIN number">
                                        @error('supplier_tin') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <div class="box">
                                    <label class="form-label">Business Permit</label>
                                    <div class="input-group mb-1">
                                        <input type="text" wire:model="supplier_bp" name="supplier_bp" class="form-control" placeholder="Enter business permit">
                                        @error('supplier_bp') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col mb-3">
                                <div class="box">
                                    <label class="form-label">JePS Cert. Number</label>
                                    <div class="input-group mb-1">
                                        <input type="text" wire:model="supplier_jepscert" name="supplier_jepscert" class="form-control" placeholder="Enter JePS cert. number">
                                        @error('supplier_jepscert') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <div class="box">
                                    <label class="form-label">Mayor's Permit</label>
                                    <div class="input-group mb-1">
                                        <input type="text" wire:model="supplier_myrp" name="supplier_myrp" class="form-control" placeholder="Enter mayor's permit">
                                        @error('supplier_myrp') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col mb-3">
                                <div class="box">
                                    <label class="form-label">Phil Cert. Number</label>
                                    <div class="input-group mb-1">
                                        <input type="text" wire:model="supplier_philcert" name="supplier_philcert" class="form-control" placeholder="Enter Phil cert. number">
                                        @error('supplier_philcert') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>
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
                                    <label class="form-label">Remarks</label><textarea class="form-control" wire:model="supplier_remark" name="supplier_remark" rows="" style="text-align: start;"></textarea>
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

<!-- View Supplier Info Modal -->
<div wire:ignore.self class="modal fade" id="showSupplierInfoModal" tabindex="-1" aria-labelledby="showSupplierInfoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="showSupplierInfoModalLabel">Supplier Info</h1>
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
                                    data-bs-target="#navs-supplier-info"
                                    aria-controls="navs-supplier-info"
                                    aria-selected="true">
                                    Supplier Info
                                </button>
                                </li>
                                <li class="nav-item">
                                    <button
                                        type="button"
                                        class="nav-link"
                                        role="tab"
                                        data-bs-toggle="tab"
                                        data-bs-target="#navs-supplier-permit"
                                        aria-controls="navs-supplier-permit"
                                        aria-selected="false">
                                        Supplier Permit
                                    </button>
                                    </li>
                                <li class="nav-item">
                                <button
                                    type="button"
                                    class="nav-link"
                                    role="tab"
                                    data-bs-toggle="tab"
                                    data-bs-target="#navs-supplier-history"
                                    aria-controls="navs-supplier-history"
                                    aria-selected="false">
                                    History
                                </button>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="navs-supplier-info" role="tabpanel">
                                    <div class="row">
                                        <div class="col mb-3">
                                            <div class="box">
                                                <label class="form-label">Supplier Name</label>
                                                <div class="input-group mb-1">
                                                    <input type="text" wire:model="supplier_name" name="supplier_name" class="form-control" placeholder="Enter supplier name" disabled>
                                                    @error('supplier_name') <span class="error">{{ $message }}</span> @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col mb-3">
                                            <div class="box">
                                                <label class="form-label">Supplier Contact Number</label>
                                                <div class="input-group mb-1">
                                                    <input type="text" wire:model="supplier_contact" name="supplier_contact" class="form-control" placeholder="Enter contact number" disabled>
                                                    @error('supplier_contact') <span class="error">{{ $message }}</span> @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col mb-3">
                                            <div class="box">
                                                <label class="form-label">Supplier Email</label>
                                                <div class="input-group mb-1">
                                                    <input type="text" wire:model="supplier_email" name="supplier_email" class="form-control" placeholder="Enter supplier email" disabled>
                                                    @error('supplier_email') <span class="error">{{ $message }}</span> @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col mb-3">
                                            <div class="box">
                                                <label class="form-label">Supplier Owner</label>
                                                <div class="input-group mb-1">
                                                    <input type="text" wire:model="supplier_owner" name="supplier_owner" class="form-control" placeholder="Enter supplier owner" disabled>
                                                    @error('supplier_owner') <span class="error">{{ $message }}</span> @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col mb-3">
                                            <div class="box">
                                                <label class="form-label">Supplier Address</label>
                                                <div class="input-group mb-1">
                                                    <input type="text" wire:model="supplier_address" name="supplier_address" class="form-control" placeholder="Enter supplier address" disabled>
                                                    @error('supplier_address') <span class="error">{{ $message }}</span> @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col mb-3">
                                            <div class="box">
                                                <label class="form-label">Supplier City</label>
                                                <div class="input-group mb-1">
                                                    <input type="text" wire:model="supplier_city" name="supplier_city" class="form-control" placeholder="Enter supplier city" disabled>
                                                    @error('supplier_city') <span class="error">{{ $message }}</span> @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col mb-3">
                                            <div class="box">
                                                <label class="form-label">Status</label>
                                                <div class="input-group mb-1">
                                                    <select type="text" class="form-select" wire:model="status" name="status" disabled>
                                                        <option selected>-- Select Status --</option>
                                                        <option value="0">Active</option>
                                                        <option value="1">Inactive</option>
                                                    </select>
                                                    @error('status') <span class="error">{{ $message }}</span> @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col mb-3">
                                            <div class="box">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="navs-supplier-permit" role="tabpanel">
                                    <div class="row">
                                        <div class="col mb-3">
                                            <div class="box">
                                                <label class="form-label">Supplier TIN Number</label>
                                                <div class="input-group mb-1">
                                                    <input type="text" wire:model="supplier_tin" name="supplier_tin" class="form-control" placeholder="Enter supplier TIN number" disabled>
                                                    @error('supplier_tin') <span class="error">{{ $message }}</span> @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col mb-3">
                                            <div class="box">
                                                <label class="form-label">Business Permit</label>
                                                <div class="input-group mb-1">
                                                    <input type="text" wire:model="supplier_bp" name="supplier_bp" class="form-control" placeholder="Enter business permit" disabled>
                                                    @error('supplier_bp') <span class="error">{{ $message }}</span> @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col mb-3">
                                            <div class="box">
                                                <label class="form-label">JePS Cert. Number</label>
                                                <div class="input-group mb-1">
                                                    <input type="text" wire:model="supplier_jepscert" name="supplier_jepscert" class="form-control" placeholder="Enter JePS cert. number" disabled>
                                                    @error('supplier_jepscert') <span class="error">{{ $message }}</span> @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col mb-3">
                                            <div class="box">
                                                <label class="form-label">Mayor's Permit</label>
                                                <div class="input-group mb-1">
                                                    <input type="text" wire:model="supplier_myrp" name="supplier_myrp" class="form-control" placeholder="Enter mayor's permit" disabled>
                                                    @error('supplier_myrp') <span class="error">{{ $message }}</span> @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col mb-3">
                                            <div class="box">
                                                <label class="form-label">Phil Cert. Number</label>
                                                <div class="input-group mb-1">
                                                    <input type="text" wire:model="supplier_philcert" name="supplier_philcert" class="form-control" placeholder="Enter Phil cert. number" disabled>
                                                    @error('supplier_philcert') <span class="error">{{ $message }}</span> @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col mb-3">
                                            <div class="box">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="navs-supplier-history" role="tabpanel">
                                    <div class="row">
                                        <div class="col mb-3">
                                            <div class="box">
                                                <label class="form-label">Created At</label>
                                                <div class="input-group mb-1">
                                                    <input type="text" wire:model="created_at" name="created_at" class="form-control" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col mb-3">
                                            <div class="box">
                                                <label class="form-label">Updated At</label>
                                                <div class="input-group mb-1">
                                                    <input type="text" wire:model="updated_at" name="updated_at" class="form-control" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <p>
                                        Donut dragée jelly pie halvah. Danish gingerbread bonbon cookie wafer candy oat cake ice
                                        cream. Gummies halvah tootsie roll muffin biscuit icing dessert gingerbread. Pastry ice cream
                                        cheesecake fruitcake.
                                    </p>
                                    <p class="mb-0">
                                        Jelly-o jelly beans icing pastry cake cake lemon drops. Muffin muffin pie tiramisu halvah
                                        cotton candy liquorice caramels.
                                    </p>
                                </div>
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

<!-- Delete Supplier Modal -->
<div wire:ignore.self class="modal fade" id="deleteSupplierInfoModal" tabindex="-1" aria-labelledby="deleteSupplierInfoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="deleteSupplierInfoModalLabel">Delete Item Brand</h1>
                <button type="button" class="btn-close" wire:click="closeModal" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="destroySupplierInfo">
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <h4 style="text-align: center">Are you sure you want to delete this supplier?</h4>
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
