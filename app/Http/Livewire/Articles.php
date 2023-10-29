<?php

namespace App\Http\Livewire;

use App\Models\Article;
use Livewire\Component;

class Articles extends Component
{
    public $search;
    public $otraCosa;

    public function render()
    {
        $articles = Article::where('title', 'like', '%'.$this->search.'%')->get();

        return view('livewire.articles', compact('articles'));
    }
}
