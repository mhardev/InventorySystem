<?php

namespace App\Livewire\Admin;

use App\Models\User;
use App\Models\Brand;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use App\Models\Category;
use App\Models\Audittrail;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ItemBrandFormRequest;

class ItemBrands extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $id, $brand_name, $status, $user_id, $category_id;
    public $search = '', $perPage = 5,
            $sortBy = 'created_at', $sortDir = 'DESC',
            $selectedCategory = '';

    //updating search
    public function updatingSearch()
    {
        $this->resetPage();
    }

    //add item brand
    public function saveItemBrand()
    {
        $validatedData = $this->validate((new ItemBrandFormRequest())->rules());

        $currentUser = Auth::user();
        $validatedData['user_id'] = $currentUser->id;

        $brand = Brand::create($validatedData);

        if ($currentUser && ($currentUser->role_as == 1)) {

            DB::table('audittrail')
            ->insert([
                'user_id' => $currentUser->id, 'user_type' => 'Admin',
                'activity_name' => 'Create new item brand',
                'activity_details' => 'Brand ID: ' . $brand->id . ',
                                        Brand Name: ' . $brand->brand_name .',
                                        Brand Category: ' . $brand->category_id .'
                                        ',
                'created_at' => now(), 'updated_at' => now(),
            ]);
        }

        $this->dispatch('itemBrandAdded', 'Item Brand added successfully!');

        $this->resetInput();

    }

    //edit item brand
    public function editItemBrand(int $id)
    {
        $brand = Brand::find($id);
        if($brand){
        $this->id = $brand->id;
        $this->brand_name = $brand->brand_name;
        $this->category_id = $brand->category_id;
        $this->status = $brand->status;
        }
        else{
            return redirect()->to('/item-brands');
        }
    }

    //update item brand
    public function updateItemBrand()
    {
        $validatedData = $this->validate((new ItemBrandFormRequest())->rules());

        // Find the user before updating
        $brand = Brand::findOrFail($this->id);

        // Capture old user information
        $oldUserInfo = [
            'brand_name' => $brand->brand_name,
            'category_id' => $brand->category_id,
            'status' => $brand->status
        ];

        // Update user information
        $brand->update([
            'brand_name' => $validatedData['brand_name'],
            'category_id' => $validatedData['category_id'],
            'status' => $validatedData['status'],
        ]);

        // Create audit trail
        $currentUser = Auth::user();
        $validatedData['user_id'] = $currentUser->id;

        if ($currentUser && ($currentUser->role_as == 1)) {

            DB::table('audittrail')
            ->insert([
                'user_id' => $currentUser->id, 'user_type' => 'Admin',
                'activity_name' => 'Update brand info',
                'activity_details' => 'Brand ID: '. $brand->id. ', Old Info: '. json_encode($oldUserInfo). ', New Info: '. json_encode($validatedData),
                'created_at' => now(), 'updated_at' => now(),
            ]);
        }

        //session()->flash('message', 'User Info updated successfully!');

        $this->dispatch('itemBrandUpdated', 'Item Brand updated successfully!');

        $this->resetInput();
    }

    //delete item brand
    public function deleteItemBrand(int $id)
    {
        $this->id = $id;
    }

    //destroy item brand
    public function destroyItemBrand()
    {
        Brand::find($this->id)->delete();

        $currentUser = Auth::user();
        if ($currentUser && ($currentUser->role_as == 1)) {
            DB::table('audittrail')
            ->insert([
                'user_id' => $currentUser->id, 'user_type' => 'Admin',
                'activity_name' => 'Delete item brand',
                'activity_details' => 'Deleting item brand from database',
                'created_at' => now(), 'updated_at' => now(),
            ]);
        }

        $this->dispatch('itemBrandDeleted', 'Item Brand deleted successfully!');
    }

    //reset modal
    public function resetInput()
    {
        $this->brand_name = '';
        $this->category_id = '';
        $this->status = '';
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

    //fetch item brand data
    public function render()
    {
        $itemcategories = Category::all();

        // If a category filter is selected, pass the category name to the Livewire component
        if ($this->selectedCategory !== '') {
            $selectedCategory = $this->selectedCategory;
        } else {
            $selectedCategory = '';
        }

        return view('livewire.admin.item-brands', [
            'itembrands' => Brand::search($this->search)
                ->role($selectedCategory)
                ->orderBy($this->sortBy, $this->sortDir)
                ->paginate($this->perPage),

            'itemcategories' => $itemcategories,
        ]);
    }



}
