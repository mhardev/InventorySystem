<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use App\Models\Audittrail;
use Livewire\WithPagination;

class AuditTrails extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search = '', $selectedUserType = '',
            $selectedAuditTrail, $perPage = 5,
            $sortBy = 'created_at', $sortDir = 'DESC';

    public function showAuditTrail(int $id)
    {
        $auditlog = Audittrail::find($id);
        if($auditlog){
            $this->selectedAuditTrail = $auditlog;
            $this->dispatch('openAuditTrailModal');
        } else {
            session()->flash('message', 'Audit trail not found.');
        }
    }

    public function closeModal()
    {
        $this->selectedAuditTrail = null;
    }

    public function setSortBy($sortByField) {
        if($this->sortBy === $sortByField) {
            $this->sortDir = ($this->sortDir == "ASC") ? 'DESC' : "ASC";
            return;
        }

        $this->sortBy = $sortByField;
        $this->sortDir = 'DESC';
    }

    //fetch audit trail data
    public function render()
    {
        return view('livewire.admin.audit-trails', [
            'auditlogs' => Audittrail::search($this->search)
                ->role($this->selectedUserType)
                ->orderBy($this->sortBy, $this->sortDir)
                ->paginate($this->perPage),
            'users' => User::all(),
        ]);
    }
}

