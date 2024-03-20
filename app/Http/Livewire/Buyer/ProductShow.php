<?php

namespace App\Http\Livewire\Buyer;

use App\Models\Product;
use Livewire\Component;

class ProductShow extends Component
{
    public Product $product;
    public $open = false;

    public function toggleDropdown()
    {
        $this->open = !$this->open;
    }
    
    public function render()
    {
        return view('livewire.buyer.product-show')->layout('layouts.guest');
    }

}
