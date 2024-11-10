<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Category;
use App\Models\Audittrail;
use App\Models\Subcategory;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\SubCategoryFormRequest;
use App\Models\User;

class ItemSubCategory extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $id, $category_id, $subcategory_name, $status;

    public $search = '', $perPage = 5,
            $filter = '', $sortBy = 'created_at',
            $sortDir = 'DESC', $selectedCategory = '';

    //updating search
    public function updatingSearch()
    {
        $this->resetPage();
    }

    //add sub category
    public function saveSubCategory()
    {
        // Validate the incoming data
        $validatedData = $this->validate((new SubCategoryFormRequest())->rules());

        $currentUser = Auth::user();
        $validatedData['user_id'] = $currentUser->id; // Set the user_id here

        // Create the Subcategory object with the validated data
        $subcategory = new Subcategory($validatedData);

        // Save the subcategory
        $subcategory->save();

        if ($currentUser && ($currentUser->role_as == 1)) {
            // Create audit trail
            $auditlog = new Audittrail;
            $auditlog->user_id = $currentUser->id;
            $auditlog->user_type = 'Admin';
            $auditlog->activity_name = 'Create new sub category';
            $auditlog->activity_details = 'Sub Category ID: ' . $subcategory->id . ', Sub Category Name: ' . $subcategory->subcategory_name;
            $auditlog->save();
        }

        $this->dispatch('subCategoryAdded', 'Sub Category added successfully!');

        $this->resetInput();
    }



    //edit sub category
    public function editSubCategory(int $id)
    {
        $subcategory = Subcategory::find($id);
        if($subcategory){
        $this->id = $subcategory->id;
        $this->category_id = $subcategory->category_id;
        $this->subcategory_name = $subcategory->subcategory_name;
        $this->status = $subcategory->status;
        }
        else{
            return redirect()->to('/sub-categories');
        }
    }

    //update sub category
    public function updateSubCategory()
    {
        $validatedData = $this->validate((new SubCategoryFormRequest())->rules());

        // Find the user before updating
        $subcategory = Subcategory::findOrFail($this->id);

        $oldUserInfo = [
            'category_id' => $subcategory->category_id,
            'subcategory_name' => $subcategory->category_name,
            'status' => $subcategory->status
        ];

        $subcategory->update([
            'category_id' => $validatedData['category_id'],
            'subcategory_name' => $validatedData['subcategory_name'],
            'status' => $validatedData['status'],
        ]);

        $currentUser = Auth::user();
        $validatedData['user_id'] = $currentUser->id;

        if ($currentUser && ($currentUser->role_as == 1)) {
            $auditlog = new Audittrail;
            $auditlog->user_id = $currentUser->id;
            $auditlog->user_type = 'Admin';
            $auditlog->activity_name = 'Update sub info';
            $auditlog->activity_details = 'Sub Category ID: ' . $subcategory->id . ', Old Info: ' . json_encode($oldUserInfo) . ', New Info: ' . json_encode($validatedData);
            $auditlog->save();
        }

        //session()->flash('message', 'Sub Category updated successfully!');

        $this->dispatch('subCategoryUpdated', 'Sub Category updated successfully!');

        $this->resetInput();
    }

    //delete sub category
    public function deleteSubCategory(int $id)
    {
        $this->id = $id;
    }

    //destroy sub category
    public function destroySubCategory()
    {
        Category::find($this->id)->delete();

        $currentUser = Auth::user();
        if ($currentUser && ($currentUser->role_as == 1)) {
            $auditlog = new Audittrail;
            $auditlog->user_id = $currentUser->id;
            $auditlog->user_type = 'Admin';
            $auditlog->activity_name = 'Delete sub category';
            $auditlog->activity_details = 'Deleting sub category from database';
            $auditlog->save();
        }

        //session()->flash('message', 'Sub Category deleted successfully!');

        $this->dispatch('subCategoryDeleted', 'Sub Category deleted successfully!');
    }

    //close modal
    public function closeModal()
    {
        $this->resetInput();
    }

    // Reset input fields method
    private function resetInput()
    {
        $this->category_id = '';
        $this->subcategory_name = '';
    }

    public function setSortBy($sortByField) {

        if($this->sortBy === $sortByField) {
            $this->sortDir = ($this->sortDir == "ASC") ? 'DESC' : "ASC";
            return;
        }

        $this->sortBy = $sortByField;
        $this->sortDir = 'DESC';
    }

    //fetch sub category
    public function render()
    {
        $itemcategories = Category::all();
        $users = User::all();

        if ($this->selectedCategory !== '') {
            $selectedCategory = $this->selectedCategory;
        } else {
            $selectedCategory = '';
        }

        return view('livewire.admin.item-subcategory', [
            'subcategories' => Subcategory::search($this->search)
            ->role($selectedCategory)
            ->orderBy($this->sortBy, $this->sortDir)
            ->paginate($this->perPage),
            'users' => $users,
            'itemcategories' => $itemcategories
        ]);
    }

}
