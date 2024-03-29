<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreatePost extends Component
{
    use WithFileUploads;

    public $open = false;
    public $title;
    public $content;
    public $image;

    protected $rules = [
        'title' => 'required|string|min:3|max:100',
        'content' => 'required|min:5|max:10000',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ];

    public function render()
    {
        return view('livewire.create-post');
    }

    public function save()
    {
        $this->validate();

        $image = $this->image->store('images/posts');

        Post::create([
            'title' => $this->title,
            'content' => $this->content,
            'image' => $image,
        ]);

        $this->resetForm();
        $this->emitTo('posts-list', 'render'); // usando emitTo logro que solo sea el componente PostsList el que escuche el evento
        $this->emit('alert', 'Se ha creado el post');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    private function resetForm()
    {
        $this->open = false;
        $this->title = '';
        $this->content = '';
        $this->image = '';
    }
}
