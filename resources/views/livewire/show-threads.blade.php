<div class="flex max-w-7xl mx-auto gap-3 lg:gap-6">
    <div class="w-52">
        <x-button-link href="{{ route('threads.create') }}" class="mb-3 py-4 border border-gray-100 px-6">
            Preguntar
        </x-button-link>
        <ul>
            @foreach ( $categories as $category )
                <li class="mb-1">
                    <a href="#" wire:click.prevent="filterByCategory('{{ $category->id }}')" class="p-2 rounded-md flex bg-gradient-to-b from-gray-200 hover:-translate-y-1.5 hover:from-gray-300 items-center gap-2 text-black/60 hover:text-black font-semibold text-xs capitalize transition ease-in-out duration-200">
                        <span class="w-2 h-2 rounded-full" style="background-color: {{ $category->color }};"></span>
                        {{ $category->name }}
                    </a>
                </li>
            @endforeach
            <li>
                <a href="#" wire:click.prevent="filterByCategory('')" class="p-2 rounded-md flex bg-gray-200 items-center gap-2 text-black/60 hover:text-black font-semibold text-xs capitalize">
                    <span class="w-2 h-2 rounded-full" style="background-color: #000;"></span>
                    todos los resultados
                </a>
            </li>
        </ul>
    </div>
    <div class="w-full">
        <form class="mb-4">
            <input
                type="text" 
                placeholder="Busca en el foro" 
                class="w-full bg-gray-200 border border-gray-300 rounded-md p-4 text-black/60 text-xs"
                wire:model="search"
            >
        </form>

        @foreach ( $threads as $thread)
        <div class="rounded-md border border-gray-300 bg-gray-200 hover:bg-gradient-to-b hover:from-gray-300 hover:to-gray-200 mb-4">
            <div class="w-full flex flex-col sm:flex-row gap-6 p-6">
                <div>
                    <img src="{{ $thread->user->avatar() }}" alt="{{ $thread->user->name }}" class="rounded-full object-cover h-20 w-20">
                </div>
                <div class="flex-1">
                    <h2 class="flex mb-4 items-start justify-between">
                        <a href="{{ route('thread', $thread ) }}" class="text-md font-semibold text-slate-600 hover:text-black">
                            {{ $thread->title }}
                        </a>
                        <span class="rounded-full text-xs py-2 px-4 capitalize" style="color: {{ $thread->forumCategory->color }}; border: solid {{ $thread->forumCategory->color }};">
                            {{ $thread->forumCategory->name }}
                        </span>
                    </h2>
                    <p class="flex items-center justify-between w-full text-xs">
                        <span class="text-cyan-600 font-semibold">
                            {{ $thread->user->name }}
                            <span class="text-black-90">{{ $thread->created_at->diffForHumans() }}</span>
                        </span>
                        <span class="flex items-center gap-1 text-slate-700 capitalize">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                <path fill-rule="evenodd" d="M5.337 21.718a6.707 6.707 0 01-.533-.074.75.75 0 01-.44-1.223 3.73 3.73 0 00.814-1.686c.023-.115-.022-.317-.254-.543C3.274 16.587 2.25 14.41 2.25 12c0-5.03 4.428-9 9.75-9s9.75 3.97 9.75 9c0 5.03-4.428 9-9.75 9-.833 0-1.643-.097-2.417-.279a6.721 6.721 0 01-4.246.997z" clip-rule="evenodd" />
                            </svg>
                            
                            {{ $thread->replies_count }}
                            Respuesta{{ $thread->replies_count !== 1 ? 's' : ''  }}
                            @can('update', $thread)
                            |
                            <a href="{{ route('threads.edit', $thread) }}" class="hover:text-black hover:font-bold">Editar</a>
                            @endcan
                        </span>
                    </p>
                </div>
            </div>
        </div>
        @endforeach
        <div>
            {{ $threads->links() }}
        </div>
    </div>
</div>
    