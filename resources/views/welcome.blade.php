<x-guest-layout>
    @include('navigation-menu')
    <header class="h-screen">
        <div class="relative flex justify-center items-center">
            <div class="h-screen">
                <img class="cover opacity-5" src="{{ asset('storage/images/guest/header.jpg') }}" alt="gorros tejidos">
            </div>
            <x-button class="absolute">
                Accede a los descuentos
            </x-button>
        </div>
    </header>
    <main>
        <section>
            <div class="grid grid-cols-3 gap-1 my-3">
                <div class="bg-red-200 h-[728px]"></div>
                <div class="bg-green-300 h-[728px]"></div>
                <div class="bg-blue-500 h-[728px]"></div>
            </div>
        </section>
    </main>
</x-guest-layout>
