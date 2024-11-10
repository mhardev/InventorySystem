<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use App\Models\Audittrail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminProfile extends Component
{
    public $user, $displayAdminProfile;
    public $name, $email, $username, $position, $department, $new_password, $new_password_confirmation;

    public function mount()
    {
        // Get the ID of the currently authenticated user
        $UserId = Auth::id();

        // Fetch the user details using the ID
        $user = User::find($UserId);

        if ($user) {
            $this->displayAdminProfile = $user;

            // Initialize user details
            $this->name = $user->name;
            $this->email = $user->email;
            $this->username = $user->username;
            $this->position = $user->position;
            $this->department = $user->department;
        }
        $this->dispatch('AdminProfileShow', 'Admin Profile not found.');
    }

    public function updateAdminInfo()
    {
        // Validate the input data
        $validatedData = $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $this->displayAdminProfile->id,
            'username' => 'required|string|max:255|unique:users,username,' . $this->displayAdminProfile->id,
            'position' => 'nullable|string|max:255',
            'department' => 'nullable|string|max:255',
        ]);

        // Update the user's information
        $oldUserInfo = $this->displayAdminProfile->only(['name', 'email', 'username', 'position', 'department']);
        $this->displayAdminProfile->update($validatedData);

        // Log the update action if the user is an admin
        $currentUser = Auth::user();
        if ($currentUser && $currentUser->role_as == 1) {
            DB::table('audittrail')
            ->insert([
                'user_id' => $currentUser->id,
                'user_type' => 'Admin',
                'activity_name' => 'Update admin info',
                'activity_details' => 'User ID: ' . $this->displayAdminProfile->id . ', Old Info: ' . json_encode($oldUserInfo) . ', New Info: ' . json_encode($validatedData),
                'created_at' => now(), 'updated_at' => now(),
            ]);
        }

        $this->dispatch('AdminProfileShow', ['message' => 'Admin Info updated successfully.']);
    }

    public function updateAdminPassword()
    {
        // Validate the new password
        $validatedData = $this->validate([
            'new_password' => 'required|string|min:6|confirmed',
        ]);

        // Update the password
        $this->displayAdminProfile->update([
            'password' => Hash::make($validatedData['new_password']),
            'updated_at' => now(),
        ]);

        // Log the password update action if the user is an admin
        $currentUser = Auth::user();
        if ($currentUser && $currentUser->role_as == 1) {
            DB::table('audittrail')
            ->insert([
               'user_id' => $currentUser->id,
               'user_type' => 'Admin',
               'activity_name' => 'Update admin password',
               'activity_details' => 'User ID: ' . $this->displayAdminProfile->id . ', Updating admin password',
               'created_at' => now(), 'updated_at' => now(),
            ]);
        }
        $this->dispatchBrowserEvent('AdminProfileShow', ['message' => 'Admin Password updated successfully.']);

        // Reset password fields
        $this->new_password = '';
        $this->new_password_confirmation = '';
    }

    public function render()
    {
        return view('livewire.admin.admin-profile');
    }
}
