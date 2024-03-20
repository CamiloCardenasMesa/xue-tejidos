<x-table>
    {{-- delete user message --}}
    @if ($errorMessage)
        <div class="bg-red-200 text-red-800 shadow-sm p-4 mb-4">
            {{ $errorMessage }}
        </div>
    @endif

    {{-- search bar --}}
    <div class="flex items-center p-3 lg:p-6 gap-2">
        <x-input class="flex-1" type="text" wire:model="search" placeholder="{{ trans('users.placeholders.search') }}" />
        <livewire:users.create-user />
    </div>

    {{-- table --}}
    @if ($users->count())
        <section class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200 shadow-sm">
                <thead>
                    <tr>
                        <th scope="col" class="px-7 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                            <div class="flex items-center justify-between">
                                {{ trans('users.image') }}
                            </div>
                        </th>
                        <th wire:click="order('name')" scope="col"
                            class="p-3 text-left text-xs font-medium text-gray-500 uppercase cursor-pointer">
                            <div class="flex items-center justify-between">
                                <div>
                                    {{ trans('users.name') . '-' . trans('users.email') }}
                                </div>
                                <x-sort-icon :field="'name'" :sort="$sort" :direction="$direction" />
                            </div>
                        </th>
                        <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                            {{ trans('users.phone') }}
                        </th>
                        <th wire:click="order('city')" scope="col"
                            class="px-3 py-3 text-left text-xs font-medium text-gray-500 cursor-pointer uppercase">
                            <div class="flex items-center justify-between">
                                {{ trans('users.city') }}
                                <x-sort-icon :field="'city'" :sort="$sort" :direction="$direction" />
                            </div>
                        </th>
                        <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                            {{ trans('users.address') }}
                        </th>
                        <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                            {{ trans('users.actions') }}
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr class="even:bg-gray-100 odd:bg-white text-gray-700">
                            <td class="py-2 lg:py-4 pl-3 md:p-3 lg:px-6">
                                <img class="w-16 h-16 rounded-full object-cover" src="{{ $user->profile_photo_url }}"
                                    alt="{{ 'image of ' . $user->name }}">
                            </td>
                            <td class="px-3 font-bold">
                                <div>
                                    {{ $user->name }}
                                </div>
                                <div class="text-xs text-cyan-600 font-light">
                                    {{ $user->email }}
                                </div>
                            </td>
                            <td class="px-3">
                                {{ $user->phone }}
                            </td>
                            <td class="px-3">
                                {{ $user->city }}
                            </td>
                            <td class="px-3 py-2">
                                {{ $user->address }}
                            </td>
                            <td class="p-3 lg:pr-6">
                                <section class="flex items-center">
                                    @livewire('users.edit-user', ['user' => $user], key($user->id))
                                    <x-button-action action="delete"
                                        wire:click="$emit('destroy', {{ $user->id }})" />
                                </section>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
    @else
        <div class="flex text-2xl items-center justify-center px-3 pb-6">
            {{ trans('users.failed_search') }}
        </div>
    @endif
    @if ($users->hasPages())
        <div class="p-6 border-t">
            {{ $users->links() }}
        </div>
    @endif
</x-table>

@push('modals')
    <script>
        window.addEventListener('delete', event => {
            const userId = event.detail.userId;

            Swal.fire({
                title: "{{ trans('users.flash_message.delete_question') }}",
                text: "{{ trans('flashMessages.delete_alert') }}",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "{{ trans('flashMessages.delete_confirm') }}"
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emit('deleteUser', userId);
                    Swal.fire({
                        title: "{{ trans('flashMessages.delete_confirmed') }}",
                        text: "{{ trans('users.flash_message.successfully_deleted') }}",
                        icon: "success"
                    });
                }
            });
        });
    </script>
@endpush
