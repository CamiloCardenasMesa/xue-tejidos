<?php

namespace App\Http\Livewire\Products;

use App\Models\Product;
use Illuminate\Support\Facades\Storage;
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
    protected $listeners = ['render',  'destroy', 'deleteProduct'];
    public $errorMessage;
    public $image;

    protected $rules = [
        'image' => 'image:2048',
    ];

    public function render()
    {
        $products = Product::with('category')->where('name', 'like', '%'.$this->search.'%')
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

    public function destroy(Product $product)
    {
        $this->dispatchBrowserEvent('delete', ['productId' => $product->id]);
    }

    public function deleteProduct(Product $product)
    {
        Storage::delete($product->image);
        $product->delete();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
}
