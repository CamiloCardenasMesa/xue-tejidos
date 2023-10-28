<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Welcome') }}
        </h2>
    </x-slot>

    <div class="flex">
        <img class="w-full" src="{{ asset('storage/posts/portada.jpg') }}" alt="" >
    </div>
    <div class="flex h-96 py-16 bg-gray-200 justify-around">
        <div class="p-3 text-2xl font-bold">
            <h1>Hombre</h1>
            <img src="{{ asset('storage/posts/hombre.jpg') }}" alt="">
        </div>
        <div class="p-3 text-2xl font-bold">
            <h1>Mujer</h1>
            <img src="{{ asset('storage/posts/mujer.jpg') }}" alt="">
        </div>
        <div class="p-3 text-2xl font-bold">
            <h1>Niños</h1>
            <img src="{{ asset('storage/posts/niños.jpg') }}" alt="">
        </div>
    </div>
    <div>
        <div class="w-full h-60 bg-red-400"></div>
    </div>
</x-app-layout>
