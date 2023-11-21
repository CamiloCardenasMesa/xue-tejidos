<x-app-layout>
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="rounded-md bg-gradient-to-r from-slate-800 to-slate-900 mb-4">
            <div class="p-4">
                <h2 class="mb-4 text-blue-600 font-semibold text-xs">
                    Editar Pregunta
                </h2>
                <form action="{{ route('threads.update', $thread ) }}" method="POST">
                    @csrf
                    @method('PUT')

                    @include('thread.form')

                    <input 
                        type="submit" 
                        value="Editar pregunta" 
                        class="w-full py-4 bg-gradient-to-r from-blue-600 to-blue-700 hover:to-blue--600 text-white/90 font-bold rounded-md"
                    >
                </form>
            </div>
        </div>
    </div>
</x-app-layout>