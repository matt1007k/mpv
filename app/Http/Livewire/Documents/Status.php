<?php

namespace App\Http\Livewire\Documents;

use App\Models\Document;
use Livewire\Component;

class Status extends Component
{
    public $document;

    public function mount(Document $document)
    {
        $this->document = $document;
        if ($document->hasResponse() && !$document->isProcessed()) {
            $document->update(['status' => 'processed']);
        }
    }

    public function render()
    {
        return view('livewire.documents.status');
    }
}
