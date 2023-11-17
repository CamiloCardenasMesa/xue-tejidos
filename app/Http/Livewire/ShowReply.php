<?php

namespace App\Http\Livewire;

use App\Models\Reply;
use Livewire\Component;

class ShowReply extends Component
{
    public Reply $reply;
    public $body = '';
    public $isCreating = false;

    protected $listeners = ['refresh' => '$refresh'];

    public function render()
    {
        return view('livewire.show-reply');
    }

    public function postChild()
    {
        if (!is_null($this->reply->reply_id)) {
            return;
        } // revisa el nivel de jerarquía de la respuesta 

        $this->validate([
            'body' => 'required'
        ]); // valida que el campo no esté vacío
        
        // crear
        auth()->user()->replies()->create([
            'reply_id' => $this->reply->id,
            'thread_id' => $this->reply->thread->id,
            'body' => $this->body,
        ]);

        //refrescar
        $this->isCreating = false; //cambiar el estado de la variable
        $this->body = ''; // blanquear al body
        $this->emitSelf('refresh'); // refrescar al componente para visualizar las respuestas
    }
}
