<?php

namespace App\Http\Livewire\Buyer;

use App\Models\Product;
use Livewire\Component;

class MenList extends Component
{
    public $search;

    public function render()
    {
        $query = Product::where('category_id', 1)
            ->orderByDesc('id');

        if ($this->search) {
            $query->where('name', 'like', '%' . $this->search . '%');
        }

        $products = $query->get();

        return view('livewire.buyer.men-list', compact('products'));
    }
}
