<?php

namespace App\Livewire\Client;

use App\Models\User;
use App\Models\Product;
use App\Models\Userlog;
use Livewire\Component;
use App\Models\Itemrequest;
use Livewire\WithPagination;

class UserHistory extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search = '', $perPage = 5,
            $sortBy = 'created_at', $sortDir = 'DESC',
            $selectedItemRequest = '';

    public function showDetails(int $id)
    {
        $itemrequest = Itemrequest::find($id);
        if($itemrequest){
            $this->selectedItemRequest = $itemrequest;
            $this->dispatch('openItemRequestModal');
        } else {
            //session()->flash('message', 'Item Product Info not found.');

            $this->dispatch('itemRequestInfoShow', 'Item Request Info not found.');
        }
    }

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
        $itemrequests = Itemrequest::all();
        $itemproducts = Product::all();
        $users = User::all();
        $userId = auth()->user()->id;

        return view('livewire.client.user-history', [
            'userhistory' => Userlog::whereHas('itemrequest',
                function($query) use ($userId) {
                    $query->where('user_id', $userId);
                })
                ->search($this->search)
                ->orderBy($this->sortBy, $this->sortDir)
                ->paginate($this->perPage),
            'itemrequests' => $itemrequests,
            'itemproducts' => $itemproducts,
            'users' => $users,
        ]);
    }
}
