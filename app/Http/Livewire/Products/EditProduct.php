<?php

namespace App\Http\Livewire\Products;

use Livewire\Component;

class EditProduct extends Component
{
    public $open = false;
    public $title = 'título';
    public $content = 'contenido';
    public $footer = 'botones';

    public function render()
    {
        return view('livewire.products.edit-product');
    }
}
