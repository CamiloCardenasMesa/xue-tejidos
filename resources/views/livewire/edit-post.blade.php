<div>
    <div class="p-3 inline-flex bg-gray-200 rounded-lg cursor-pointer" wire:click="$set('open', true)">
        <x-edit-icon />
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
