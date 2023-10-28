<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class PostsList extends Component
{
    use WithPagination;

    public $search;
    public $sort = 'id';
    public $direction = 'desc';
    protected $listeners = ['render']; // la clave se refiere al evento que se ha emitido desde createPost y el valor es método que quiero que se ejecute, en este caso el método render. Si el envento se llama igual que el método ['render' => 'render'] simplemente pordría dejar ['render']

    public function render()
    {
        $posts = Post::where('title', 'like', '%'.$this->search.'%')
                    ->orWhere('content', 'like', '%'.$this->search.'%')
                    ->orderBy($this->sort, $this->direction)
                    ->paginate(5);

        return view('livewire.posts-list', compact('posts'));
    }

    public function orderList($sort)
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

    // este método pertenece a los hooks de livewire. En este caso para resetear la página
    public function updatingSearch()
    {
        $this->resetPage();
    }
}
