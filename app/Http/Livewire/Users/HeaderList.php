<?php

namespace App\Http\Livewire\Users;

use Livewire\Component;

class HeaderList extends Component
{
    public $total;
    public $search = '';
    public $isEmpty = true;

    public function mount(int $total = 0)
    {
        $this->total = $total;
    }

    public function updated($name, $value)
    {
        if ($name === 'search') {
            $this->emitUp('onSearch', $value);
        }
    }

    public function render()
    {
        return view('livewire.users.header-list');
    }
}
