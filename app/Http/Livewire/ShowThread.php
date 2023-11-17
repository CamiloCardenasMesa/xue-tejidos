<?php

namespace App\Http\Livewire;

use App\Models\Thread;
use Livewire\Component;

class ShowThread extends Component
{
    public Thread $thread; //esta variable tiene que ser de la entidad Thread para hacer la consulta implícita
    public $body;

    public function render()
    {
        return view('livewire.show-thread', [
            'replies' => $this->thread
                ->replies()
                ->whereNull('reply_id')
                ->get()
        ]);
    }

    public function postReply()
    {
        $this->validate([
            'body' => 'required'
        ]);
        
        auth()->user()->replies()->create([
            'thread_id' => $this->thread->id,
            'body' => $this->body,
        ]);

        $this->body = '';
    }
}
