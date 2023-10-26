<div>
    <x-button wire:click="$set('open', true)">
        Crear nuevo post
    </x-button>

    <x-dialog-modal wire:model="open">
        <x-slot name="title">
            Crear nuevo post
        </x-slot>
        <x-slot name="content">
            <div wire:loading wire:target="image" class="flex flex-col items-center justify-center mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-4 rounded relative">
                <strong class="font-bold">Tu imagen está cargando.</strong>
                <span class="block sm:inline">Espera un momento por favor</span>
            </div>
            @if ($image)
                <img class="mb-4" src="{{ $image->temporaryUrl() }}" alt="imagen del post">
            @endif
            <div class="mb-4">
                <x-label value="título del post" />
                <x-input wire:model="title" type="text" class="w-full" />
                <x-input-error for="title" />
            </div>
            <div class="mb-4">
                <x-label value="Contenido del post" />
                <x-input wire:model="content" type="text" class="w-full" />
                <x-input-error for="content" />
            </div>
            <div>
                <input type="file" wire:model="image"/>
                <x-input-error for="image" />
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-secondary-button wire:click="$set('open', false)">
                Cancelar
            </x-secondary-button>
            <x-danger-button wire:click="save" wire:loading.attr="disabled" wire:target="save, image" class="disabled:opacity-25"> 
                <!-- wire:loading.attr cambia el atributo, en este caso deshabilita el botón hasta que se complete el fomulario--> 
                Crear
            </x-danger-button>
        </x-slot>
    </x-dialog-modal>
</div>
