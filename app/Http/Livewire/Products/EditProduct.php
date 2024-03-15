<?php

namespace App\Http\Livewire\Products;

use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditProduct extends Component
{
    use WithFileUploads;

    public $open = false;
    public $images = [];
    public $product;
    public $selectedColors = [];

    protected $rules = [
        'product.name' => 'required|min:3|max:70',
        'product.description' => 'required|min:5|max:2000',
        'product.price' => 'required|integer|min:10000|digits_between: 4,8',
        'product.stock' => 'required|integer|min:1|max:100|',
        'product.category_id' => 'required',
        'product.status' => 'required',
        'selectedColors' => 'required',
        'images.*' => 'nullable|image|max:2048|mimes:jpg,jpeg,png',
    ];

    protected $validationAttributes = [
        'price' => 'precio',
        'name' => 'nombre',
        'description' => 'descripción',
        'stock' => 'Stock',
        'category_id' => 'categoría',
        'status' => 'estado',
        'images' => 'imágenes',
        'selectedColors' => 'Colores disponibles',
    ];

    public function mount(Product $product)
    {
        $this->product = $product;
        $this->selectedColors = $product->colors->pluck('id')->toArray();
    }

    public function save()
    {
        $this->validate();

        if ($this->images) {
            Storage::disk('public')->delete($this->product->images);
            foreach ($this->images as $image) {
                $imageName = time() . '-' . $image->getClientOriginalName();
                $imagePaths[] = $image->storeAs('images/products', $imageName, 'public');
            }
        }

        $this->saveSelectedColors($this->product->id); 
        $this->product->save();

        $this->resetForm();
        $this->emitTo('products.products-list', 'render');
        $this->emit('alert', trans('products.flash_message.successfully_updated'));
    }

    public function saveSelectedColors()
    {
        $this->product->colors()->sync($this->selectedColors);
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    private function resetForm()
    {
        $this->reset([
            'open',
            'images',
        ]);
    }

    public function render()
    {
        $categories = Category::all();
        $colors = Color::all();
        return view('livewire.products.edit-product', compact('categories', 'colors'));
    }
}
