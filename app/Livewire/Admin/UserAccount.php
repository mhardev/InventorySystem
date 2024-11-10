<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use App\Models\Usernotif;
use App\Models\Audittrail;
use App\Models\Userhistory;
use Livewire\WithPagination;
use App\Models\Usernotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserAccount extends Component
{
    //pagination
    use WithPagination;

    //pagination ui
    protected $paginationTheme = 'bootstrap';

    public $id, $username, $name, $email, $position, $department, $role_as, $password;
    // search
    public $search = '', $perPage = 5,
            $sortBy = 'created_at', $sortDir = 'DESC',
            $selectedRole = '';

    //updating search
    public function updatingSearch()
    {
        $this->resetPage();
    }

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users',
        'username' => 'required|string',
        'position' => 'required|string',
        'department' => 'required|string',
        'password' => 'required|string|min:8',
    ];

    //save user account
    public function saveUserAccount()
    {
        $validatedData = $this->validate($this->rules);

        // Hash the password before saving
        $validatedData['password'] = Hash::make($validatedData['password']);

        $currentUser = Auth::user();
        $validatedData['updated_by'] = $currentUser->id;

        // Create the user
        $user = User::create($validatedData);

        if ($currentUser && ($currentUser->role_as == 1)) {
            // Create audit trail
            $auditlog = new Audittrail;
            $auditlog->user_id = $currentUser->id;
            $auditlog->user_type = 'Admin';
            $auditlog->activity_name = 'Create new user account';
            $auditlog->activity_details = 'User ID: ' . $user->id . ', Email: ' . $user->email . ', Position: ' . $user->position . ', Department: ' . $user->department . ', User type: User';
            $auditlog->save();
        }

        //session()->flash('toastMessage', 'User account created successfully!');

        $this->dispatch('userAccountAdded', 'User account created successfully!');

        $this->resetInput();
    }


    //edit user info
    public function editUserInfo(int $id)
    {
        $user = User::find($id);
        if($user){
        $this->id = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->username = $user->username;
        $this->position = $user->position;
        $this->department = $user->department;
        $this->role_as = $user->role_as;
        }
        else{
            return redirect()->to('/users');
        }
    }

    //update user info
    public function updateUserInfo()
    {
        $validatedData = $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'username' => 'required|string',
            'position' => 'required|string',
            'department' => 'required|string',
            'role_as' => '',
        ]);

        // Find the user before updating
        $user = User::findOrFail($this->id);

        // Capture old user information
        $oldUserInfo = [
            'name' => $user->name,
            'email' => $user->email,
            'username' => $user->username,
            'position' => $user->position,
            'department' => $user->department,
            'role_as' => $user->role_as
        ];

        // Update user information
        $user->update([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'username' => $validatedData['username'],
            'position' => $validatedData['position'],
            'department' => $validatedData['department'],
            'role_as' => $validatedData['role_as']
        ]);

        // Create audit trail
        $currentUser = Auth::user();

        /*Usernotif::create([
            'user_id' => Auth::id(),
        ]);*/
        $validatedData['updated_by'] = $currentUser->id;
        if ($currentUser && ($currentUser->role_as == 1)) {
            $auditlog = new Audittrail;
            $auditlog->user_id = $currentUser->id;
            $auditlog->user_type = 'Admin';
            $auditlog->activity_name = 'Update user info';
            $auditlog->activity_details = 'User ID: ' . $user->id . ', Old Info: ' . json_encode($oldUserInfo) . ', New Info: ' . json_encode($validatedData);
            $auditlog->save();
        }

        $this->dispatch('userInfoUpdated', 'User Info updated successfully!');

        $this->resetInput();
    }


    //edit user password
    public function editUserPass(int $id)
    {
        $user = User::find($id);
        if($user){
        $this->id = $user->id;
        $this->email = $user->email;
        }
        else{
            return redirect()->to('/users');
        }
    }

    //update user password
    public function updateUserPass()
    {
        // Find the user before updating
        $user = User::findOrFail($this->id);

        $validatedData = $this->validate([
            'password' => 'required|string|min:8',
        ]);

        // Hash the new password
        $validatedData['password'] = Hash::make($validatedData['password']);

        // Update user password
        $user->update([
            'password' => $validatedData['password']
        ]);

        // Create audit trail
        $currentUser = Auth::user();


        /*Usernotif::create([
            'user_id' => Auth::id(),
        ]);*/
        $validatedData['updated_by'] = $currentUser->id;
        if ($currentUser && ($currentUser->role_as == 1)) {
            $auditlog = new Audittrail;
            $auditlog->user_id = $currentUser->id;
            $auditlog->user_type = 'Admin';
            $auditlog->activity_name = 'Update user password';
            $auditlog->activity_details = 'User ID: ' . $user->id . ', Updating user password';
            $auditlog->save();
        }

        $this->dispatch('userPasswordUpdated', 'User password updated successfully!');

        $this->resetInput();
    }
    //delete user account
    public function deleteUserAcc(int $id)
    {
        $this->id = $id;
    }

    //destroy user account
    public function destroyUserAcc()
    {
        User::find($this->id)->delete();

        $currentUser = Auth::user();
        if ($currentUser && ($currentUser->role_as == 1)) {
            $auditlog = new Audittrail;
            $auditlog->user_id = $currentUser->id;
            $auditlog->user_type = 'Admin';
            $auditlog->activity_name = 'Delete user account';
            $auditlog->activity_details = 'Deleting account from database';
            $auditlog->save();
        }
        $this->dispatch('userAccountDeleted', 'User account deleted successfully!');
    }

    //reset input fields method
    public function resetInput()
    {
        $this->name = '';
        $this->email = '';
        $this->username = '';
        $this->position = '';
        $this->department = '';
        $this->role_as = '';
        $this->password = '';
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

    //search function
    public function render()
    {
        return view('livewire.admin.user-account', [
            'users' => User::where('role_as', '!=', '1')
            ->when($this->search, function ($query) {
                $query->where(function ($subQuery) {
                    $subQuery->where('name', 'like', '%' . $this->search . '%')
                        ->orWhere('email', 'like', '%' . $this->search . '%');
                });
            })
            ->when($this->selectedRole, function ($query) {
                $query->where('role_as', $this->selectedRole);
            })
            ->paginate($this->perPage)
        ]);
    }

}
