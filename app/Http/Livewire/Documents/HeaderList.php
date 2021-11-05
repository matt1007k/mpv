<?php

namespace App\Http\Livewire\Documents;

use Livewire\Component;

class HeaderList extends Component
{
    public $total;
    public $search = '';

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

    public function report(string $type)
    {
        $this->emitUp('onReport', $type);
    }

    public function render()
    {
        return view('livewire.documents.header-list');
    }
}
