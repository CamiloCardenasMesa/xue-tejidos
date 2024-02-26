<div>
    <x-button wire:click="$set('open', true)">
        {{ trans('buttons.users.create') }}
    </x-button>

    <x-dialog-modal wire:model="open">
        <x-slot name="title">
            {{ trans('users.create') }}
        </x-slot>
        <form method="POST" action="{{ route('register') }}">
            <x-slot name="content">
                @csrf
                {{-- Form fields --}}
                <div class="mb-4">
                    <x-label value="{{ trans('users.name') }}" />
                    <x-input wire:model="name" type="text" class="w-full" />
                    <x-input-error for="name" />
                </div>
                <div class="mb-4">
                    <x-label value="{{ trans('users.email') }}" />
                    <x-input wire:model="email" type="email" class="w-full" />
                    <x-input-error for="email" />
                </div>
                <div class="mb-4">
                    <x-label value="{{ trans('users.password') }}" />
                    <x-input wire:model="password" type="password" class="w-full" />
                    <x-input-error for="password" />
                </div>
                <div class="mb-4">
                    <x-label value="{{ trans('users.password_confirm') }}" />
                    <x-input wire:model="confirmPassword" type="password" class="w-full" />
                    <x-input-error for="confirmPassword" />
                </div>
                <div class="mb-4">
                    <x-label value="{{ trans('users.phone') }}" />
                    <x-input wire:model="phone" type="text" class="w-full" />
                    <x-input-error for="phone" />
                </div>
                <div class="mb-4">
                    <x-label value="{{ trans('users.city') }}" />
                    <x-input wire:model="city" type="text" class="w-full" />
                    <x-input-error for="city" />
                </div>
                <div class="mb-4">
                    <x-label value="{{ trans('users.address') }}" />
                    <x-input wire:model="address" type="text" class="w-full" />
                    <x-input-error for="address" />
                </div>
                <div class="mb-4">
                    <x-label value="{{ trans('users.country') }}" />
                    <x-input wire:model="country" type="text" class="w-full" />
                    <x-input-error for="country" />
                </div>
                <div class="mb-4">
                    <x-label value="{{ trans('users.birthday') }}" />
                    <x-input wire:model="birthday" type="date" class="w-full" />
                    <x-input-error for="birthday" />
                </div>
            </x-slot>
            <x-slot name="footer">
                <x-secondary-button wire:click.defer="$set('open', false)">
                    {{ trans('buttons.cancel') }}
                </x-secondary-button>
                <x-danger-button wire:click="save" wire:loading.attr="disabled" wire:target="save"
                    class="disabled:opacity-25">
                    {{ trans('buttons.create') }}
                </x-danger-button>
            </x-slot>
        </form>
    </x-dialog-modal>
</div>
