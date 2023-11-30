<div>
    <div class="p-3 bg-gray-200 rounded-lg cursor-pointer" wire:click="$set('open', true)">
        <x-edit-icon />
    </div>

    <x-dialog-modal wire:model="open">
        <x-slot name="title">
            Editar
        </x-slot>
        <x-slot name="content">
            <div wire:loading wire:target="image"
                class="flex flex-col items-center justify-center mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-4 rounded relative">
                <strong class="font-bold">Tu imagen está cargando.</strong>
                <span class="block sm:inline">Espera un momento por favor</span>
            </div>

            @if ($image)
                <img class="mb-4" src="{{ $image->temporaryUrl() }}" alt="imagen del user">
            @else
                <img class="mb-4" src="{{ $user->avatar() }}" alt="imagen anterior del user">
            @endif

            <div class="mb-4">
                <x-label value="Nombre del usuario" />
                <x-input wire:model="user.name" type="text" class="w-full" />
                <x-input-error for="user.name" />
            </div>
            <div class="mb-4">
                <x-label value="Correo electrónico del usuario" />
                <x-input wire:model="user.email" type="text" class="w-full" />
                <x-input-error for="user.email" />
            </div>
            <div class="mb-4">
                <x-label value="Teléfono del usuario" />
                <x-input wire:model="user.phone" type="text" class="w-full" />
                <x-input-error for="user.phone" />
            </div>
            <div class="mb-4">
                <x-label value="Cumpleaños del usuario" />
                <x-input wire:model="user.birthday" type="date" class="w-full" />
                <x-input-error for="user.birthday" />
            </div>
            <div class="mb-4">
                <x-label value="Ciudad del usuario" />
                <x-input wire:model="user.city" type="text" class="w-full" />
                <x-input-error for="user.city" />
            </div>
            <div class="mb-4">
                <x-label value="País del usuario" />
                <x-input wire:model="user.country" type="text" class="w-full" />
                <x-input-error for="user.country" />
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
            <x-danger-button wire:click="save" wire:loading.attr="disabled" wire:target="save, image"
                class="disabled:opacity-25">
                Actualizar
            </x-danger-button>
        </x-slot>
    </x-dialog-modal>
</div>
