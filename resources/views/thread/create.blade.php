<x-app-layout>
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="rounded-md bg-gray-200 border border-gray-300 mb-4">
            <div class="p-4">
                <h2 class="mb-4 text-blue-600 font-semibold text-xs">
                    Preguntar a la comunidad
                </h2>
                <form action="{{ route('threads.store') }}" method="POST">
                    @csrf
                    @include('thread.form')
                    <x-button>
                        Crear Pregunta
                    </x-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>