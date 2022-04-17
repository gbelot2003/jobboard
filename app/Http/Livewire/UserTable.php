<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UserTable extends Component
{
    use WithPagination;

    public $showEditModal = false;
    public $search;
    public User $editing;
    public $password;
    public $rol;

    public function updatingSearch()
    {
        $this->resetPage();
    }

        /**
     * Rules Validation
     *
     * @var array
     */
    protected $rules = [
        'editing.name' => 'required',
        'editing.email' => 'required|email',
        'editing.password' => 'string',
        'editing.company_id' => 'required',
        'editing.settlement_id' => 'required',
        'editing.status' => 'required',
        'rol' => 'required',
    ];



    public function render()
    {
        $rows = User::orderBy('id', 'DESC')
        ->where('name', 'like', '%' . $this->search . '%')
        ->orWhere('email', 'like', '%' . $this->search . '%')
        ->orWherehas('roles', function($q) {
            $q->where('name', 'like', '%' . $this->search . '%');
        })
        /**
        ->orWherehas('company', function($q) {
            $q->where('name', 'like', '%' . $this->search . '%');
        })
        ->orWherehas('settlement', function($q) {
            $q->where('name', 'like', '%' . $this->search . '%');
        }) */
        ->with('roles')
        ->paginate(10);

        return view('livewire.user-table', compact('rows'));
    }
}
