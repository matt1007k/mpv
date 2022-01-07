<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use Livewire\Component;

class UserOption extends Component
{

    public $showDropdown = false;
    public $userId;
    public $user;

    public function mount(User $user)
    {
        $this->userId = $user->id;
        $this->user = $user;
    }

    public function delete()
    {
        $this->showDropdown = false;
        $this->emitUp('delete', $this->userId);
    }

    public function render()
    {
        return view('livewire.users.user-option');
    }
}
