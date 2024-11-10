<!-- Add Item Category Modal -->
<div wire:ignore.self class="modal fade" id="addItemCategoryModal" tabindex="-1" aria-labelledby="addItemCategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="addItemCategoryModalLabel">Add Item Category</h1>
                <button type="button" class="btn-close" wire:click="closeModal" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="saveItemCategory($event.target)">
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            @include('livewire.admin.includes.modal-col', [
                                'labelName' => 'Item Category Name',
                                'wireName' => 'category_name',
                                'name' => 'category_name',
                                'placeHolder' => 'Enter item category name',
                                'errorMsg' => 'category_name'
                            ])
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

<!-- Update Item Category Modal -->
<div wire:ignore.self class="modal fade" id="updateItemCategoryModal" tabindex="-1" aria-labelledby="updateItemCategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="updateItemCategoryModalLabel">Update Item Category</h1>
                <button type="button" class="btn-close" wire:click="closeModal" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="updateItemCategory">
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            @include('livewire.admin.includes.modal-col', [
                                'labelName' => 'Item Category Name',
                                'wireName' => 'category_name',
                                'name' => 'category_name',
                                'placeHolder' => 'Enter item category name',
                                'errorMsg' => 'category_name'
                            ])
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


<!-- Delete Item Category Modal -->
<div wire:ignore.self class="modal fade" id="deleteItemCategoryModal" tabindex="-1" aria-labelledby="deleteItemCategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="deleteItemCategoryModalLabel">Delete Item Category</h1>
                <button type="button" class="btn-close" wire:click="closeModal" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="destroyItemCategory">
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <h4 style="text-align: center">Are you sure you want to delete this category?</h4>
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
