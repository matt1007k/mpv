<?php

namespace App\Http\Livewire\Documents;

use App\Models\Document;
use Livewire\Component;
use Livewire\WithPagination;

class DocumentList extends Component
{
    use WithPagination;

    public $search = '';
    public $orderBy = 'desc';
    public $dateFrom = '';
    public $dateTo = '';

    protected $listeners = ['onSearch', 'onSortBy', 'onFilterAdvanced'];

    public function onSearch(string $value)
    {
        $this->search = $value;
    }

    public function onSortBy(string $sortBy = 'desc')
    {
        $this->orderBy = $sortBy;
    }

    public function onFilterAdvanced(string $dateFrom, string $dateTo)
    {
        $this->dateFrom = $dateFrom;
        $this->dateTo = $dateTo;
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.documents.document-list', [
            'documents' => Document::search($this->search)->orderBy('created_at', $this->orderBy)->rangeDate($this->dateFrom, $this->dateTo)->paginate(15),
        ]);
    }
}
