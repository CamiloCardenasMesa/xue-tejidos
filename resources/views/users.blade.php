<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Users
        </h2>
    </x-slot>

    <div class="py-9">
        <div class="max-w-7xl mx-auto">
            @livewire('users.users-list')
        </div>
    </div>
</x-app-layout>