<div>
    <div class="rounded-md border border-gray-300 bg-gray-200 hover:bg-gradient-to-b hover:from-gray-300 hover:to-gray-200 mb-4">
        <div class="flex p-4 gap-4">
            <div class="flex h-20 w-20 items-center justify-center">
                <img src="{{ $reply->user->avatar() }}" alt="{{ $reply->user->name }}" class="rounded-full object-cover">
            </div>
            <div class="w-full">
                <p class="text-cyan-500 mb-2 font-semibold text-xs">
                    {{ $reply->user->name }}
                </p>

                @if ($isEditing)
                    <form wire:submit.prevent="updateReply" class="mt-4">
                        <input 
                            type="text" 
                            placeholder="Escribe una respuesta" 
                            class="bg-gray-200 border border-gray-300 rounded-md w-full p-3 text-slate/60 text-xs"
                            wire:model.defer="body"
                        >
                    </form>
                @else
                    <p class="text-slate/60 text-xs">{{ $reply->body }}</p>
                @endif


                @if ($isCreating)
                    <form wire:submit.prevent="postChild" class="mt-4">
                        <input 
                            type="text" 
                            placeholder="Escribe una respuesta" 
                            class="bg-gray-200 border border-gray-300 rounded-md w-full p-3 text-slate/60 text-xs"
                            wire:model.defer="body"
                        >
                    </form>
                @endif

                <p class="mt-4 text-gray-500 text-xs flex gap-2 justify-end">
                    @if (is_null($reply->reply_id))
                        <a href="#" wire:click.prevent="$toggle('isCreating')" class="hover:text-black font-bold">Responder</a>
                    @endif

                    @can('update', $reply)
                        <a href="#" wire:click.prevent="$toggle('isEditing')" class="hover:text-black font-bold">Editar</a>
                    @endcan
                </p>
            </div>
        </div>
    </div>
    @foreach ( $reply->replies as $item )
        <div class="ml-8">
            @livewire('show-reply', ['reply' => $item], key('reply-'. $item->id))
        </div>
    @endforeach
</div>
