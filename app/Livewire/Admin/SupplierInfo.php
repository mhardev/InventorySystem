<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use App\Models\Supplier;
use App\Models\Audittrail;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\SupplierInfoFormRequest;
use App\Models\Category;

class SupplierInfo extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $id, $supplier_name, $supplier_contact,
            $supplier_email, $supplier_owner, $supplier_address,
            $supplier_city, $supplier_bp, $supplier_tin,
            $supplier_jepscert, $supplier_myrp, $supplier_remark,
            $supplier_philcert, $category_id, $status,
            $created_at, $updated_at;

    public $search = '', $perPage = 5, $sortBy = 'created_at',
            $sortDir = 'DESC', $selectedCategory = '';

    //updating search
    public function updatingSearch()
    {
        $this->resetPage();
    }

    //add supplier info
    public function saveSupplierInfo()
    {
        $validatedData = $this->validate((new SupplierInfoFormRequest())->rules());

        $currentUser = Auth::user();
        $validatedData['user_id'] = $currentUser->id;

        $supplier = Supplier::create($validatedData);

        if ($currentUser && ($currentUser->role_as == 1)) {
            // Create audit trail
            $auditlog = new Audittrail;
            $auditlog->user_id = $currentUser->id;
            $auditlog->user_type = 'Admin';
            $auditlog->activity_name = 'Add new supplier';
            $auditlog->activity_details = 'Supplier ID: ' . $supplier->id .
                                            ', Supplier Name: ' . $supplier->supplier_name .
                                            ', Supplier Type: ' . $supplier->supplier_myrp .
                                            ', Supplier Contact: ' . $supplier->supplier_contact .
                                            ', Supplier Email: ' . $supplier->supplier_email .
                                            ', Supplier Owner: ' . $supplier->supplier_owner .
                                            ', Supplier Address: ' . $supplier->supplier_address .
                                            ', Supplier City: ' . $supplier->supplier_city .
                                            ', Supplier Tin: ' . $supplier->supplier_tin .
                                            ', Supplier Business Permit: ' . $supplier->supplier_bp .
                                            ', Supplier JePS Cert. No.: ' . $supplier->supplier_jepscert .
                                            ', Supplier Mayors Permit: ' . $supplier->supplier_myrp .
                                            ', Supplier Phil Cert. No.: ' . $supplier->supplier_philcert .
                                            ', Supplier Remarks: ' . $supplier->supplier_remark .'';
            $auditlog->save();
        }

        $this->dispatch('SupplierInfoAdded', 'Supplier added successfully!');

        $this->resetInput();
    }

    //edit supplier info
    public function showSupplierInfo(int $id)
    {
        $supplier = Supplier::find($id);
        if($supplier){
        $this->id = $supplier->id;
        $this->supplier_name = $supplier->supplier_name;
        $this->supplier_contact = $supplier->supplier_contact;
        $this->supplier_email = $supplier->supplier_email;
        $this->supplier_owner = $supplier->supplier_owner;
        $this->supplier_address = $supplier->supplier_address;
        $this->supplier_city = $supplier->supplier_city;
        $this->supplier_tin = $supplier->supplier_tin;
        $this->supplier_bp = $supplier->supplier_bp;
        $this->supplier_jepscert = $supplier->supplier_jepscert;
        $this->supplier_myrp = $supplier->supplier_myrp;
        $this->supplier_philcert = $supplier->supplier_philcert;
        $this->category_id = $supplier->category_id;
        $this->status = $supplier->status;
        $this->created_at = $supplier->created_at;
        $this->updated_at = $supplier->updated_at;
        $this->supplier_remark = $supplier->supplier_remark;
        }
        else{
            return redirect()->to('/suppliers');
        }
    }

    //update supplier info
    public function updateSupplierInfo()
    {
        $validatedData = $this->validate((new SupplierInfoFormRequest())->rules());

        // Find the supplier before updating
        $supplier = Supplier::findOrFail($this->id);

        // Capture old supplier information
        $oldSupplierInfo = [
            'supplier_name' => $supplier->supplier_name,
            'supplier_contact' => $supplier->supplier_contact,
            'supplier_email' => $supplier->supplier_email,
            'supplier_owner' => $supplier->supplier_owner,
            'supplier_address' => $supplier->supplier_address,
            'supplier_city' => $supplier->supplier_city,
            'supplier_tin' => $supplier->supplier_tin,
            'supplier_bp' => $supplier->supplier_bp,
            'supplier_jepscert' => $supplier->supplier_jepscert,
            'supplier_myrp' => $supplier->supplier_myrp,
            'supplier_philcert' => $supplier->supplier_philcert,
            'category_id' => $supplier->category_id,
            'status' => $supplier->status,
            'supplier_remark' => $supplier->supplier_remark
        ];

        // Update supplier information
        $supplier->update([
            'supplier_name' => $validatedData['supplier_name'],
            'supplier_contact' => $validatedData['supplier_contact'],
            'supplier_email' => $validatedData['supplier_email'],
            'supplier_owner' => $validatedData['supplier_owner'],
            'supplier_address' => $validatedData['supplier_address'],
            'supplier_city' => $validatedData['supplier_city'],
            'supplier_tin' => $validatedData['supplier_tin'],
            'supplier_bp' => $validatedData['supplier_bp'],
            'supplier_jepscert' => $validatedData['supplier_jepscert'],
            'supplier_myrp' => $validatedData['supplier_myrp'],
            'supplier_philcert' => $validatedData['supplier_philcert'],
            'category_id' => $validatedData['category_id'],
            'status' => $validatedData['status'],
        ]);

        // Create audit trail
        $currentUser = Auth::user();
        $validatedData['user_id'] = $currentUser->id;

        if ($currentUser && ($currentUser->role_as == 1)) {
            $auditlog = new Audittrail;
            $auditlog->user_id = $currentUser->id;
            $auditlog->user_type = 'Admin';
            $auditlog->activity_name = 'Update supplier info';
            $auditlog->activity_details = 'Supplier ID: ' . $supplier->id . ', Old Info: ' . json_encode($oldSupplierInfo) . ', New Info: ' . json_encode($validatedData);
            $auditlog->save();
        }

        $this->dispatch('SupplierInfoUpdated', 'Supplier Info updated successfully!');

        $this->resetInput();
    }

    //reset modal
    public function resetInput()
    {
        $this->supplier_name = '';
        $this->supplier_contact = '';
        $this->supplier_email = '';
        $this->supplier_owner = '';
        $this->supplier_address = '';
        $this->supplier_city = '';
        $this->supplier_tin = '';
        $this->supplier_bp = '';
        $this->supplier_jepscert = '';
        $this->supplier_myrp = '';
        $this->supplier_philcert = '';
        $this->category_id = '';
        $this->status = '';
        $this->supplier_remark = '';
    }

    //delete item brand
    public function deleteSupplierInfo(int $id)
    {
        $this->id = $id;
    }

    //destroy item brand
    public function destroySupplierInfo()
    {
        Supplier::find($this->id)->delete();

        $currentUser = Auth::user();
        if ($currentUser && ($currentUser->role_as == 1)) {
            $auditlog = new Audittrail;
            $auditlog->user_id = $currentUser->id;
            $auditlog->user_type = 'Admin';
            $auditlog->activity_name = 'Delete supplier';
            $auditlog->activity_details = 'Deleting supplier from database';
            $auditlog->save();
        }

        //session()->flash('message', 'Supplier deleted successfully!');
        $this->dispatch('SupplierInfoDeleted', 'Supplier deleted successfully!');
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

    //fetch supplier data
    public function render()
    {
        $itemcategories = Category::all();
        $users = User::all();

        if ($this->selectedCategory !== '') {
            $selectedCategory = $this->selectedCategory;
        } else {
            $selectedCategory = '';
        }

        $suppliers = Supplier::search($this->search)
                ->orderBy($this->sortBy, $this->sortDir)
                ->paginate($this->perPage);

        return view('livewire.admin.supplier-info', [
            'suppliers' => Supplier::search($this->search)
            ->role($selectedCategory)
            ->orderBy($this->sortBy, $this->sortDir)
            ->paginate($this->perPage),
            'users' => $users,
            'itemcategories' => $itemcategories
        ]);
    }
}
