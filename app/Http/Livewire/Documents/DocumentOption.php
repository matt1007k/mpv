<?php

namespace App\Http\Livewire\Documents;

use Livewire\Component;

class DocumentOption extends Component
{

    public $showDropdown = false;
    public $documentId;
    public $filePath;

	protected $listeners = ['download' => 'onDownload'];

    public function mount(int $documentId = 0, string $filePath = '')
    {
        $this->documentId = $documentId;
        $this->filePath = $filePath;
    }

    public function onDownload(string $filePath = '')
    {
        $this->showDropdown = false;
    }

    public function render()
    {
        return view('livewire.documents.document-option');
    }
}
