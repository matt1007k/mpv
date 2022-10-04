<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Livewire\Component;

class Edit extends Component
{
    public $userId;
    public $name;
    public $doc_type;
    public $doc_number;
    public $email;
    public $password;
    public $role = 'citizen';

    public function mount(User $user)
    {
        $this->userId = $user->id;
        $this->name = $user->name;
        $this->doc_type = $user->doc_type;
        $this->doc_number = $user->doc_number;
        $this->email = $user->email;
        $this->role = $user->role;
    }

    public function validateData()
    {
        $this->validate([
            'name' => 'required|string',
            'email' => ['required', 'string', 'email', Rule::unique('users', 'email')->ignore($this->userId)],
            'doc_type' => 'required|string',
            'doc_number' => ['required', 'numeric', $this->doc_type === 'dni' ? 'digits:8' : 'digits:10', Rule::unique('users', 'doc_number')->ignore($this->userId)],
            'role' => 'required|in:admin,user',
        ]);
    }

    public function register()
    {
        $this->validateData();
        $values = array(
            'name' => $this->name,
            'email' => $this->email,
            'doc_type' => $this->doc_type,
            'doc_number' => $this->doc_number,
            'role' => $this->role,
        );
        if ($this->password != null) {
            $values['password'] = Hash::make($this->password);
        }

        User::findOrFail($this->userId)->update($values);
        $this->reset();
        session()->flash('message', 'Usuario editado con éxito');
        return redirect()->to('/admin/users');

    }

    public function cancel()
    {
        return redirect()->to('/admin/users');
    }

    public function render()
    {
        return view('livewire.users.edit');
    }
}
