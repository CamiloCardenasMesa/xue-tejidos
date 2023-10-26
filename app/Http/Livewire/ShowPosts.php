<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class ShowPosts extends Component
{
    public $search;
    public $sort = 'id';
    public $direction = 'desc';
    protected $listeners = ['showInTable' => 'render']; // la clave se refiere al evento que se ha emitido desde createPost y el valor es método que quiero que se ejecute, en este caso el método render. Si el envento se llama igual que el método ['render' => 'render'] simplemente pordría dejar ['render']

    public function render()
    {
        $posts = Post::where('title', 'like', '%'.$this->search.'%')
                    ->orWhere('content', 'like', '%'.$this->search.'%')
                    ->orderBy($this->sort, $this->direction)
                    ->get();

        return view('livewire.show-posts', compact('posts'));
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
}
