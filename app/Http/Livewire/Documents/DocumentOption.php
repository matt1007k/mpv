<?php

namespace App\Http\Livewire\Documents;

use Livewire\Component;

class DocumentOption extends Component
{

    public $showDropdown = false;
    public $documentId;

    public function mount(int $documentId = 0)
    {
        $this->documentId = $documentId;
    }

    public function download(int $id = 0)
    {
        $this->emitUp('download', $id);
        $this->showDropdown = false;
    }

    public function render()
    {
        return view('livewire.documents.document-option');
    }
}
