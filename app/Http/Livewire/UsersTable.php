<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;

class UsersTable extends Component
{
    use WithPagination;

    public $queryString = ['search' => ['except' => '']];

    public $search = '';

    public function render()
    {
        $users = User::where('name', 'LIKE', "%{$this->search}%")->orWhere('email', 'LIKE', "%{$this->search}%")->latest()->paginate(5);
        return view('livewire.users-table', ['users' => $users]);
    }
}
