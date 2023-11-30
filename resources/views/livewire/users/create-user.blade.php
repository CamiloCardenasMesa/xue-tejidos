<div>
    <x-button wire:click="$set('open', true)">
        Crear Usuario
    </x-button>

    <x-dialog-modal wire:model="open">
        <x-slot name="title">
            Crear nuevo usuario
        </x-slot>
        <form method="POST" action="{{ route('register') }}">
            <x-slot name="content">
                @csrf
                {{-- alert message for image loading --}}
                <div wire:loading wire:target="image"
                    class="flex flex-col items-center justify-center mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-4 rounded relative">
                    <strong class="font-bold">Tu imagen está cargando.</strong>
                    <span class="block sm:inline">Espera un momento por favor</span>
                </div>
                @if ($image)
                    <img class="mb-4" src="{{ $image->temporaryUrl() }}" alt="imagen del usuario">
                @endif

                {{-- Form fields --}}
                <div class="mb-4">
                    <x-label value="Nombre" />
                    <x-input wire:model="name" type="text" class="w-full" />
                    <x-input-error for="name" />
                </div>
                <div class="mb-4">
                    <x-label value="Correo electrónico" />
                    <x-input wire:model="email" type="email" class="w-full" />
                    <x-input-error for="email" />
                </div>
                <div class="mb-4">
                    <x-label value="Contraseña" />
                    <x-input wire:model="password" type="password" class="w-full" />
                    <x-input-error for="password" />
                </div>
                <div class="mb-4">
                    <x-label value="Confirmar contraseña" />
                    <x-input wire:model="confirmPassword" type="password" class="w-full" />
                    <x-input-error for="confirmPassword" />
                </div>
                <div class="mb-4">
                    <x-label value="Teléfono" />
                    <x-input wire:model="phone" type="text" class="w-full" />
                    <x-input-error for="phone" />
                </div>
                <div class="mb-4">
                    <x-label value="City" />
                    <x-input wire:model="city" type="text" class="w-full" />
                    <x-input-error for="city" />
                </div>
                <div class="mb-4">
                    <x-label value="Country" />
                    <x-input wire:model="country" type="text" class="w-full" />
                    <x-input-error for="country" />
                </div>
                <div class="mb-4">
                    <x-label value="Cumpleaños" />
                    <x-input wire:model="birthday" type="date" class="w-full" />
                    <x-input-error for="birthday" />
                </div>
                <div>
                    <input type="file" wire:model="image" id="{{ $imageId }}" /> {{-- id="{{ $imageId }}" resetea el input file cuando se crea el usuario --}}
                    <x-input-error for="image" />
                </div>
            </x-slot>
            <x-slot name="footer">
                <x-secondary-button wire:click.defer="$set('open', false)">
                    Cancelar
                </x-secondary-button>
                <x-danger-button wire:click="save" wire:loading.attr="disabled" wire:target="save, image"
                    class="disabled:opacity-25">
                    Crear
                </x-danger-button>
            </x-slot>
        </form>
    </x-dialog-modal>
</div>
