<!-- Add Sub Category Modal -->
<div wire:ignore.self class="modal fade" id="addSubCategoryModal" tabindex="-1" aria-labelledby="addSubCategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="addSubCategoryModalLabel">Add Sub Category</h1>
                <button type="button" class="btn-close" wire:click="closeModal" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="saveSubCategory($event.target)">
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            @include('livewire.admin.includes.modal-col', [
                                'labelName' => 'Sub Category Name',
                                'wireName' => 'subcategory_name',
                                'name' => 'subcategory_name',
                                'placeHolder' => 'Enter sub category name',
                                'errorMsg' => 'subcategory_name'
                            ])
                            <div class="col mb-3">
                                <div class="box">
                                    <label class="form-label">Item Category</label>
                                    <div class="input-group mb-1">
                                        <select type="text" wire:model="category_id" name="category_id" class="form-select">
                                            <option value="">-- Select Category --</option>
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

<!-- Update Sub Category Modal -->
<div wire:ignore.self class="modal fade" id="updateSubCategoryModal" tabindex="-1" aria-labelledby="updateSubCategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="updateSubCategoryModalLabel">Update Sub Category</h1>
                <button type="button" class="btn-close" wire:click="closeModal" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="updateSubCategory">
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            @include('livewire.admin.includes.modal-col', [
                                'labelName' => 'Sub Category Name',
                                'wireName' => 'subcategory_name',
                                'name' => 'subcategory_name',
                                'placeHolder' => 'Enter sub category name',
                                'errorMsg' => 'subcategory_name'
                            ])
                            <div class="col mb-3">
                                <div class="box">
                                    <label class="form-label">Item Category</label>
                                    <div class="input-group mb-1">
                                        <select type="text" wire:model="category_id" name="category_id" class="form-select">
                                            <option value="">-- Select Category --</option>
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

<!-- Delete Sub Category Modal -->
<div wire:ignore.self class="modal fade" id="deleteSubCategoryModal" tabindex="-1" aria-labelledby="deleteSubCategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="deleteSubCategoryModalLabel">Delete Item Category</h1>
                <button type="button" class="btn-close" wire:click="closeModal" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="destroySubCategory">
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <h4 style="text-align: center">Are you sure you want to delete this sub category?</h4>
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
