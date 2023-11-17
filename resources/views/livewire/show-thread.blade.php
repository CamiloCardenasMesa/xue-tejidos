<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="rounded-md bg-gradient-to-r from-slate-800 to-slate-900 mb-4">
        <div class="p-4 flex gap-4">
            <div>
                <img src="{{ $thread->user->avatar() }}" alt="{{ $thread->user->name }}" class="rounded-md object-cover">
            </div>
            <div class="w-full">
                <h2 class="flex mb-4 items-start justify-between">
                    <a href="{{ route('thread', $thread ) }}" class="text-xl font-semibold text-white/90">
                        {{ $thread->title }}
                    </a>
                    <span 
                        class="rounded-full text-xs py-2 px-4 capitalize" 
                        style="color: {{ $thread->forumCategory->color }}; border: solid {{ $thread->forumCategory->color }};"
                    >
                        {{ $thread->forumCategory->name }}
                    </span>
                </h2>
                <p class="text-blue-600 font-semibold w-full text-xs">
                    {{ $thread->user->name }}
                    <span class="text-white/90">{{ $thread->created_at->diffForHumans() }}</span>
                </p>
                <p class="text-white/60">
                    {{ $thread->body }}
                </p>
            </div>
        </div>
    </div>
    {{-- respuestas --}}
    {{-- formulario de creación de respuestas --}}
    <form wire:submit.prevent="postReply">
        <input 
            type="text" 
            placeholder="Escribe una respuesta" 
            class="bg-slate-800 border-0 rounded-md w-full p-3 text-white/60 text-xs"
            wire:model.defer="body"
        >
    </form>
</div>
