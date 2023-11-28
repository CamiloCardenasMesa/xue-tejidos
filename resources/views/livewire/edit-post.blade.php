<div>
    <div class="p-3 inline-flex bg-gray-200 rounded-lg cursor-pointer" wire:click="$set('open', true)">
        <a>
            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                <path d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4 24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152V424c0 48.6 39.4 88 88 88H360c48.6 0 88-39.4 88-88V312c0-13.3-10.7-24-24-24s-24 10.7-24 24V424c0 22.1-17.9 40-40 40H88c-22.1 0-40-17.9-40-40V152c0-22.1 17.9-40 40-40H200c13.3 0 24-10.7 24-24s-10.7-24-24-24H88z"/>
            </svg>
        </a>
    </div>

    <x-dialog-modal wire:model="open">
        <x-slot name="title">
            Editar el Post
        </x-slot>
        <x-slot name="content">
            <div wire:loading wire:target="image"
                class="flex flex-col items-center justify-center mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-4 rounded relative">
                <strong class="font-bold">Tu imagen está cargando.</strong>
                <span class="block sm:inline">Espera un momento por favor</span>
            </div>

            @if ($image)
                <img class="mb-4" src="{{ $image->temporaryUrl() }}" alt="imagen del post">
                @else
                <img class="mb-4" src="{{ Storage::url($post->image) }}" alt="imagen anterior del post">
            @endif

            <div class="mb-4">
                <x-label value="Título del post" />
                <x-input wire:model="post.title" type="text" class="w-full" />
                <x-input-error for="post.title" />
            </div>

            <div class="mb-4">
                <x-label value="Contenido del post" />
                <textarea wire:model="post.content" rows="6" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full">
                </textarea>
                <x-input-error for="post.content" />
            </div>
            
            <div>
                <input type="file" wire:model="image" />
                <x-input-error for="image" />
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-secondary-button wire:click="$set('open', false)">
                Cancelar
            </x-secondary-button>
            <x-danger-button wire:click="save" wire:loading.attr="disabled" wire:target="save, image" class="disabled:opacity-25"> 
                Actualizar
            </x-danger-button>
        </x-slot>
    </x-dialog-modal>
</div>
