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

    public function mount(User $user)
    {
        $this->user = $user;
    }

    public function save()
    {
        $this->validate($this->rules());

        if ($this->image) {
            Storage::delete([$this->user->avatar()]);
            $this->user->profile_photo_path = $this->image->store('public/profile-photos');
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

    public function render(): View
    {
        return view('livewire.users.edit-user');
    }

    public function rules(): array
    {
        return [
            'user.name' => 'required|string|min:5|max:255',
            'user.email' => 'required|email|unique:users,email,' . $this->user->id,
            'user.phone' => 'nullable|string|unique:users,phone,' . $this->user->id,
            'user.birthday' => 'required|date_format:Y-m-d',
            'user.city' => 'nullable|string|max:85',
            'user.country' => 'nullable|string|max:60',
            'image' => 'nullable|mimes:jpeg,jpg,png,gif|max:2048',
        ];
    }
}
