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
            <div wire:loading wire:target="image"
                class="flex flex-col items-center justify-center mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-4 rounded relative">
                <strong class="font-bold">{{ trans('flashMessages.loading_image') }}</strong>
                <span class="block sm:inline">{{ trans('flashMessages.please_wait') }}</span>
            </div>

            @if ($image)
                <img class="mb-4" src="{{ $image->temporaryUrl() }}" alt="{{ trans('products.alt_attributes.image') }}">
            @endif

            <div class="mb-4">
                <input type="file" wire:model="image" />
                <x-input-error for="image" />
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
                <select wire:model="category_id" name="category" id="category" class="w-full">
                    <option value="">{{ trans('products.placeholders.category_option') }}</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ trans('categories.' . $category->name) }}
                        </option>
                    @endforeach
                </select>
                <x-input-error for="category_id" />
            </div>

            <div class="mb-4">
                <x-label value="{{ trans('products.status') }}" for="status" />
                <select wire:model="status" name="status" id="status" class="w-full">
                    <option value="">{{ trans('products.status_option') }}</option>
                    <option value="1">{{ trans('products.enabled') }}</option>
                    <option value="0">{{ trans('products.disabled') }}</option>
                </select>
                <x-input-error for="status" />
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$set('open', false)">
                {{ trans('buttons.cancel') }}
            </x-secondary-button>
            <x-danger-button wire:click="save" wire:loading.attr="disabled" wire:target="save, image"
                class="disabled:opacity-25">
                {{ trans('buttons.create') }}
            </x-danger-button>
        </x-slot>
    </x-dialog-modal>
</div>
