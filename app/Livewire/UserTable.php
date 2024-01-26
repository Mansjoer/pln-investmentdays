<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class UserTable extends Component
{
    public $search = '';

    public $pagination = 5;

    // protected $listeners = ['refreshUserTable' => '$refresh'];

    public $id, $username, $email, $password = 'investmentdays24', $isAdmin;

    public function createUser()
    {
        $this->validate([
            'username' => 'required|unique:users,username'
        ]);
        if ($this->isAdmin) {
            $isAdmin = 1;
        } else {
            $isAdmin = 0;
        }
        $user = User::create([
            'username' => ucfirst($this->username),
            'email' => $this->email,
            'password' => bcrypt($this->password),
            'isAdmin' => $isAdmin
        ]);
        $this->reset();
        $this->dispatch('closeModal');
    }

    public function deleteUser($id)
    {
        $user = User::find($id);
        $user->delete();
    }

    public function modalClose()
    {
        $this->reset();
        $this->resetValidation();
    }

    public function render()
    {
        $search = '%' . $this->search . '%';
        if (strlen($this->search >= 2)) {
            $users = User::where('username', 'LIKE', $search)
                ->orderBy('username')
                ->get();
        } else {
            $users = User::orderBy('username')->paginate($this->pagination);
        }
        return view('livewire.user-table', compact('users'));
    }
}
