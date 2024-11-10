<?php

namespace App\Livewire\Client;

use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use App\Models\Category;
use App\Models\Audittrail;
use App\Models\Itemrequest;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class ItemRequests extends Component
{
    use WithPagination;

    public $id, $item_name, $total_request_stock,
            $current_request_stock, $new_request_stock;

    protected $paginationTheme = 'bootstrap';

    public $search = '', $selectedItemRequest = '',
            $selectedCategory = '', $selectedStatus = '',
            $selectedColor = '', $perPage = 5,
            $sortBy = 'created_at', $sortDir = 'ASC';

    public function showItemRequest(int $id)
    {
        $itemrequest = Itemrequest::find($id);
        if($itemrequest){
            $this->selectedItemRequest = $itemrequest;
            $this->dispatch('openItemRequestModal');
        } else {
            //session()->flash('message', 'Item Product Info not found.');

            $this->dispatch('itemRequestDetailShow', 'Item Request Details not found.');
        }
        $this->closeModal();
    }

    public function editRequestItemStock(int $id)
    {
        $itemrequest = Itemrequest::find($id);
        if ($itemrequest) {
            $this->id = $itemrequest->id;
            $this->item_name = $itemrequest->product->item_name;
            $this->current_request_stock = $itemrequest->item_stock;
        } else {
            return redirect()->to('/item-requests');
        }
    }

    public function updateRequestItemStock()
    {
        $validatedData = $this->validate([
            'new_request_stock' => 'required|integer',
        ]);

        $itemrequest = Itemrequest::findOrFail($this->id);

        $this->total_request_stock = $this->current_request_stock + $validatedData['new_request_stock'];

        $itemrequest->update([
            'item_stock' => $this->total_request_stock
        ]);

        $currentUser = Auth::user();
        $validatedData['user_id'] = $currentUser->id;

        if ($currentUser && ($currentUser->role_as == 0)) {
            DB::table('audittrail')
            ->insert([
                'user_id' => $currentUser->id,
                'user_type' => 'User',
                'activity_name' => 'Update request item quantity',
                'activity_details' => 'Request ID: ' . $itemrequest->id . ', New Quantity: ' . $this->total_request_stock,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        $this->dispatch('RequestItemQuantityUpdated', 'Request Item Quantity updated successfully!');

        $this->resetInput();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function closeModal()
    {
        $this->resetInput();
    }

    public function resetInput()
    {
        $this->new_request_stock = '';
        $this->current_request_stock = '';
        $this->total_request_stock = '';
        $this->item_name = '';
    }

    public function setSortBy($sortByField)
    {
        if($this->sortBy === $sortByField) {
            $this->sortDir = ($this->sortDir == "DESC") ? 'ASC' : "DESC";
            return;
        }

        $this->sortBy = $sortByField;
        $this->sortDir = 'ASC';
    }

    public function render()
    {
        $categories = Category::all();
        $itemproducts = Product::all();
        $users = User::all();

        if ($this->selectedCategory !== '') {
            $selectedCategory = $this->selectedCategory;
        } else {
            $selectedCategory = '';
        }

        if ($this->selectedStatus !== '') {
            $selectedStatus = $this->selectedStatus;
        } else {
            $selectedStatus = '';
        }

        if ($this->selectedColor !== '') {
            $selectedColor = $this->selectedColor;
        } else {
            $selectedColor = '';
        }

        $userId = auth()->user()->id;
        return view('livewire.client.item-requests', [
            'itemrequests' => Itemrequest::search($this->search)
                ->where('user_id', $userId)
                ->where('status', 0)
                ->category($selectedCategory)
                ->stockColor($selectedColor)
                ->status($selectedStatus)
                ->orderBy($this->sortBy, $this->sortDir)
                ->paginate($this->perPage),
            'categories' => $categories,
            'itemproducts' => $itemproducts,
            'users' => $users,
            'selectedStatus' => $this->selectedStatus,
            //'aggregatedRequests' => Itemrequest::withAggregatedStocks()->where('itemrequest.status', 0)->get()
        ]);

    }

}
