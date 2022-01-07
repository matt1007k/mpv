<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UserList extends Component
{
    use WithPagination;

    public $search = '';
    public $orderBy = 'asc';

    protected $listeners = ['onSearch', 'onSortBy', 'delete'];

    public function onSearch(string $value)
    {
        $this->search = $value;
    }

    public function onSortBy(string $sortBy = 'desc')
    {
        $this->orderBy = $sortBy;
    }

    public function delete(int $userId)
    {
        User::find($userId)->delete();
        session()->flash('message', 'Usuario eliminado con exitó');
        return redirect()->to('/admin/users');
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.users.user-list', [
            'users' => User::search($this->search)->orderBy('created_at', $this->orderBy)->paginate(15),
        ]);
    }
}
