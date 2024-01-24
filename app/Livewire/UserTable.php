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
        if ($this->isAdmin) {
            $isAdmin = 1;
        } else {
            $isAdmin = 0;
        }
        $user = User::create([
            'username' => $this->username,
            'email' => $this->email,
            'password' => $this->password,
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

    public function render()
    {
        $search = '%' . $this->search . '%';
        if (strlen($this->search >= 2)) {
            $users = User::where('username', 'LIKE', $search)
                ->get();
        } else {
            $users = User::orderByDesc('created_at')->paginate($this->pagination);
        }
        return view('livewire.user-table', compact('users'));
    }
}
