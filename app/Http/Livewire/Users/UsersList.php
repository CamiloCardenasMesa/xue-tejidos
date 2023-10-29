<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class UsersList extends Component
{
    use WithFileUploads;
    use WithPagination;

    public $search;
    public $sort = 'id';
    public $direction = 'desc';
    protected $listeners = ['render'];
    public $image;

    protected $rules = [
        'image' => 'image:2048',
    ];

    public function render()
    {
        $users = User::where('name', 'like', '%'.$this->search.'%')
        ->orWhere('email', 'like', '%'.$this->search.'%')
        ->orderBy($this->sort, $this->direction)
        ->paginate(5);

        return view('livewire.users.users-list', compact('users'));
    }

    public function order($sort)
    {
        if ($this->sort === $sort) {
            if ($this->direction === 'desc') {
                $this->direction = 'asc';
            } else {
                $this->direction = 'desc';
            }
        } else {
            $this->sort = $sort;
            $this->direction = 'asc';
        }
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
}
