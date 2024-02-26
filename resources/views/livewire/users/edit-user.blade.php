<div>
    <div class="p-3 bg-gray-200 rounded-lg cursor-pointer" wire:click="$set('open', true)">
        <x-edit-icon />
    </div>

    <x-dialog-modal wire:model="open">
        <x-slot name="title">
            {{ trans('users.edit') }}
        </x-slot>
        <x-slot name="content">

            @if ($image)
                <img class="mb-4" src="{{ $image->temporaryUrl() }}" alt="imagen del usuario">
            @else
                <img class="mb-4" src="{{ $user->avatar() }}" alt="imagen actual del usuario">
            @endif

            <div class="mb-4">
                <x-label value="{{ trans('users.name') }}" />
                <x-input wire:model="user.name" type="text" class="w-full" />
                <x-input-error for="user.name" />
            </div>
            <div class="mb-4">
                <x-label value="{{ trans('users.email') }}" />
                <x-input wire:model="user.email" type="text" class="w-full" />
                <x-input-error for="user.email" />
            </div>
            <div class="mb-4">
                <x-label value="{{ trans('users.phone') }}" />
                <x-input wire:model="user.phone" type="text" class="w-full" />
                <x-input-error for="user.phone" />
            </div>
            <div class="mb-4">
                <x-label value="{{ trans('users.birthday') }}" />
                <x-input wire:model="user.birthday" type="date" class="w-full" />
                <x-input-error for="user.birthday" />
            </div>
            <div class="mb-4">
                <x-label value="{{ trans('users.city') }}" />
                <x-input wire:model="user.city" type="text" class="w-full" />
                <x-input-error for="user.city" />
            </div>
            <div class="mb-4">
                <x-label value="{{ trans('users.country') }}" />
                <x-input wire:model="user.country" type="text" class="w-full" />
                <x-input-error for="user.country" />
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-secondary-button wire:click="$set('open', false)">
                {{ trans('buttons.cancel') }}
            </x-secondary-button>
            <x-danger-button wire:click="save" wire:loading.attr="disabled" wire:target="save"
                class="disabled:opacity-25">
                {{ trans('buttons.update') }}
            </x-danger-button>
        </x-slot>
    </x-dialog-modal>
</div>
