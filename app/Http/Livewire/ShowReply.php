<?php

namespace App\Http\Livewire;

use App\Models\Reply;
use Livewire\Component;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ShowReply extends Component
{
    use AuthorizesRequests;

    public Reply $reply;
    public $body = '';
    public $isCreating = false;
    public $isEditing = false;

    protected $listeners = ['refresh' => '$refresh'];

    public function updatedIsCreating()
    {
        $this->isEditing = false;
        $this->body = '';
    }

    public function updatedIsEditing()
    {
        $this->authorize('update', $this->reply);
        $this->isCreating = false;
        $this->body = $this->reply->body;
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

    public function updateReply()
    {
        $this->authorize('update', $this->reply);

        $this->validate([
            'body' => 'required'
        ]);
        
        // update
        $this->reply->update(['body' => $this->body]);

        //refrescar
        $this->isEditing = false; //cambiar el estado de la variable
    }

    public function render()
    {
        return view('livewire.show-reply');
    }
}
