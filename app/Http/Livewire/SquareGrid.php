<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SquareGrid extends Component
{
    public $squares = [];

    public function mount()
    {
        // Inicializar los cuadrados
        $this->squares = array_fill(0, 36, ['clicked' => false]);
    }

    public function toggleColor($index)
    {
        // Cambiar el color y estado de click
        $this->squares[$index]['clicked'] = !$this->squares[$index]['clicked'];
    }

    public function render()
    {
        return view('livewire.square-grid');
    }
}
