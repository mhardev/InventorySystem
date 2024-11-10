<?php

namespace App\Livewire\Client;

use App\Models\User;
use App\Models\Product;
use Livewire\Component;
use App\Models\Itemrequest;
use App\Models\Usernotif;
use Livewire\WithPagination;

class UserNotifications extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search = '', $perPage = 5,
            $sortBy = 'created_at', $sortDir = 'DESC';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function setSortBy($sortByField)
    {
        if($this->sortBy === $sortByField) {
            $this->sortDir = ($this->sortDir == "ASC") ? 'DESC' : "ASC";
            return;
        }

        $this->sortBy = $sortByField;
        $this->sortDir = 'DESC';
    }

    public function render()
    {
        $userId = auth()->user()->id;

        return view('livewire.client.user-notifications', [
            'usernotifications' => Usernotif::whereHas('itemrequest', function($query) use ($userId) {
                    $query->where('user_id', $userId);
                })
                ->search($this->search)
                ->orderBy($this->sortBy, $this->sortDir)
                ->paginate($this->perPage),
        ]);
    }
}
