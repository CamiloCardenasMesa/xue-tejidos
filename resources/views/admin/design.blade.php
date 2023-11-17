<x-app-layout>
    <div class="max-w-7xl mx-auto">
        <div class="grid sm:grid-cols-2 gap-3">
            <div>
                <div class="bg-gray-200 p-4 text-4xl text-center">
                    Diseña tu tarjeta
                </div>
                <div>
                    <img src="{{ asset('sweater.jpg') }}" alt="">
                </div> 
            </div>
            <div class="bg-gray-500 p-4">
                <div class="grid grid-cols-4">
                    @for ($i = 0; $i < 40; $i++)
                        @livewire('square-grid')
                    @endfor
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
