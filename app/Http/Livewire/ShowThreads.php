<?php

namespace App\Http\Livewire;

use App\Models\ForumCategory;
use App\Models\Thread;
use Livewire\Component;

class ShowThreads extends Component
{
    public $search = '';
    public $category = '';

    public function render()
    {
        $categories = ForumCategory::get();
        $threads = Thread::query();
        $threads->where('title', 'like', '%' . $this->search . '%');

        if ($this->category) {
            $threads->where('forum_category_id', $this->category);
        }

        $threads->with('user', 'forumCategory');
        $threads->withCount('replies');
        $threads->latest();

        $threads = $threads->paginate(10);

        return view('livewire.show-threads', [
            'categories' => $categories,
            'threads' => $threads,
        ]);
    }

    public function filterByCategory($category)
    {
        $this->category = $category;
    }
}
