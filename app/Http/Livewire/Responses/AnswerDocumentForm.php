<?php

namespace App\Http\Livewire\Responses;

use App\Mail\AnswerDocument;
use App\Mail\SendDocumentObserve;
use App\Models\Document;
use App\Models\Response;
use App\Models\User;
use App\Notifications\sendAnswerDocumentNotification;
use App\Notifications\sendDocumentObserveNotification;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class AnswerDocumentForm extends Component
{
    public $type = 'success';
    public $subject;
    public $document_number;
    public $file_number;
    public $observation;
    public $document;
    public $status;

    public function mount(Document $document)
    {
        $this->document = $document;
        $this->subject = $document->subject;
        $this->status = $document->status;
    }

    public function toggleSend(string $type)
    {
        $this->type = $type;
    }

    public function sendAnswer()
    {
        $this->resetErrorBag();
        if ($this->type === 'success') {
            $this->validate([
                'subject' => 'required|string|max:255',
                'document_number' => 'required|integer',
                'file_number' => 'required|integer',
                'status' => 'required|string',
            ]);
            $this->document->update(['status' => $this->status]);
            $response = Response::create([
                'document_number' => $this->document_number,
                'file_number' => $this->file_number,
                'type' => $this->type,
                'document_id' => $this->document->id,
            ]);

            $user = User::where('email', $this->document->email)->first();
            if ($user) {
                $user->notify(new sendAnswerDocumentNotification($this->subject, $response));
            } else {
                Mail::to($this->document->email)
                    ->send(new AnswerDocument($this->subject, $response));
            }
            session()->flash('message', 'Respuesta enviado con exitó');
            return redirect()->to('/dashboard');
        }
        if ($this->type === 'warning') {
            $this->validate([
                'subject' => 'required|string|max:255',
                'observation' => 'required|string|max:255',
                'status' => 'required|string',
            ]);

            $this->document->update(['status' => $this->status]);
            $response = Response::create([
                'observation' => $this->observation,
                'type' => $this->type,
                'document_id' => (int) $this->document->id,
            ]);

            $user = User::where('email', $this->document->email)->first();
            if ($user) {
                $user->notify(new sendDocumentObserveNotification($this->subject, $response));
            } else {
                Mail::to($this->document->email)
                    ->send(new SendDocumentObserve($this->subject, $response));
            }
            session()->flash('message', 'Respuesta enviado con exitó');
            return redirect()->to('/dashboard');
        }

    }

    public function render()
    {
        return view('livewire.responses.answer-document-form');
    }
}
