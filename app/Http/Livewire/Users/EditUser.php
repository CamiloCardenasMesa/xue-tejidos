<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditUser extends Component
{
    use WithFileUploads;

    public $user;
    public $open = false;
    public $image;

    public function rules(): array
    {
        return [
            'user.name' => 'required|string|min:3|max:255',
            'user.email' => 'required|email|unique:users,email,'.$this->user->id,
            'user.phone' => 'nullable|string|min:7|max:30|unique:users,phone,'.$this->user->id,
            'user.birthday' => 'nullable|date_format:Y-m-d',
            'user.city' => 'nullable|string|min:3|max:50',
            'user.country' => 'nullable|string|min:3|max:56',
            'user.address' => 'nullable|string|min:5|max:100',
        ];
    }

    public function mount(User $user)
    {
        $this->user = $user;
    }

    public function save()
    {
        $this->validate($this->rules());

        $this->user->save();

        $this->resetForm();
        $this->emitTo('users.users-list', 'render');
        $this->emit('alert', trans('users.flash_message.successfully_updated'));
    }

    private function resetForm()
    {
        $this->open = false;
        $this->image = '';
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function render(): View
    {
        return view('livewire.users.edit-user');
    }
}
