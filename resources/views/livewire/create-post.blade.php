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
                <x-label value="título del post"/>
                <x-input wire:model.defer="title" type="text" class="w-full"/> 
                <x-input-error for="title" />
            </div>
            <div class="mb-4">
                <x-label value="Contenido del post"/>
                <x-input wire:model.defer="content" type="text" class="w-full"/> <!-- el defer evita que se actualice la variable content mientras el usuario escribe-->
                <x-input-error for="content" />
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-secondary-button wire:click="$set('open', false)">
                Cancelar
            </x-secondary-button>
            <x-danger-button wire:click="save">
                Crear
            </x-danger-button>
        </x-slot>
    </x-dialog-modal>
</div>
