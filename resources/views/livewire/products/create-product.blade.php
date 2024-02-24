<div>
    <x-button wire:click="$set('open', true)">
        Crear producto
    </x-button>

    <x-dialog-modal wire:model="open">
        <x-slot name="title">
            Crear Nuevo producto
        </x-slot>

        <x-slot name="content">
            {{-- alert message for image loading --}}
            <div wire:loading wire:target="image"
                class="flex flex-col items-center justify-center mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-4 rounded relative">
                <strong class="font-bold">Tu imagen está cargando.</strong>
                <span class="block sm:inline">Espera un momento por favor</span>
            </div>

            @if ($image)
                <img class="mb-4" src="{{ $image->temporaryUrl() }}" alt="imagen del producto">
            @endif

            <div class="mb-4">
                <input type="file" wire:model="image" />
                <x-input-error for="image" />
            </div>

            <div class="mb-4">
                <x-label value="Nombre" />
                <x-input wire:model="name" type="text" class="w-full" />
                <x-input-error for="name" />
            </div>

            <div class="mb-4">
                <x-label value="Descripcion" />
                <x-input wire:model="description" type="text" class="w-full" />
                <x-input-error for="description" />
            </div>

            <div class="mb-4">
                <x-label value="Precio" />
                <x-input wire:model="price" type="number" min="10000" max="1000000" class="w-full" />
                <x-input-error for="price" />
            </div>

            <div class="mb-4">
                <x-label value="Stock" />
                <x-input wire:model="stock" type="number" min="1" max="100" class="w-full" />
                <x-input-error for="stock" />
            </div>

            <div class="mb-4">
                <x-label value="Categoria" for="category" />
                <select wire:model="category_id" name="category" id="category" class="w-full">
                    <option value="">Selecciona una categoría</option>
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                <x-input-error for="category_id" />
            </div>

            <div class="mb-4">
                <x-label value="Estado" for="enable" />
                <select wire:model="enable" name="enable" id="enable" class="w-full">
                    <option value="">Selecciona una opción</option>
                    <option value="1">Activo</option>
                    <option value="0">Inactivo</option>
                </select>
                <x-input-error for="enable" />
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$set('open', false)">
                Cancelar
            </x-secondary-button>
            <x-danger-button wire:click="save" wire:loading.attr="disabled" wire:target="save, image" class="disabled:opacity-25">
                Crear
            </x-danger-button>
        </x-slot>
    </x-dialog-modal>
</div>
