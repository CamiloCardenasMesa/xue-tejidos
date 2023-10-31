<div>
    <x-button wire:click="$set('open', true)">
        Crear nuevo post
    </x-button>

    <x-dialog-modal wire:model="open">
        <x-slot name="title">
            Crear nuevo post
        </x-slot>
        <x-slot name="content">
            <div wire:loading wire:target="image"
                class="flex flex-col items-center justify-center mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-4 rounded relative">
                <strong class="font-bold">Tu imagen está cargando.</strong>
                <span class="block sm:inline">Espera un momento por favor</span>
            </div>
            @if ($image)
                <img class="mb-4" src="{{ $image->temporaryUrl() }}" alt="imagen del post">
            @endif
            <div class="mb-4">
                <x-label value="título del post" />
                <x-input wire:model="title" type="text" class="w-full" />
                <x-input-error for="title" />
            </div>
            <div class="mb-4" wire:ignore> <!--wire:ignore evita que cuando cambie cuando se vuelva a renderizar la página -->
                <x-label value="Contenido del post" />
                <textarea wire:model="content" class="w-full" id="editor" rows="6"></textarea>
                <x-input-error for="content" />
            </div>
            <div>
                <input type="file" wire:model="image" />
                <x-input-error for="image" />
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-secondary-button wire:click="$set('open', false)">
                Cancelar
            </x-secondary-button>
            <x-danger-button wire:click="save" wire:loading.attr="disabled" wire:target="save, image"
                class="disabled:opacity-25">
                Crear
            </x-danger-button>
        </x-slot>
    </x-dialog-modal>
    @push('js')
        <script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script> 

        <script>
            ClassicEditor
                .create( document.querySelector( '#editor' ) )
                .then(function(editor){
                    editor.model.document.on('change:data', () => {
                        @this.set('content', editor.getData());
                    })
                })
                .catch( error => {
                    console.error( error );
                } );
        </script>   
    @endpush
</div>
