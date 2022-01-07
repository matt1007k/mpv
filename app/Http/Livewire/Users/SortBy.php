<?php

namespace App\Http\Livewire\Users;

use Livewire\Component;

class SortBy extends Component
{
    public $sortBy = 'desc';

    public function mount(string $sortBy = 'desc')
    {
        $this->sortBy = $sortBy;
    }

    public function onSortBy(string $sortBy = 'desc')
    {
        $this->sortBy = $sortBy;
        $this->emitUp('onSortBy', $sortBy);
    }

    public function render()
    {
        return view('livewire.users.sort-by');
    }
}
