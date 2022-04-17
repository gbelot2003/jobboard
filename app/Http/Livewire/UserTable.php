<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

class UserTable extends Component
{
    use WithPagination;

    public $showEditModal = false;
    public $create = false;
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
        'editing.password' => 'nullable|string',
        'rol' => 'required',
    ];

    /**
     * Create a new record
     *
     * @return void
     */
    public function create()
    {
        $this->showEditModal = true;
        $this->create = true;
        $this->editing = User::make();
        $this->editing->assignRole('User');
    }

    /**
     * Edit a record
     *
     * @param sect $section
     * @return void
     */
    public function editModal(User $user)
    {
        $this->showEditModal = true;
        $this->editing = $user;
        $this->password = $user->password;
        $this->rol = $this->editing->roles[0]->id;
    }

    /**
     * Close modal
     *
     * @return void
     */
    public function closeModal()
    {
        $this->resetErrorBag();
        $this->resetValidation();
        $this->showEditModal = false;
        $this->create = false;
    }

        /**
     * Save record
     *
     * @return void
     */
    public function save()
    {
        $this->validate();
        if ($this->editing->password === null){
            $this->editing->password = $this->password;
        } else {
            $this->editing->password = bcrypt($this->editing->password);
        }

        $this->editing->save();
        $this->editing->roles()->sync($this->rol);
        if($this->create === true) {
            /**
             * Eventos si se crea un nuevo usuario
             */
        }
        $this->closeModal();
    }

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

        $roles = Role::all();


        return view('livewire.user-table', compact('rows', 'roles'));
    }
}
