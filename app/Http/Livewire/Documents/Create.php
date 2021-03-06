<?php

namespace App\Http\Livewire\Documents;

use App\Models\Document;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $full_name;
    public $doc_type;
    public $doc_number;
    public $email;
    public $cell_phone;
    public $address;
    public $origin_place;
    public $subject;
    public $file;

    public $totalSteps = 3;
    public $currentStep = 1;

    public function mount()
    {
        $this->currentStep = 1;
        if (auth() && auth()->user() != null) {
            $this->full_name = auth()->user()->name;
            $this->doc_type = auth()->user()->doc_type;
            $this->doc_number = auth()->user()->doc_number;
            $this->email = auth()->user()->email;
        }
    }

    public function validateData()
    {
        if ($this->currentStep == 1) {
            $this->validate([
                'full_name' => 'required|string',
                'email' => 'required|string|email',
                'doc_type' => 'required|string',
                'doc_number' => ['required', 'numeric', $this->doc_type === 'dni' ? 'digits:8' : 'digits:10'],
                'cell_phone' => 'required|integer|digits:9',
            ]);
        } else if ($this->currentStep == 2) {
            $this->validate([
                'address' => 'required|string',
                'origin_place' => 'required|string',
                'subject' => 'required|string',
            ]);
        }
    }

    public function register()
    {
        $this->resetErrorBag();
        if ($this->currentStep == 3) {
            $this->validate([
                'file' => 'file|max:20000|mimes:pdf',
            ]);
        }

        $file_name = 'doc_' . $this->file->getClientOriginalName();
        $file_path = $this->file->storeAs('documents', $file_name, 'public');
        // $file_path = $this->file->store('documents', 'public');

        if ($file_path) {
            $values = array(
                'full_name' => $this->full_name,
                'email' => $this->email,
                'doc_type' => $this->doc_type,
                'doc_number' => $this->doc_number,
                'cell_phone' => $this->cell_phone,
                'address' => $this->address,
                'origin_place' => $this->origin_place,
                'subject' => $this->subject,
                'file' => $file_path,
                'user_id' => auth()->user() != null ? auth()->user()->id : null,
            );

            Document::create($values);
            $this->reset();
            $this->currentStep = 1;
            $this->redirectRoute('pages.message-success');
        }

    }

    public function goStep(int $step)
    {
        $this->resetErrorBag();
        $this->validateData();
        $this->currentStep = $step;
    }

    public function previousStep()
    {
        $this->resetErrorBag();
        $this->currentStep--;
        if ($this->currentStep < 1) {
            $this->currentStep = 1;
        }
    }

    public function nextStep()
    {
        $this->resetErrorBag();
        $this->validateData();
        $this->currentStep++;
        if ($this->currentStep > $this->totalSteps) {
            $this->currentStep = $this->totalSteps;
        }
    }

    public function render()
    {
        return view('livewire.documents.create');
    }
}
