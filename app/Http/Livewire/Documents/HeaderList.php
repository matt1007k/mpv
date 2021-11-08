<?php

namespace App\Http\Livewire\Documents;

use Livewire\Component;

class HeaderList extends Component
{
    public $total;
    public $search = '';
    public $dateFrom = '';
    public $dateTo = '';
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

    public function report(string $type)
    {
        $this->emitUp('onReport', $type);
    }

    public function clear()
    {
        $this->dateFrom = '';
        $this->dateTo = '';
    }

    public function onFilter()
    {
        $this->validate([
            'dateFrom' => 'required|date',
            'dateTo' => 'required|date|after:dateFrom',
        ]);
        $this->emitUp('onFilterAdvanced', $this->dateFrom, $this->dateTo);
    }

    public function render()
    {
        return view('livewire.documents.header-list');
    }
}
