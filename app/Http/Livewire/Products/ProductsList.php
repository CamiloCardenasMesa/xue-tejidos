<?php

namespace App\Http\Livewire\Products;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class ProductsList extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $search;
    public $sort = 'id';
    public $direction = 'desc';
    protected $listeners = ['render'];
    public $errorMessage;
    public $image;

    public function render()
    {
        $products = Product::where('name', 'like', '%'.$this->search.'%')
            ->orderBy($this->sort, $this->direction)
            ->paginate(10);
        
        return view('livewire.products.products-list', compact('products'));
    }

    public function order($sort)
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
}
