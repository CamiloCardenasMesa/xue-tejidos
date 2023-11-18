<div>
    <select 
        name="forum_category_id"
        class="bg-slate-800 border-1 rounded-md w-full p-3 text-white/60 text-xs capitalize mb-4"
    >
        <option value="">seleccionar categoría</option>

        @foreach ( $forumCategories as $forumCategory )
            <option 
                value="{{ $forumCategory->id }}"
                @if ($thread->forum_category_id == $forumCategory->id)
                    selected
                @endif
            >
                {{ $forumCategory->name }}
            </option>
        @endforeach
    </select>
    <input 
        type="text" 
        name="title" 
        placeholder="título"
        class="bg-slate-800 border-1 rounded-md w-full p-3 text-white/60 text-xs mb-4"
        value="{{ $thread->title }}"
    >

    <textarea 
        name="body" 
        rows="10"
        placeholder="Descripción del problema"
        class="bg-slate-800 border-1 rounded-md w-full p-3 text-white/60 text-xs mb-4"
    >{{ $thread->body }}</textarea>
</div>