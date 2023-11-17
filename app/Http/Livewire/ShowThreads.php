<?php

namespace App\Http\Livewire;

use App\Models\ForumCategory;
use App\Models\Thread;
use Livewire\Component;

class ShowThreads extends Component
{
    public $search = '';
    
    public function render()
    {
        $categories = ForumCategory::get();
        $threads = Thread::query();
        $threads->where('title', 'like', '%'.$this->search.'%');
        $threads->withCount('replies');
        $threads->latest();

        return view('livewire.show-threads', [
            'categories' => $categories,
            'threads' => $threads->get(),
        ]);
    }
}
