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
        'post.title' => 'required',
        'post.content' => 'required',
    ];

    public function mount(Post $post)
    {
        $this->post = $post;
    }

    public function save()
    {
        $this->validate();

        if ($this->image) {
            Storage::delete([$this->post->image]);
            $this->post->image = $this->image->store('public/posts');
        }

        $this->post->save();

        $this->resetForm();
        $this->emitTo('show-posts', 'render');
        $this->emit('alert', 'El post se ha actualizado con éxito');
    }

    public function render()
    {
        return view('livewire.edit-post');
    }

    private function resetForm()
    {
        $this->open = false;
        $this->image = '';
    }
}
