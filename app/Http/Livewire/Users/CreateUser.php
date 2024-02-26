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
    public $confirmPassword;
    public $birthday;
    public $phone;
    public $city;
    public $country;
    public $image;
    public $imageId;

    protected $rules = [
        'name' => 'required|string|min:3|max:70',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:8',
        'confirmPassword' => 'required|same:password',
        'birthday' => 'nullable|date_format:Y-m-d',
        'phone' => 'nullable|string|min:7|max:30',
        'city' => 'nullable|string|min:3|max:50',
        'country' => 'nullable|string|min:3|max:56',
        'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ];

    public function mount()
    {
        $this->imageId = rand();
    }

    public function save()
    {
        $this->validate();

        $this->createUser();

        $this->resetForm();
        $this->imageId = rand();
        $this->emitTo('users.users-list', 'render');
        $this->emit('alert', trans('users.flash_message.successfully_created'));
    }

    protected function createUser()
    {
        $userData = [
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt($this->password),
            'birthday' => $this->birthday,
            'phone' => $this->phone,
            'city' => $this->city,
            'country' => $this->country,
            'profile_photo_path' => $this->uploadImage(),
        ];

        return User::create($userData);
    }

    protected function uploadImage()
    {
        if ($this->image) {
            return $this->image->store('images/profile-photos');
        }

        return null;
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    private function resetForm()
    {
        $this->reset([
            'open',
            'name',
            'email',
            'password',
            'confirmPassword',
            'birthday',
            'phone',
            'password',
            'city',
            'country',
        ]);
    }

    public function render()
    {
        return view('livewire.users.create-user');
    }
}
