<?php

namespace App\Http\Livewire;

use App\Models\ForumCategory;
use Livewire\Component;

class ShowThreads extends Component
{
    public function render()
    {
        $categories = ForumCategory::get();
        return view('livewire.show-threads', [
            'categories' => $categories,
        ]);
    }
}
