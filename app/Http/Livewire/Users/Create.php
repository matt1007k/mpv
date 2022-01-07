<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Create extends Component
{
    public $name;
    public $doc_type;
    public $doc_number;
    public $email;
    public $password;
    public $role = 'user';

    public function validateData()
    {
        $this->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users,email',
            'doc_type' => 'required|string',
            'doc_number' => ['required', 'numeric', $this->doc_type === 'dni' ? 'digits:8' : 'digits:10', 'unique:users,doc_number'],
            'password' => 'required',
            'role' => 'required',
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
            'password' => Hash::make($this->password),
            'role' => $this->role,
        );

        User::create($values);
        $this->reset();
        session()->flash('message', 'Usuario registrado con éxito');
        return redirect()->to('/admin/users');

    }

    public function cancel()
    {
        return redirect()->to('/admin/users');
    }

    public function render()
    {
        return view('livewire.users.create');
    }
}
