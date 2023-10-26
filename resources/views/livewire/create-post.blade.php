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
            <x-danger-button wire:click="save" wire:loading.remove wire:target="save"> 
                <!-- wire:loading.remove hace que se oculte este botón pero solo cuando se ejecute el método save--> 
                Crear
            </x-danger-button>
            <span class="ml-3" wire:loading wire:target="save">Cargando...</span>
            <!-- wire:loading muestra el texto "cargando..." mientras la petición es recibida del servidor -->
            <!-- wiretarget="save" hace que se muestre el mensaje cuando se ejectute el método save -->
        </x-slot>
    </x-dialog-modal>
</div>
