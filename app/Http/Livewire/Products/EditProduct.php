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
    public $confirmingImageDeletion = false;
    public $imageToDeleteIndex;

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
            $imagePaths = [];
            foreach ($this->images as $image) {
                $imageName = time() . '-' . $image->getClientOriginalName();
                $imagePaths[] = $image->storeAs('images/products', $imageName, 'public');
            }
            $this->product->images = array_merge($this->product->images ?? [], $imagePaths);
        }

        $this->saveSelectedColors();
        $this->product->save();

        $this->resetForm();
        $this->emitTo('products.products-list', 'render');
        $this->emit('alert', trans('products.flash_message.successfully_updated'));
    }

    public function deleteImage($index)
    {
        $this->confirmingImageDeletion = true;
        $this->imageToDeleteIndex = $index;
    }
    
    public function confirmImageDeletion()
    {
        // Obtener la ruta de la imagen a eliminar
        $imagePath = $this->product->images[$this->imageToDeleteIndex];
    
        // Eliminar la imagen del sistema de archivos
        Storage::disk('public')->delete($imagePath);
    
        // Crear un nuevo array de imágenes excluyendo la imagen que se eliminará
        $images = collect($this->product->images)->except($this->imageToDeleteIndex)->values()->all();
    
        // Asignar el nuevo array de imágenes al producto
        $this->product->images = $images;
    
        // Guardar los cambios en la base de datos
        $this->product->save();
    
        // Reiniciar las variables de estado
        $this->confirmingImageDeletion = false;
        $this->imageToDeleteIndex = null;
    }
    
    public function cancelImageDeletion()
    {
        $this->confirmingImageDeletion = false;
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
