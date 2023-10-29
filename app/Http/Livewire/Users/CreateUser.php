<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateUser extends Component
{
    use WithFileUploads;

    public $open = false;
    public $name;
    public $email;
    public $password;
    public $image;

    protected $rules = [
        'name' => 'required|min:5',
        'email' => 'required|email|unique:users,email',
        'password' => 'required',
        'image' => 'image:2048',
    ];

    public function render()
    {
        return view('livewire.users.create-user');
    }

    public function save()
    {
        $this->validate();

        $image = $this->image->store('users');

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
            'image' => $image,
        ]);

        $this->resetForm();
        $this->emitTo('users-list', 'render');
        $this->emit('alert', 'Se ha creado el usuario');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    private function resetForm()
    {
        $this->open = false;
        $this->name = '';
        $this->email = '';
        $this->password = '';
        $this->image = '';
    }
}
