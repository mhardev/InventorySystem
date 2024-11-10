<?php

namespace App\Livewire\Client;

use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use App\Models\Itemuser;
use App\Models\Itemrequest;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UserItems extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search = '', $selectedItem = '',
            $perPage = 5, $sortBy = 'updated_at',
            $sortDir = 'DESC', $itemUserId, $remarks;

    public function showItemDetails(int $id)
    {
        $useritem = Itemuser::find($id);
        if ($useritem) {
            $this->selectedItem = $useritem;
            $this->dispatch('openItemDetailsModal');
        } else {
            $this->dispatch('itemDetailShow', 'Item Request Details not found.');
        }
        $this->closeModal();
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
        //
    }

    public function setSortBy($sortByField)
    {
        if ($this->sortBy === $sortByField) {
            $this->sortDir = ($this->sortDir == "ASC") ? 'DESC' : "ASC";
            return;
        }

        $this->sortBy = $sortByField;
        $this->sortDir = 'DESC';
    }

    public function openSurrenderModal(int $id)
    {
        $this->itemUserId = $id;
    }

    public function surrenderItem()
    {
        $useritem = Itemuser::find($this->itemUserId);

        Itemrequest::create([
            'user_id' => $useritem->user_id,
            'useritem_id' => $useritem->id,
            'product_id' => $useritem->product_id,
            'item_stock' => $useritem->item_stock,
            'request_remark' => 'For surrender',
            'status' => 3,
        ]);

        $currentUser = Auth::user();

        if ($currentUser && ($currentUser->role_as == 0)) {

            DB::table('audittrail')
            ->insert([
                'user_id' => $currentUser->id, 'user_type' => 'User',
                'activity_name' => 'Surrendered item',
                'activity_details' => 'Useritem ID: ' . $useritem->id,
                'created_at' => now(), 'updated_at' => now(),
            ]);
        }

        $this->dispatch('SurrenderItemRequest', 'Surrender Item request successfully.');
    }

    public function render()
    {
        $itemrequests = Itemrequest::all();
        $categories = Category::all();
        $itemproducts = Product::all();

        $userId = auth()->user()->id;

        return view('livewire.client.user-items', [
            'useritems' => Itemuser::search($this->search)
            ->where('user_id', $userId)
            ->where('status', 1)
            ->orderBy($this->sortBy, $this->sortDir)
            ->paginate($this->perPage),
            'itemrequests' => $itemrequests,
            'categories' => $categories,
            'itemproducts' => $itemproducts
        ]);
    }
}
