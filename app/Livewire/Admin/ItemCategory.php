<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use App\Models\Category;
use App\Models\Audittrail;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ItemCategoryFormRequest;

class ItemCategory extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $id, $category_name, $status;

    public $search = '', $perPage = 5,
            $sortBy = 'created_at', $sortDir = 'DESC';

    //updating search
    public function updatingSearch()
    {
        $this->resetPage();
    }

    //add item category
    public function saveItemCategory()
    {
        $validatedData = $this->validate((new ItemCategoryFormRequest())->rules());

        $currentUser = Auth::user();
        $validatedData['user_id'] = $currentUser->id;

        $category = Category::create($validatedData);

        if ($currentUser && ($currentUser->role_as == 1)) {
            // Create audit trail
            $auditlog = new Audittrail;
            $auditlog->user_id = $currentUser->id;
            $auditlog->user_type = 'Admin';
            $auditlog->activity_name = 'Create new item category';
            $auditlog->activity_details = 'Category ID: ' . $category->id . ', Category Name: ' . $category->category_name .'';
            $auditlog->save();

            DB::table('audittrail')
            ->insert([
                'user_id' => $currentUser->id,
                'user_type' => 'Admin',
                'activity_name' => 'Create new item category',
                'activity_details' => 'Category ID: ' . $category->id . ', Category Name: ' . $category->category_name .'',
                'created_at' => now(), 'updated_at' => now()
            ]);
        }

        $this->dispatch('itemCategoryAdded', 'Item Category added successfully!');

        $this->resetInput();
    }

    //edit item category
    public function editItemCategory(int $id)
    {
        $category = Category::find($id);
        if($category){
        $this->id = $category->id;
        $this->category_name = $category->category_name;
        $this->status = $category->status;
        }
        else{
            return redirect()->to('/item-categories');
        }
    }

    //update item category
    public function updateItemCategory()
    {
        $validatedData = $this->validate((new ItemCategoryFormRequest())->rules());

        // Find the user before updating
        $category = Category::findOrFail($this->id);

        $oldUserInfo = [
            'category_name' => $category->category_name,
            'status' => $category->status
        ];

        $category->update([
            'category_name' => $validatedData['category_name'],
            'status' => $validatedData['status'],
        ]);

        // Create audit trail
        $currentUser = Auth::user();
        $validatedData['user_id'] = $currentUser->id;

        if ($currentUser && ($currentUser->role_as == 1)) {
            DB::table('audittrail')
            ->insert([
                'user_id' => $currentUser->id,
                'user_type' => 'Admin',
                'activity_name' => 'Update item category info',
                'activity_details' => 'Category ID: '. $category->id. ', Old Info: '. json_encode($oldUserInfo). ', New Info: '. json_encode($validatedData),
                'created_at' => now(), 'updated_at' => now(),
            ]);
        }

        //session()->flash('message', 'Item Category updated successfully!');

        $this->dispatch('itemCategoryUpdated', 'Item Category updated successfully!');

        $this->resetInput();
    }

    //delete item category
    public function deleteItemCategory(int $id)
    {
        $this->id = $id;
    }

    //destroy item category
    public function destroyItemCategory()
    {
        Category::find($this->id)->delete();

        $currentUser = Auth::user();
        if ($currentUser && ($currentUser->role_as == 1)) {
            DB::table('audittrail')
            ->insert([
                'user_id' => $currentUser->id,
                'user_type' => 'Admin',
                'activity_name' => 'Delete item category',
                'activity_details' => 'Deleting item category from database',
                'created_at' => now(), 'updated_at' => now(),
            ]);
        }

        $this->dispatch('itemCategoryDeleted', 'Item Category deleted successfully!');
    }

    //reset input fields method
    public function resetInput()
    {
        $this->category_name = '';
    }

    //close modal
    public function closeModal()
    {
        $this->resetInput();
    }

    public function setSortBy($sortByField) {

        if($this->sortBy === $sortByField) {
            $this->sortDir = ($this->sortDir == "ASC") ? 'DESC' : "ASC";
            return;
        }

        $this->sortBy = $sortByField;
        $this->sortDir = 'DESC';
    }

    //fetch item category
    public function render()
    {
        $users = User::all();

        $itemcategories = Category::search($this->search)
                ->orderBy($this->sortBy, $this->sortDir)
                ->paginate($this->perPage);

        return view('livewire.admin.item-category',  [
            'itemcategories' => $itemcategories,
            'users' => $users
        ]);
    }
}
