<div>
    <x-button wire:click="$set('open', true)">
        Crear nuevo post
    </x-button>

    <x-dialog-modal wire:model="open">
        <x-slot name="title">
            Crear nuevo post
        </x-slot>
        <x-slot name="content">
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
        </x-slot>
        <x-slot name="footer">
            <x-secondary-button wire:click="$set('open', false)">
                Cancelar
            </x-secondary-button>
            <x-danger-button wire:click="save" wire:loading.attr="disabled" wire:target="save" class="disabled:opacity-25"> 
                <!-- wire:loading.attr cambia el atributo, en este caso deshabilita el botón hasta que se complete el fomulario--> 
                Crear
            </x-danger-button>
        </x-slot>
    </x-dialog-modal>
</div>
