<?php

namespace App\Http\Livewire\Practices;

use Livewire\Component;

class PracticeOne extends Component
{


    public function mount()
    {
        
        $this->fill(['mensaje2' => 'hola gatica']);
    }

    public function render()
    {
        return view('livewire.practices.practice-one');
    }
}
