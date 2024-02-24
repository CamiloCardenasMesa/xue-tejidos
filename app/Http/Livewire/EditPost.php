<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditPost extends Component
{
    use WithFileUploads;

    public $post;
    public $open = false;
    public $image;

    protected $rules = [
        'post.title' => 'required|string|min:3|max:100',
        'post.content' => 'required|min:5|max:10000',
        'image' => 'nullable|mimes:jpeg,jpg,png,gif|max:2048',
    ];

    public function mount(Post $post)
    {
        $this->post = $post;
    }

    public function save()
    {
        $this->validate();
        if ($this->image) {
            Storage::disk('public')->delete($this->post->image);
            $this->post->image = $this->image->store('images/posts');
        }

        $this->post->save();

        $this->resetForm();
        $this->emitTo('posts-list', 'render');
        $this->emit('alert', 'El post se ha actualizado con éxito');
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

    public function render()
    {
        return view('livewire.edit-post');
    }
}
