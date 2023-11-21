<div>
    <select 
        name="forum_category_id"
        class="bg-white border border-gray-300 rounded-md w-full p-3 text-slate/60 text-xs capitalize mb-4"
    >
        <option class="text-slate/60">seleccionar categoría</option>

        @foreach ( $forumCategories as $forumCategory )
            <option 
                value="{{ $forumCategory->id }}"
                @if ( old('forum_category_id', $thread->forum_category_id) == $forumCategory->id)
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
        class="bg-white border border-gray-300 rounded-md w-full p-3 text-slate/60 text-xs mb-4"
        value="{{ old('title', $thread->title) }}"
    >

    <textarea 
        name="body" 
        rows="10"
        placeholder="Descripción"
        class="bg-white border border-gray-300 rounded-md w-full p-3 text-slate/60 text-xs mb-4"
    >{{ old('body', $thread->body ) }}</textarea>
</div>