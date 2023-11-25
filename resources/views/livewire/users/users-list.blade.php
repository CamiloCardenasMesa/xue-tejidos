<x-table>
    <div class="flex items-center justify-between gap-3 px-3 py-6">
        <x-input class="flex-1 gap-3" type="text" wire:model="search" placeholder="busca un usuario" />
        @livewire('users.create-user')
    </div>
    @if ($users->count())
        <table class="min-w-full divide-y divide-gray-200">
            <thead>
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase cursor-pointer">
                        <div class="flex items-center justify-between">
                            image
                        </div>
                    </th>
                    <th wire:click="order('name')" scope="col" class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase cursor-pointer">
                        <div class="flex items-center justify-between">
                            name and email   
                            <!-- sort -->
                            <x-sort-icon :field="'name'" :sort="$sort" :direction="$direction"/>
                        </div>
                    </th>
                    <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase">phone</th>
                    <th wire:click="order('city')" scope="col" class="px-3 py-3 text-left text-xs font-medium text-gray-500 cursor-pointer uppercase">
                        <div class="flex items-center justify-between">
                            city
                            <x-sort-icon :field="'city'" :sort="$sort" :direction="$direction"/>
                        </div>
                    </th>
                    <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase">birthday</th>
                    <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase">edit</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr class="even:bg-gray-100 odd:bg-white text-gray-700">
                        <td class="pl-6 py-3">
                            <img class="w-16 h-16 rounded-full object-cover" src="{{ $user->profile_photo_url }}" alt="{{ 'image of ' . $user->name }}">
                        </td>
                        <td class="px-3 py-4 font-bold">
                            <div>
                                {{ $user->name }}
                            </div>
                            <div class="text-xs text-gray-500 font-light">
                                {{ $user->email }}
                            </div>
                        </td>
                        <td class="px-3 py-4">
                            {{ $user->phone }}
                        </td>
                        <td class="px-3 py-4">
                            {{ $user->city }}
                        </td>
                        <td class="px-3 py-4">
                            {{ $user->birthday }}
                        </td>
                        <td class="px-3 py-4">
                            edit
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="flex text-2xl items-center justify-center px-3 pb-6">
            No se encontró ningún user, intenta con otra palabra.
        </div>
    @endif
    @if ($users->hasPages())
        <div class="px-3 py-3">
            {{ $users->links() }}
        </div>
    @endif
</x-table>   