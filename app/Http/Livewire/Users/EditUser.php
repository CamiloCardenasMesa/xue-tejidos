<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use Illuminate\Support\Facades\Storage;
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
            'user.phone' => 'required|string|min:7|max:30|unique:users,phone,'.$this->user->id,
            'user.birthday' => 'nullable|date_format:Y-m-d',
            'user.city' => 'nullable|string|min:3|max:50',
            'user.country' => 'nullable|string|min:3|max:56',
            'image' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
        ];
    }

    public function mount(User $user)
    {
        $this->user = $user;
    }

    public function save()
    {
        $this->validate($this->rules());

        if ($this->image) {
            Storage::disk('public')->delete($this->user->profile_photo_path);
            $this->user->profile_photo_path = $this->image->store('images/profile-photos');
        }

        $this->user->save();

        $this->resetForm();
        $this->emitTo('users.users-list', 'render');
        $this->emit('alert', 'El usuario se ha actualizado con éxito');
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
