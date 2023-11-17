<?php

namespace App\Http\Livewire;

use App\Models\Thread;
use Livewire\Component;

class ShowThread extends Component
{
    public Thread $thread; //esta variable tiene que ser de la entidad Thread para hacer la consulta implícita

    public function render()
    {
        return view('livewire.show-thread');
    }
}
