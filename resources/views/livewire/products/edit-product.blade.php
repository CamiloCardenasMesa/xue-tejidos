<div>
    <x-button-action action='edit' wire:click="$set('open', true)" />

    <x-dialog-modal wire:model="open">
        <x-slot name="title">
            {{ trans('products.edit') }}
        </x-slot>
        <x-slot name="content">
            <div wire:loading wire:target="image"
                class="flex flex-col items-center justify-center mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-4 rounded relative">
                <strong class="font-bold">{{ trans('products.loading_image') }}</strong>
                <span class="block sm:inline">{{ trans('products.please_wait') }}</span>
            </div>

            {{-- images --}}
            @if (count($product->images))
                <div
                    class="w-full flex items-center text-sm lg:text-base justify-center border-x border-t border-black/30 py-2 lg:py-2">
                    <h4>Fotos actuales del producto</h4>
                </div>
                <div class="mb-4 border border-black/30">
                    <div class="grid grid-cols-2 gap-1 lg:grid-cols-4 w-full">
                        @foreach ($product->images as $index => $image)
                            <div class="relative">
                                <img class="object-cover w-80 h-80" src="{{ asset('storage/' . $image) }}"
                                    alt="Image {{ $index + 1 }}">
                                <button wire:click="deleteImage({{ $index }})" type="button"
                                    class="absolute flex items-center justify-center z-10 w-8 h-8 rounded-full border border-black/30 bg-white bottom-2 left-1/2 transform -translate-x-1/2">
                                    @include('icons.trash-icon')
                                </button>
                            </div>
                        @endforeach
                    </div>
                </div>
            @else
                <div class="flex h-10 mb-4 items-center justify-center w-full border border-black/30">
                    No hay imágenes
                </div>
            @endif

            {{-- modal --}}
            @if ($confirmingImageDeletion)
                <div class="flex fixed inset-0 z-50 overflow-auto bg-gray-500/50">
                    <div
                        class="relative p-8 bg-white w-full max-w-md m-auto flex-col flex rounded-lg border border-black/30">
                        <div class="flex w-full justify-between">
                            <h3 class="text-2xl font-bold text-red-600">{{ __('Confirmar Eliminación de Imagen') }}</h3>
                            <button wire:click="$set('confirmingImageDeletion', false)"
                                class="text-3xl absolute top-0 right-2 text-gray-500">&times;</button>
                        </div>
                        <p class="my-4">
                            {{ __('¿Estás seguro de que deseas eliminar esta imagen? Esta acción no se puede deshacer.') }}
                        </p>
                        <div class="flex justify-end">
                            <button wire:click="confirmImageDeletion"
                                class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">
                                {{ __('Eliminar') }}
                            </button>
                        </div>
                    </div>
                </div>
            @endif

            @if ($images)
                <div
                    class="w-full flex items-center text-sm lg:text-base justify-center border-x border-t border-black/30 py-2 lg:py-2">
                    <h4>Fotos nuevas del producto</h4>
                </div>
                <div class="border border-black/30">
                    <div class="grid grid-cols-2 gap-1 lg:grid-cols-4 w-full">
                        @foreach ($images as $index => $image)
                            <img class="object-cover" src="{{ $image->temporaryUrl() }}"
                                alt="Image {{ $index + 1 }}" />
                        @endforeach
                    </div>
                </div>
            @endif

            @if (count($images))
                <div class="flex justify-end">
                    <button class="px-4 py-2 mb-2 bg-red-500 text-white rounded hover:bg-red-600"
                        wire:click="$set('images', [])">Cancelar</button>
                </div>
            @endif

            <div class="mb-4">
                <input type="file" wire:model="images" multiple
                    @if (count($images)) hidden disabled @endif />
                <x-input-error for="images" />
            </div>

            <div class="mb-4">
                <x-label value="{{ trans('products.name') }}" />
                <x-input wire:model="product.name" type="text" class="w-full" />
                <x-input-error for="product.name" />
            </div>

            <div class="mb-4">
                <x-label value="{{ trans('products.description') }}" />
                <x-input wire:model="product.description" type="text" class="w-full" />
                <x-input-error for="product.description" />
            </div>

            <div class="mb-4">
                <x-label value="{{ trans('products.price') }}" />
                <x-input wire:model="product.price" type="number" class="w-full" />
                <x-input-error for="product.price" />
            </div>

            <div class="mb-4">
                <x-label value="{{ trans('products.stock') }}" />
                <x-input wire:model="product.stock" type="number" class="w-full" />
                <x-input-error for="product.stock" />
            </div>

            <div class="mb-4">
                <x-label value="{{ trans('categories.categories') }}" for="category" />
                <x-select wire:model="product.category_id" name="status" id="category">
                    <option value="">{{ trans('products.placeholders.category_option') }}</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ trans('categories.' . $category->name) }}</option>
                    @endforeach
                </x-select>
                <x-input-error for="product.category_id" />
            </div>

            <div class="mb-4">
                <x-label value="{{ trans('products.status') }}" for="status" />
                <x-select wire:model="product.status" name="status" id="status">
                    <option value="">{{ trans('products.status_option') }}</option>
                    <option value="1">{{ trans('products.enabled') }}</option>
                    <option value="0">{{ trans('products.disabled') }}</option>
                </x-select>
                <x-input-error for="product.status" />
            </div>
            <div>
                <x-label value="{{ trans('products.available_colors') }}" />
                @foreach ($colors as $color)
                    <div>
                        <input type="checkbox" id="color_{{ $color->id }}" value="{{ $color->id }}"
                            wire:model="selectedColors">
                        <label for="color_{{ $color->id }}">{{ $color->name }}</label>
                    </div>
                @endforeach
                <x-input-error for="selectedColors" />
            </div>

        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$set('open', false)">
                {{ trans('buttons.cancel') }}
            </x-secondary-button>
            <x-danger-button wire:click="save" wire:loading.attr="disabled" wire:target="save, images"
                class="disabled:opacity-25">
                {{ trans('buttons.update') }}
            </x-danger-button>
        </x-slot>
    </x-dialog-modal>
</div>
