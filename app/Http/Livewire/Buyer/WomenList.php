<?php

namespace App\Http\Livewire\Buyer;

use App\Models\Product;
use Livewire\Component;

class WomenList extends Component
{
    public $search;

    public function render()
    {
        $query = Product::where('category_id', 2)
            ->orderByDesc('id');

        if ($this->search) {
            $query->where('name', 'like', '%' . $this->search . '%');
        }

        $products = $query->get();

        return view('livewire.buyer.women-list', compact('products'));
    }
}
