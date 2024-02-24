<?php

namespace App\Http\Livewire\Products;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateProduct extends Component
{
    use WithFileUploads;

    public $open = false;
    public $name;
    public $description;
    public $price;
    public $stock;
    public $enable = false;
    public $category_id;
    public $image;

    protected $rules = [
        'name' => 'required|min:3|max:70',
        'description' => 'required|min:5|max:2000',
        'price' => 'required|integer|digits_between: 4,10',
        'stock' => 'required|integer|min:1|max:100',
        'category_id' => 'required|integer',
        'enable' => 'nullable',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ];

    protected $validationAttributes = [
        'price' => 'precio',
        'name' => 'nombre',
        'description' => 'descripción',
        'stock' => 'Stock',
        'category_id' => 'categoría',
        'enable' => 'estado',
        'image' => 'imagen',
    ];

    public function save()
    {
        $this->validate();
        $this->createProduct();
        $this->resetForm();
        $this->emitTo('products.products-list', 'render');
        $this->emit('alert', 'Se ha creado el producto'); // esto es con el modal de sweetAlert
    }

    protected function createProduct()
    {
        $imageName = time().'-'.$this->image->getClientOriginalName();

        $productData = [
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'stock' => $this->stock,
            'enable' => $this->enable,
            'category_id' => $this->category_id,
            'image' => $this->image->storeAs('images/products', $imageName),
        ];

        return Product::create($productData);
    }

    private function resetForm()
    {
        $this->reset([
            'open',
            'name',
            'description',
            'price',
            'stock',
            'enable',
            'category_id',
            'image', // no se está reseteando la imagen
        ]);
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function render()
    {
        $categories = Category::all();

        return view('livewire.products.create-product', compact('categories'));
    }
}
