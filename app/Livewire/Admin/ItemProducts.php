<?php

namespace App\Livewire\Admin;

use App\Models\User;
use App\Models\Brand;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use App\Models\Category;
use App\Models\Supplier;
use App\Models\Audittrail;
use App\Models\Subcategory;
use Illuminate\Http\Request;

use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ItemProductFormRequest;

class ItemProducts extends Component
{
    use WithPagination;
    use WithFileUploads;

    protected $paginationTheme = 'bootstrap';

    public $id, $subcategory_id,
            $brand_id, $supplier_id,
            $item_name, $item_sn, $item_mn,
            $item_stock, $item_image, $item_details,
            $status, $item_remark, $current_item_stock,
            $new_item_stock, $total_stock,
            $category_name;

    public $search = '', $perPage = 5,
            $selectedItemProduct, $sortBy = 'created_at',
            $sortDir = 'DESC', $selectedCategory = '',
            $selectedSubCategory = '', $selectedColor = '';

    public function showItemProduct(int $id)
    {
        $product = Product::find($id);
        if($product){
            $this->selectedItemProduct = $product;
            $this->dispatch('openItemProductModal');
        } else {
            //session()->flash('message', 'Item Product Info not found.');

            $this->dispatch('itemProductInfoShow', 'Item Product Info not found.');
        }
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function getCategoryName(Request $request)
    {
        $subcategory = Subcategory::find($request->subcategory_id);
        if ($subcategory) {
            $category = Category::find($subcategory->category_id);
            if ($category) {
                return response()->json(['category_name' => $category->category_name]);
            }
        }
        return response()->json(['category_name' => '']);
    }

    //add item product
    public function saveItemProduct()
    {
        $validatedData = $this->validate((new ItemProductFormRequest())->rules());

        if ($this->item_image) {
            $imageName = time().'.'.$this->item_image->extension();
            $this->item_image->storeAs('public/uploads/products/', $imageName);
            $validatedData['item_image'] = $imageName;
        }
        $currentUser = Auth::user();
        $validatedData['user_id'] = $currentUser->id;

        $product = Product::create($validatedData);

        if ($currentUser && ($currentUser->role_as == 1)) {
            DB::table('audittrail')
            ->insert([
                'user_id' => $currentUser->id, 'user_type' => 'Admin',
                'activity_name' => 'Create new item product',
                'activity_details' => 'Item Product ID: '. $product->id. ', Item Product Name: '. $product->item_name,
                'created_at' => now(), 'updated_at' => now(),
            ]);
        }

        $this->dispatch('ItemProductAdded', 'Item Product added successfully!');

        $this->resetInput();
    }


    //edit item product
    public function editItemProduct(int $id)
    {
        $product = Product::find($id);
        if($product){
        $this->id = $product->id;
        $this->subcategory_id = $product->subcategory_id;
        $this->category_name = $product->subcategory->category->category_name;
        $this->brand_id = $product->brand_id;
        $this->supplier_id = $product->supplier_id;
        $this->item_name = $product->item_name;
        $this->item_sn = $product->item_sn;
        $this->item_mn = $product->item_mn;
        $this->item_stock = $product->item_stock;
        $this->item_details = $product->item_details;
        $this->status = $product->status;
        }
        else{
            return redirect()->to('/item-products');
        }
    }

    //update item product
    public function updateItemProduct()
    {
        $validatedData = $this->validate([
            'subcategory_id' => 'required',
            'brand_id' => 'required',
            'supplier_id' => 'required',
            'item_name' => 'required|min:3|max:255',
            'item_sn' => '',
            'item_mn' => '',
            'item_stock' => 'required|integer',
            'item_details' => '',
            'item_remark' => '',
            'status' => 'required',
        ]);

        // Find the user before updating
        $product = Product::findOrFail($this->id);

        $oldUserInfo = [
            'subcategory_id' => $product->subcategory_id,
            'brand_id' => $product->brand_id,
            'supplier_id' => $product->supplier_id,
            'item_name' => $product->item_name,
            'item_sn' => $product->item_sn,
            'item_mn' => $product->item_mn,
            'item_details' => $product->item_details,
            'item_remark' => $product->item_remark,
            'status' => $product->status
        ];

        $product->update([
            'subcategory_id' => $validatedData['subcategory_id'],
            'brand_id' => $validatedData['brand_id'],
            'supplier_id' => $validatedData['supplier_id'],
            'item_name' => $validatedData['item_name'],
            'item_sn' => $validatedData['item_sn'],
            'item_mn' => $validatedData['item_mn'],
            'item_details' => $validatedData['item_details'],
            'item_remark' => $validatedData['item_remark'],
            'status' => $validatedData['status'],
        ]);

        $currentUser = Auth::user();
        $validatedData['user_id'] = $currentUser->id;

        if ($currentUser && ($currentUser->role_as == 1)) {
            DB::table('audittrail')
            ->insert([
                'user_id' => $currentUser->id,
                'user_type' => 'Admin',
                'activity_name' => 'Update item product info',
                'activity_details' => 'Item Product ID: '. $product->id . ', Old Info: '. json_encode($oldUserInfo). ', New Info: '. json_encode($validatedData),
                'created_at' => now(), 'updated_at' => now(),
            ]);
        }

        $this->dispatch('ItemProductInfoUpdated', 'Item Product Info updated successfully!');

        $this->resetInput();
    }

    //edit item stock
    public function editItemStock(int $id)
    {
        $product = Product::find($id);
        if ($product) {
            $this->id = $product->id;
            $this->item_name = $product->item_name;
            $this->current_item_stock = $product->item_stock; // Set current stock
        } else {
            return redirect()->to('/item-products');
        }
    }

    // update item stock
    public function updateItemStock()
    {
        $validatedData = $this->validate([
            'new_item_stock' => 'required|integer',
        ]);

        // Find the product before updating
        $product = Product::findOrFail($this->id);

        // Compute total stock
        $this->total_stock = $this->current_item_stock + $validatedData['new_item_stock'];

        // Update item stock
        $product->update([
            'item_stock' => $this->total_stock,
            'status' => ($this->total_stock > 0) ? 0 : 1, // Set status based on new stock value
        ]);

        $currentUser = Auth::user();
        $validatedData['user_id'] = $currentUser->id;

        if ($currentUser && ($currentUser->role_as == 1)) {
            DB::table('audittrail')
            ->insert([
                'user_id' => $currentUser->id,
                'user_type' => 'Admin',
                'activity_name' => 'Update item product stock',
                'activity_details' => 'Item Product ID: '. $product->id . ', New Stock: '. $this->total_stock,
                'created_at' => now(), 'updated_at' => now(),
            ]);
        }

        $this->dispatch('ItemProductStockUpdated', 'Item Product Stock updated successfully!');

        $this->resetInput();
    }


    //delete item product
    public function deleteItemProduct(int $id)
    {
        $this->id = $id;
    }

    //destroy item product
    public function destroyItemProduct()
    {
        Product::find($this->id)->delete();

        $currentUser = Auth::user();
        if ($currentUser && ($currentUser->role_as == 1)) {
            DB::table('audittrail')
            ->insert([
                'user_id' => $currentUser->id,
                'user_type' => 'Admin',
                'activity_name' => 'Delete item product',
                'activity_details' => 'Deleting item product from database',
                'created_at' => now(), 'updated_at' => now(),
            ]);
        }

        $this->dispatch('ItemProductDeleted', 'Item Product deleted successfully!');
    }

    //close modal
    public function closeModal()
    {
        $this->resetInput();
    }

    // Reset input fields method
    public function resetInput()
    {
        $this->subcategory_id = '';
        $this->brand_id = '';
        $this->supplier_id = '';
        $this->item_name = '';
        $this->item_sn = '';
        $this->item_mn = '';
        $this->item_stock = '';
        $this->item_details = '';
        $this->item_remark = '';
        $this->status = '';
        $this->new_item_stock = '';
        $this->total_stock = '';
    }

    public function setSortBy($sortByField) {

        if($this->sortBy === $sortByField) {
            $this->sortDir = ($this->sortDir == "ASC") ? 'DESC' : "ASC";
            return;
        }

        $this->sortBy = $sortByField;
        $this->sortDir = 'DESC';
    }

    public function requestItemProduct() {
        //
    }

    public function render()
    {
        $categories = Category::all();
        $subcategories = Subcategory::all();
        $itembrands = Brand::all();
        $suppliers = Supplier::all();
        $users = User::all();

        if ($this->selectedCategory !== '') {
            $selectedCategory = $this->selectedCategory;
        } else {
            $selectedCategory = '';
        }

        /*if ($this->selectedSubCategory !== '') {
            $selectedSubCategory = $this->selectedSubCategory;
        } else {
            $selectedSubCategory = '';
        }*/

        if ($this->selectedColor !== '') {
            $selectedColor = $this->selectedColor;
        } else {
            $selectedColor = '';
        }

        return view('livewire.admin.item-products', [
            'itemproducts' => Product::search($this->search)
                ->category($selectedCategory)
                //->role($selectedSubCategory)
                ->stockColor($selectedColor) // Pass selected color range
                ->orderBy($this->sortBy, $this->sortDir)
                ->paginate($this->perPage),
            'categories' => $categories,
            'subcategories' => $subcategories,
            'itembrands' => $itembrands,
            'suppliers' => $suppliers,
            'users' => $users,
            'selectedColor' => $this->selectedColor, // Pass selected color range to view
        ]);

    }
}
