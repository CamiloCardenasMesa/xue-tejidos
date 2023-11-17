<?php

namespace App\Http\Livewire;

use App\Models\ForumCategory;
use App\Models\Thread;
use Livewire\Component;

class ShowThreads extends Component
{
    public function render()
    {
        $categories = ForumCategory::get();
        $threads = Thread::latest()->get();

        return view('livewire.show-threads', [
            'categories' => $categories,
            'threads' => $threads,
        ]);
    }
}
