<div>
    <div class="p-3 bg-gray-200 rounded-lg cursor-pointer" wire:click="$set('open', true)">
        <x-edit-icon />
    </div>

    <x-dialog-modal wire:model="open">
        <x-slot name="title">
            Editar producto
        </x-slot>

        <x-slot name="content">
            contenido   
        </x-slot>

        <x-slot name="footer">
            botones
        </x-slot>
    </x-dialog-modal>
</div>
