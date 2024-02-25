<?php

namespace App\Http\Livewire\Products;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditProduct extends Component
{
    use WithFileUploads;

    public $open = false;
    public $image;
    public $product;

    protected $rules = [
        'product.name' => 'required|min:3|max:70',
        'product.description' => 'required|min:5|max:2000',
        'product.price' => 'required|integer|min:10000|digits_between: 4,8',
        'product.stock' => 'required|integer|min:1|max:100|',
        'product.category_id' => 'required',
        'product.status' => 'required',
        'image' => 'nullable|image|max:2048|mimes:jpg,jpeg,png',
    ];

    protected $validationAttributes = [
        'price' => 'precio',
        'name' => 'nombre',
        'description' => 'descripción',
        'stock' => 'Stock',
        'category_id' => 'categoría',
        'status' => 'estado',
        'image' => 'imagen',
    ];

    public function mount(Product $product)
    {
        $this->product = $product;
    }

    public function save()
    {
        $this->validate();

        if ($this->image) {
            Storage::disk('public')->delete($this->product->image);
            $this->product->image = $this->image->store('images/products');
        }

        $this->product->save();

        $this->resetForm();
        $this->emitTo('products.products-list', 'render');
        $this->emit('alert', 'El producto se ha actualizado con éxito');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    private function resetForm()
    {
        $this->reset([
            'open',
            'image',
        ]);
    }

    public function render()
    {
        $categories = Category::all();

        return view('livewire.products.edit-product', compact('categories'));
    }
}
