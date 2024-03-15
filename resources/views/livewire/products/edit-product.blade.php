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

            {{-- refactorizar esta validación de la imagen --}}
            {{-- @if ($images)
                @if ($errors->has('images'))
                    <div class="text-red-500">{{ $errors->first('images') }}</div>
                @elseif ($images->isValid() && in_array($images->getClientOriginalExtension(), ['jpg', 'jpeg', 'png']))
                    <img class="mb-4" src="{{ $image->temporaryUrl() }}" alt="Previsualización de la imagen">
                @else
                    <div class="text-red-500">{{ trans('flashMessages.image_error') }}</div>
                @endif
            @else
                <img class="mb-4" src="{{ $product->images ? Storage::url($product->images) : '' }}"
                    alt="Imagen del producto">
            @endif --}}

            <div class="mb-4">
                <input type="file" wire:model="images" multiple />
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
                @foreach($colors as $color)
                    <div>
                        <input type="checkbox" id="color_{{ $color->id }}" value="{{ $color->id }}" wire:model="selectedColors">
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
