<div>
    <x-button wire:click="$set('open', true)">
        {{ trans('buttons.products.create') }}
    </x-button>

    <x-dialog-modal wire:model="open">
        <x-slot name="title">
            {{ trans('products.create') }}
        </x-slot>

        <x-slot name="content">
            {{-- alert message for image loading --}}
            <div wire:loading wire:target="images"
                class="flex flex-col items-center justify-center mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-4 rounded relative">
                <strong class="font-bold">{{ trans('flashMessages.loading_image') }}</strong>
                <span class="block sm:inline">{{ trans('flashMessages.please_wait') }}</span>
            </div>

            @if ($images)
                <div
                    class="w-full flex items-center text-sm lg:text-base justify-center border-x border-t border-black/30 py-2 lg:py-2">
                    <h4>Fotos nuevas del producto</h4>
                </div>
                <div class="mb-4 border border-black/30">
                    <div class="grid grid-cols-2 gap-1 lg:grid-cols-4 w-full">
                        @foreach ($images as $index => $image)
                            <img class="object-cover" src="{{ $image->temporaryUrl() }}"
                                alt="Image {{ $index + 1 }}" />
                        @endforeach
                    </div>
                </div>
            @endif

            <div class="mb-4">
                <input type="file" wire:model="images" multiple />
                <x-input-error for="images" />
            </div>

            <div class="mb-4">
                <x-label value="{{ trans('products.name') }}" />
                <x-input wire:model="name" type="text" class="w-full" />
                <x-input-error for="name" />
            </div>

            <div class="mb-4">
                <x-label value="{{ trans('products.description') }}" />
                <x-input wire:model="description" type="text" class="w-full" />
                <x-input-error for="description" />
            </div>

            <div class="mb-4">
                <x-label value="{{ trans('products.price') }}" />
                <x-input wire:model="price" type="number" min="10000" max="1000000" class="w-full" />
                <x-input-error for="price" />
            </div>

            <div class="mb-4">
                <x-label value="{{ trans('products.stock') }}" />
                <x-input wire:model="stock" type="number" min="1" max="100" class="w-full" />
                <x-input-error for="stock" />
            </div>

            <div class="mb-4">
                <x-label value="{{ trans('categories.categories') }}" for="category" />
                <x-select wire:model="category_id" name="category" id="category">
                    <option value="">{{ trans('products.placeholders.category_option') }}</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ trans('categories.' . $category->name) }}
                        </option>
                    @endforeach
                </x-select>
                <x-input-error for="category_id" />
            </div>
            <div class="mb-4">
                <x-label value="{{ trans('products.status') }}" for="status" />
                <x-select wire:model="status" name="status" id="status">
                    <option value="">{{ trans('products.status_option') }}</option>
                    <option value="1">{{ trans('products.enabled') }}</option>
                    <option value="0">{{ trans('products.disabled') }}</option>
                </x-select>
                <x-input-error for="status" />
            </div>
            <x-label value="{{ trans('products.available_colors') }}" />
            @foreach ($colors as $color)
                <div>
                    <input type="checkbox" id="color_{{ $color->id }}" value="{{ $color->id }}"
                        wire:model="selectedColors">
                    <label for="color_{{ $color->id }}">{{ $color->name }}</label>
                </div>
            @endforeach
            <x-input-error for="selectedColors" />
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$set('open', false)">
                {{ trans('buttons.cancel') }}
            </x-secondary-button>
            <x-danger-button wire:click="save" wire:loading.attr="disabled" wire:target="save, images"
                class="disabled:opacity-25">
                {{ trans('buttons.create') }}
            </x-danger-button>
        </x-slot>
    </x-dialog-modal>
</div>
