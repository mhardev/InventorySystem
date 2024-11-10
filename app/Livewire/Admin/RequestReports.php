<?php

namespace App\Livewire\Admin;

use App\Models\Audittrail;
use App\Models\User;
use App\Models\Product;
use App\Models\Userlog;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use App\Models\Category;
use App\Models\Itemrequest;
use App\Models\Itemuser;
use Livewire\WithPagination;
use App\Models\Usernotif;
use Illuminate\Support\Facades\Auth;

class RequestReports extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search = '', $selectedItemRequest = '',
            $selectedCategory = '', $selectedStatus = '',
            $selectedColor = '', $perPage = 5,
            $sortBy = 'updated_at', $sortDir = 'DESC',
            $userItemId, $itemRequestId;

    public function showItemRequest($user_id, $product_id, $requestId)
    {
        $itemrequest = Itemrequest::where('user_id', $user_id)
            ->where('product_id', $product_id)
            ->first();
        if ($itemrequest) {
            $this->selectedItemRequest = $itemrequest;
            $this->dispatch('openItemRequestModal');
        } else {
            $this->dispatch('itemRequestDetailShow', 'Item Request Details not found.');
        }
    }

    public function undoItemRequest()
    {
        $itemrequest = Itemrequest::find($this->itemRequestId);
        if ($itemrequest) {
            $userId = $itemrequest->user_id;
            $productId = $itemrequest->product_id;

            $itemrequests = Itemrequest::where('user_id', $userId)
                ->where('product_id', $productId)
                ->get();

            foreach ($itemrequests as $request) {
                $request->status = 0; // Set status to Pending
                $request->request_remark = 'Pending';
                $request->save();
            }

            Itemuser::where('user_id', $userId)
                ->where('product_id', $productId)
                ->delete();

            DB::table('userhistory')
                ->insert([
                    'useritem_id' => $this->userItemId,
                    'history_details' => 'Undo for Request ID: ' . $itemrequest->id,
                    'created_at' => now(), 'updated_at' => now(),
                ]);

            DB::table('usernotification')
                ->insert([
                    'useritem_id' => $this->userItemId,
                    'notification_details' => 'Undo for Request ID: ' . $itemrequest->id,
                    'user_id' => Auth::id(),
                    'created_at' => now(), 'updated_at' => now(),
                ]);

            $currentUser = Auth::user();

            // Audit Log
            if ($currentUser && ($currentUser->role_as == 1)) {
                DB::table('audittrail')
                    ->insert([
                        'user_id' => $currentUser->id,
                        'user_type' => 'Admin',
                        'activity_name' => 'Undo item request',
                        'activity_details' => 'Item Request ID: ' . $itemrequest->id,
                        'created_at' => now(), 'updated_at' => now(),
                    ]);
            }

            $this->dispatch('ItemRequestUndone', 'Item request undone.');
        }

        $this->resetInput();
    }


    public function openUndoModal($id)
    {
        $this->itemRequestId = $id;
    }

    public function closeModal()
    {
        $this->selectedItemRequest = null;
        $this->resetInput();
    }

    public function resetInput()
    {
        $this->userItemId = null;
        $this->itemRequestId = null;
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
        $itemrequests = DB::table(DB::raw("(SELECT @row := @row + 1 AS row_number, itemrequest.*
                                    FROM itemrequest,
                                    (SELECT @row := 0) r
                                    WHERE (itemrequest.status = 1 OR itemrequest.status = 2 OR itemrequest.status = 4)) AS sub"))
        ->leftJoin('users', 'sub.user_id', '=', 'users.id')
        ->leftJoin('itemproducts', 'sub.product_id', '=', 'itemproducts.id')
        ->select(
            'sub.*',
            'users.name as user_name',
            'itemproducts.item_name as product_name'
        )
        ->where(function ($query) {
            $query->where('sub.status', 1)
                ->orWhere('sub.status', 2)
                ->orWhere('sub.status', 4);
        })
        ->when($this->selectedCategory, function ($query) {
            $query->category($this->selectedCategory);
        })
        ->when($this->selectedStatus, function ($query) {
            $query->status($this->selectedStatus);
        })
        ->when($this->selectedColor, function ($query) {
            $query->stockColor($this->selectedColor);
        })
        ->orderBy('sub.updated_at', $this->sortDir) // Specify 'sub.updated_at' here
        ->paginate($this->perPage);


        return view('livewire.admin.request-reports', [
            'itemrequests' => $itemrequests,
            'categories' => Category::all(),
            'itemproducts' => Product::all(),
            'users' => User::all(),
            'selectedStatus' => $this->selectedStatus,
        ]);
    }

}
