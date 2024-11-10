<?php

namespace App\Livewire\Client;

use App\Models\User;
use Livewire\Component;
use App\Models\Audittrail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserProfile extends Component
{
    public $user, $displayUserProfile;
    public $name, $email, $username, $position, $department, $new_password, $new_password_confirmation;

    public function mount()
    {
        // Get the ID of the currently authenticated user
        $UserId = Auth::id();

        // Fetch the user details using the ID
        $user = User::find($UserId);

        if ($user) {
            $this->displayUserProfile = $user;

            // Initialize user details
            $this->name = $user->name;
            $this->email = $user->email;
            $this->username = $user->username;
            $this->position = $user->position;
            $this->department = $user->department;
        }
        $this->dispatch('UserProfileShow', 'User Profile not found.');
    }

    public function updateUserInfo()
    {
        // Validate the input data
        $validatedData = $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $this->displayUserProfile->id,
            'username' => 'required|string|max:255|unique:users,username,' . $this->displayUserProfile->id,
            'position' => 'nullable|string|max:255',
            'department' => 'nullable|string|max:255',
        ]);

        // Update the user's information
        $oldUserInfo = $this->displayUserProfile->only(['name', 'email', 'username', 'position', 'department']);
        $this->displayUserProfile->update($validatedData);

        // Log the update action if the user is an admin
        $currentUser = Auth::user();
        if ($currentUser && $currentUser->role_as == 0) {
            Audittrail::create([
                'user_id' => $currentUser->id,
                'user_type' => 'User',
                'activity_name' => 'Update user info',
                'activity_details' => 'User ID: ' . $this->displayUserProfile->id . ', Old Info: ' . json_encode($oldUserInfo) . ', New Info: ' . json_encode($validatedData),
            ]);
        }
        $this->dispatch('UserProfileShow', ['message' => 'User Info updated successfully.']);
    }

    public function updateUserPassword()
    {
        // Validate the new password
        $validatedData = $this->validate([
            'new_password' => 'required|string|min:6|confirmed',
        ]);

        // Update the password
        $this->displayUserProfile->update([
            'password' => Hash::make($validatedData['new_password']),
        ]);

        // Log the password update action if the user is an admin
        $currentUser = Auth::user();
        if ($currentUser && $currentUser->role_as == 0) {
            Audittrail::create([
                'user_id' => $currentUser->id,
                'user_type' => 'User',
                'activity_name' => 'Update user password',
                'activity_details' => 'User ID: ' . $this->displayUserProfile->id . ', Updating user password',
            ]);
        }

        $this->dispatchBrowserEvent('UserProfileShow', ['message' => 'User Password updated successfully.']);

        // Reset password fields
        $this->new_password = '';
        $this->new_password_confirmation = '';
    }

    public function render()
    {
        return view('livewire.client.user-profile');
    }
}
