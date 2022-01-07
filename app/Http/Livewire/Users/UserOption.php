<?php

namespace App\Http\Livewire\Users;

use Livewire\Component;

class UserOption extends Component
{

    public $showDropdown = false;
    public $userId;

    public function mount(int $userId = 0)
    {
        $this->userId = $userId;
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
