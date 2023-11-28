<x-table>
    @if(session()->has('success'))
        <div class="bg-green-200 text-green-800 shadow-sm p-4 mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if($errorMessage)
        <div class="bg-red-200 text-red-800 shadow-sm p-4 mb-4">
            {{ $errorMessage }}
        </div>
    @endif
    <div class="flex items-center justify-between gap-3 px-6 py-6">
        <x-input class="flex-1 gap-3" type="text" wire:model="search" placeholder="busca un usuario" />
        @livewire('users.create-user')
    </div>
    @if ($users->count())
    <table class="min-w-full divide-y divide-gray-200 shadow-sm">
        <thead>
            <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                    <div class="flex items-center justify-between">
                        image
                    </div>
                </th>
                <th wire:click="order('name')" scope="col" class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase cursor-pointer">
                    <div class="flex items-center justify-between">
                        <div>
                            name and email   
                        </div>
                        <x-sort-icon :field="'name'" :sort="$sort" :direction="$direction"/>
                    </div>
                </th>
                <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                    phone
                </th>
                <th wire:click="order('city')" scope="col" class="px-3 py-3 text-left text-xs font-medium text-gray-500 cursor-pointer uppercase">
                    <div class="flex items-center justify-between">
                        city
                        <x-sort-icon :field="'city'" :sort="$sort" :direction="$direction"/>
                    </div>
                </th>
                <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                    birthday
                </th>
                <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                    edit
                </th>
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
                        <div class="text-xs text-cyan-600 font-light">
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
                    <td class="flex pl-3 pr-6 py-4 gap-2">
                        @livewire('users.edit-user', ['user' => $user], key($user->id))
                        <div class="p-3 inline-flex bg-gray-200 rounded-lg cursor-pointer" wire:click="destroy({{ $user->id }})">
                            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512">
                                <path d="M170.5 51.6L151.5 80h145l-19-28.4c-1.5-2.2-4-3.6-6.7-3.6H177.1c-2.7 0-5.2 1.3-6.7 3.6zm147-26.6L354.2 80H368h48 8c13.3 0 24 10.7 24 24s-10.7 24-24 24h-8V432c0 44.2-35.8 80-80 80H112c-44.2 0-80-35.8-80-80V128H24c-13.3 0-24-10.7-24-24S10.7 80 24 80h8H80 93.8l36.7-55.1C140.9 9.4 158.4 0 177.1 0h93.7c18.7 0 36.2 9.4 46.6 24.9zM80 128V432c0 17.7 14.3 32 32 32H336c17.7 0 32-14.3 32-32V128H80zm80 64V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16z"/>
                            </svg>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @else
        <div class="flex text-2xl items-center justify-center px-3 pb-6">
            No se encontró ningún usuario, intenta con otra palabra.
        </div>
    @endif
    @if ($users->hasPages())
        <div class="p-6">
            {{ $users->links() }}
        </div>
    @endif
</x-table>   