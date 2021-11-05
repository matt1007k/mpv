<?php

namespace App\Http\Livewire\Documents;

use Livewire\Component;

class SortBy extends Component
{
    public $sortBy = 'desc';

    public function onSortBy(string $sortBy = 'desc')
    {
        $this->sortBy = $sortBy;
        $this->emitUp('onSortBy', $sortBy);
    }

    public function render()
    {
        return view('livewire.documents.sort-by');
    }
}
