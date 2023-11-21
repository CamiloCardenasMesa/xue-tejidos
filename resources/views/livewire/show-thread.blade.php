<div class="max-w-4xl mx-auto px-0 lg:px-4">
    {{-- pregunta --}}
    <div class="rounded-md border border-gray-300 bg-gray-200 mb-4">
        <div class="w-full flex flex-col sm:flex-row gap-6 p-6">
            <div>
                <img src="{{ $thread->user->avatar() }}" alt="{{ $thread->user->name }}" class="rounded-full object-cover h-20 w-20">
            </div>
            <div class="flex-1">
                <h2 class="flex items-start justify-between gap-1">
                    <a href="{{ route('thread', $thread ) }}" class="lg:text-lg text-md font-semibold text-slate-600 hover:text-black">
                        {{ $thread->title }}
                    </a>
                    <span class="rounded-full text-xs lg:py-2 lg:px-2 py-1 px-2 capitalize" style="color: {{ $thread->forumCategory->color }}; border: solid {{ $thread->forumCategory->color }};">
                        {{ $thread->forumCategory->name }}
                    </span>
                </h2>
                <div>
                    <p class="text-xs font-semibold text-cyan-500 mb-4">
                        {{ $thread->user->name }}
                        <span class="text-slate/90">{{ $thread->created_at->diffForHumans() }}</span>
                    </p>
                    <p class="text-slate/60 text-sm">
                        {{ $thread->body }}
                    </p>
                </div>
            </div>
        </div> 
    </div>
    {{-- respuestas --}}
    @foreach ( $replies as $reply )
        @livewire('show-reply', ['reply' => $reply], key('reply-'. $reply->id))
    @endforeach

    {{-- formulario de creación de respuestas --}}
    <form wire:submit.prevent="postReply">
        <input 
            type="text" 
            placeholder="Escribe una respuesta" 
            class="bg-gray-200 border border-gray-300 rounded-md w-full p-3 text-slate/60 text-xs"
            wire:model.defer="body"
        >
    </form>
</div>
