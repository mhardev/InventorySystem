<?php

namespace App\Livewire\Client;

use App\Models\User;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Userlog;
use Livewire\Component;
use App\Models\Category;
use App\Models\Supplier;
use App\Models\Usernotif;
use App\Models\Itemrequest;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ItemRequestFormRequest;

class ItemProducts extends Component
{
    use WithPagination;
    use WithFileUploads;

    protected $paginationTheme = 'bootstrap';

    public $id, $subcategory_id, $brand_id, $supplier_id, $item_name,
            $item_sn, $item_mn, $item_stock, $item_image, $item_details,
            $meta_title, $meta_keyword, $status, $item_remark,
            $current_item_stock, $new_item_stock, $total_stock,
            $category_name, $user_id;

    public $search = '', $perPage = 5, $selectedItemProduct, $sortBy = 'created_at',
            $sortDir = 'DESC', $selectedCategory = '', $selectedSubCategory = '', $selectedColor = '';

    public function showItemProduct(int $id)
    {
        $product = Product::find($id);
        if($product){
            $this->selectedItemProduct = $product;
            $this->dispatch('openItemProductModal');
        } else {
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

    public function suggestItemProduct()
    {
        /*// Validation or logic to handle the suggestion
        // You may want to validate and save the suggestion here
        // Example:
        $validatedData = $this->validate([
            'subcategory_id' => 'required|exists:subcategories,id',
        ]);

        // Perform the action
        // Assuming you have a Suggestion model or similar
        Suggestion::create([
            'subcategory_id' => $this->subcategory_id,
            // Other necessary fields
        ]);

        Notification::create([
            'user_id' => $this->user_id,
            'notification_type' => 'suggestion',
            'notification_details' => 'New suggestion for subcategory ID: ' . $this->subcategory_id,
        ]);

        // Reset inputs or perform other necessary actions
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal'); // Assuming you have a JS event listener to close the modal */
    }

    public function requestItemProduct($productId)
    {
        // Find the product
        $product = Product::find($productId);

        if (!$product) {
            // Product not found
            $this->dispatch('itemProductInfoShow', 'Item Product Info not found.');
            return;
        }

        // Open the request modal
        $this->selectedItemProduct = $product;
    }

    // Save requested item
    public function saveRequestedItem()
    {
        $validatedData = $this->validate((new ItemRequestFormRequest())->rules());

        // Find the selected product
        $product = $this->selectedItemProduct;

        if (!$product) {
            // Product not found
            $this->dispatch('itemProductInfoShow', 'Item Product Info not found.');
            return;
        }

        // Find existing pending item request for the same user and product
        $existingRequest = Itemrequest::where('user_id', Auth::id())
                                    ->where('product_id', $product->id)
                                    ->where('status', 0) // Pending status
                                    ->first();
        // Audit log for user
        $currentUser = Auth::user();

        if ($existingRequest) {
            // If a pending request exists, update the item stock
            $existingRequest->item_stock += $validatedData['item_stock'];
            $existingRequest->save();

            Userlog::create([
                'request_id' => $existingRequest->id, 'history_details' => 'Updated request for product ID: ' . $product->id,
            ]);

            Usernotif::create([
                'request_id' => $existingRequest->id, 'notification_details' =>  'Updated request for product ID: ' . $product->id, 'user_id' => Auth::id(),
            ]);

            if ($currentUser && ($currentUser->role_as == 0)) {
                DB::table('audittrail')
                ->insert([
                    'user_id' => $currentUser->id, 'user_type' => 'User',
                    'activity_name' => 'Request Item Product',
                    'activity_details' => 'Request Item ID: ' . $existingRequest->id . ', Item Product Name: ' . $product->item_name,
                    'created_at' => now(), 'updated_at' => now(),
                ]);
            }
            // Success message
            $this->dispatch('ItemRequested', 'Item request updated successfully!');
        } else {
            // Create new item request if no pending request found or if the existing request is approved
            $itemrequest = Itemrequest::create([ 'user_id' => Auth::id(), 'product_id' => $product->id,
                'item_stock' => $validatedData['item_stock'], 'request_remark' => 'Pending', 'status' => 0,
            ]);

            Userlog::create([
                'request_id' => $itemrequest->id, 'history_details' => 'Request for product ID: ' . $product->id,
            ]);

            Usernotif::create([
                'request_id' => $itemrequest->id, 'notification_details' =>  'Request for product ID: ' . $product->id, 'user_id' => Auth::id(),
            ]);

            if ($currentUser && ($currentUser->role_as == 0)) {

                DB::table('audittrail')
                ->insert([
                    'user_id' => $currentUser->id, 'user_type' => 'User', 'activity_name' => 'Request item request',
                    'activity_details' => 'Request Item ID: ' . $itemrequest->id . ', Item Product Name: ' . $product->item_name,
                    'created_at' => now(), 'updated_at' => now(),
                ]);
            }
            // Success message
            $this->dispatch('ItemRequested', 'Item requested successfully!');
        }
        // Reset input fields and close modal
        $this->resetInput();
    }
    //close modal
    public function closeModal()
    {
        $this->resetInput();
    }

    //reset input fields method
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
        $this->meta_title = '';
        $this->meta_keyword = '';
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

        if ($this->selectedColor !== '') {
            $selectedColor = $this->selectedColor;
        } else {
            $selectedColor = '';
        }

        return view('livewire.client.item-products', [
            'itemproducts' => Product::search($this->search)
                ->category($selectedCategory)
                ->stockColor($selectedColor)
                ->orderBy($this->sortBy, $this->sortDir)
                ->paginate($this->perPage),
            'categories' => $categories,
            'subcategories' => $subcategories,
            'itembrands' => $itembrands,
            'suppliers' => $suppliers,
            'users' => $users,
            'selectedColor' => $this->selectedColor,
        ]);
    }
}
