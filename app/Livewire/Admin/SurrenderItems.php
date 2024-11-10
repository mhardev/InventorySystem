<?php

namespace App\Livewire\Admin;

use App\Models\User;
use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use App\Models\Itemuser;
use App\Models\Audittrail;
use App\Models\Itemrequest;
use App\Models\Surrenderitem;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class SurrenderItems extends Component
{
    use WithPagination;

    public $surrenderRequestId, $remarks, $request_remark;

    protected $paginationTheme = 'bootstrap';

    public $search = '', $selectedSurrenderRequest = '',
            $selectedCategory = '', $selectedStatus = '',
            $selectedColor = '', $perPage = 5,
            $sortBy = 'created_at', $sortDir = 'ASC';

    public function showSurrenderRequest(int $id)
    {
        $surrenderitems = Itemrequest::find($id);
        if ($surrenderitems) {
            $this->selectedSurrenderRequest = $surrenderitems;
            $this->dispatch('openItemRequestModal');
        } else {
            $this->dispatch('itemRequestDetailShow', 'Item Request Details not found.');
        }
        $this->closeModal();
    }

    public function openSurrenderModal($id)
    {
        $this->surrenderRequestId = $id;
    }

    public function closeModal()
    {
        $this->resetInput();
    }

    public function resetInput()
    {
        $this->surrenderRequestId = null;
    }

    public function surrenderItemRequest()
    {
        $currentUser = Auth::user();
        $surrenderItem = Itemrequest::find($this->surrenderRequestId);

        if ($surrenderItem) {
            DB::transaction(function () use ($surrenderItem, $currentUser) {
                $product = Product::find($surrenderItem->product_id);
                $itemUser = Itemuser::where('request_id', $surrenderItem->id)->first();

                $validatedData = $this->validate([
                    'remarks' => 'required',
                ]);

                if ($product && $itemUser) {
                    // Update the item stock in the product table
                    $product->increment('item_stock', $itemUser->item_stock);

                    // Update the status of the surrender item request and the updated_at timestamp
                    $surrenderItem->status = 4; // Assuming 4 is the status code for surrendered
                    $surrenderItem->updated_at = now();
                    $surrenderItem->save();

                    logger()->info('Itemrequest updated: ', ['id' => $surrenderItem->id, 'status' => $surrenderItem->status]);

                    // Add a record to the surrenderitems table
                    DB::table('surrenderitems')
                    ->insert([
                        'request_id' => $surrenderItem->id, 'useritem_id' => $itemUser->id,
                        'user_id' => $surrenderItem->user_id, 'product_id' => $surrenderItem->product_id,
                        'item_stock' => $itemUser->item_stock, 'remarks' => $validatedData['remarks'],
                        'status' => 1, 'created_at' => now(), 'updated_at' => now(),
                    ]);

                    logger()->info('Surrenderitem created: ', ['request_id' => $surrenderItem->id]);

                    // Delete the useritem record
                    $itemUser->delete();

                    logger()->info('Itemuser deleted: ', ['id' => $itemUser->id]);
                } else {
                    // Log if product or itemUser is not found
                    logger()->error('Product or ItemUser not found for surrender request ID: ' . $surrenderItem->id);
                }
            });

            // Audit Log
            if ($currentUser && ($currentUser->role_as == 1)) {

                DB::table('audittrail')
                ->insert([
                    'user_id' => $currentUser->id, 'user_type' => 'Admin',
                    'activity_name' => 'Surrendered item request',
                    'activity_details' => 'Surrendered Item Request ID: ' . $surrenderItem->id,
                    'created_at' => now(), 'updated_at' => now(),
                ]);
            }

            $this->dispatch('SurrenderedRequestApproved', 'Item request approved.');
        } else {
            $this->dispatch('SurrenderedRequestError', 'Item request not found.');
        }

        $this->resetInput();
    }

    public function setSortBy($sortByField)
    {
        if ($this->sortBy === $sortByField) {
            $this->sortDir = ($this->sortDir == "DESC") ? 'ASC' : "DESC";
            return;
        }

        $this->sortBy = $sortByField;
        $this->sortDir = 'ASC';
    }

    public function render()
    {
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

        return view('livewire.admin.surrender-items', [
            'surrenderitems' => Itemrequest::search($this->search)
                ->where('status', 3) // Assuming status 3 is for items pending surrender
                ->category($selectedCategory)
                ->stockColor($selectedColor)
                ->status($selectedStatus)
                ->orderBy($this->sortBy, $this->sortDir)
                ->paginate($this->perPage),
            'itemusers' => Itemuser::all(),
            'categories' => Category::all(),
            'itemproducts' => Product::all(),
            'users' => User::all(),
            'selectedStatus' => $this->selectedStatus,
        ]);
    }
}
