<?php

namespace App\Livewire\Admin;

use App\Models\User;
use App\Models\Product;
use App\Models\Userlog;
use Livewire\Component;
use App\Models\Category;
use App\Models\Itemuser;
use App\Models\Usernotif;
use App\Models\Itemrequest;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ItemRequests extends Component
{
    use WithPagination;

    public $itemRequestId, $remarks, $request_remark;

    protected $paginationTheme = 'bootstrap';

    public $search = '', $selectedItemRequest = '',
            $selectedCategory = '', $selectedStatus = '',
            $selectedColor = '', $perPage = 5,
            $sortBy = 'created_at', $sortDir = 'ASC';

    public function showItemRequest(int $id)
    {
        $itemrequest = Itemrequest::find($id);
        if ($itemrequest) {
            $this->selectedItemRequest = $itemrequest;
            $this->dispatch('openItemRequestModal');
        } else {
            $this->dispatch('itemRequestDetailShow', 'Item Request Details not found.');
        }
        $this->closeModal();
    }

    public function approveItemRequest()
    {
        $itemrequest = Itemrequest::find($this->itemRequestId);

        Userlog::create([
            'request_id' => $itemrequest->id,
            'history_details' => 'Approval for Request ID: ' . $itemrequest->id,
        ]);

        Usernotif::create([
            'request_id' => $itemrequest->id,
            'notification_details' => 'Approval for Request ID: ' . $itemrequest->id,
            'user_id' => Auth::id(),
        ]);

        $currentUser = Auth::user();
        if ($itemrequest) {
            $product = Product::find($itemrequest->product_id);
            if ($product && $product->item_stock >= $itemrequest->item_stock) {
                $product->item_stock -= $itemrequest->item_stock;
                $product->save();

                $itemrequest->request_remark = 'Approved';
                $itemrequest->status = 1;
                $itemrequest->save();

                $existingItemUser = Itemuser::where('user_id', $itemrequest->user_id)
                    ->where('product_id', $itemrequest->product_id)
                    ->first();

                if ($existingItemUser) {

                    $existingItemUser->item_stock += $itemrequest->item_stock;
                    $existingItemUser->save();

                } else {

                    DB::table('itemusers')
                    ->insert([
                        'request_id' => $itemrequest->id, 'user_id' => $itemrequest->user_id,
                        'product_id' => $itemrequest->product_id, 'item_stock' => $itemrequest->item_stock,
                        'status' => 1, 'request_remark' => 'Approved',
                        'created_at' => now(), 'updated_at' => now(),
                    ]);
                }

                // Audit Log
                if ($currentUser && ($currentUser->role_as == 1)) {

                    DB::table('audittrail')
                    ->insert([
                        'user_id' => $currentUser->id, 'user_type' => 'Admin',
                        'activity_name' => 'Approved item request',
                        'activity_details' => 'Item Request ID: ' . $itemrequest->id,
                        'created_at' => now(), 'updated_at' => now(),
                    ]);
                }

                $this->dispatch('ItemRequestApproved', 'Item request approved.');
            } else {
                $this->dispatch('ItemRequestError', 'Insufficient stock to approve the request.');
            }
        }

        $this->resetInput();
    }

    public function cancelItemRequest()
    {
        $itemrequest = Itemrequest::findOrFail($this->itemRequestId);

        $validatedData = $this->validate([
            'request_remark' => 'required',
        ]);

        Userlog::create([
            'request_id' => $itemrequest->id,
            'history_details' => 'Cancelled for Request ID: ' . $itemrequest->id,
        ]);

        Usernotif::create([
            'request_id' => $itemrequest->id,
            'notification_details' => 'Cancelled for Request ID: ' . $itemrequest->id,
            'user_id' => Auth::id(),
        ]);

        $this->remarks = $validatedData['request_remark'];

        $itemrequest->update([
            'request_remark' => $this->remarks,
            'status' => 2
        ]);

        $currentUser = Auth::user();

        // Audit Log
        if ($currentUser && ($currentUser->role_as == 1)) {

            DB::table('audittrail')
            ->insert([
                'user_id' => $currentUser->id, 'user_type' => 'Admin',
                'activity_name' => 'Cancelled item request',
                'activity_details' => 'Item Request ID: ' . $itemrequest->id,
                'created_at' => now(), 'updated_at' => now(),
            ]);
        }

        $this->dispatch('ItemRequestCancelled', 'Item request cancelled.');

        $this->resetInput();
    }

    public function openApproveModal($id)
    {
        $this->itemRequestId = $id;
    }

    public function openCancelModal($id)
    {
        $this->itemRequestId = $id;
    }

    public function closeModal()
    {
        $this->resetInput();
    }

    public function resetInput()
    {
        $this->itemRequestId = null;
        $this->request_remark = null;
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

        return view('livewire.admin.item-requests', [
            'itemrequests' => Itemrequest::search($this->search)
                ->where('status', 0)
                ->category($selectedCategory)
                ->stockColor($selectedColor)
                ->status($selectedStatus)
                ->orderBy($this->sortBy, $this->sortDir)
                ->paginate($this->perPage),
            'categories' => Category::all(),
            'itemproducts' => Product::all(),
            'users' => User::all(),
            'selectedStatus' => $this->selectedStatus,
        ]);
    }
}
