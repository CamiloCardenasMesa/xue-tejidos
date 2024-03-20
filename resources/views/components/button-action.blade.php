@props(['action' => ''])

<button
    {{ $attributes->merge(['class' => 'ml-3 p-3 bg-none border border-[#666666] active:bg-gray-400 hover:bg-gray-200 cursor-pointer']) }}>
    @if ($action == 'edit')
        @include('icons.edit-icon')
    @elseif ($action == 'delete')
        @include('icons.delete-icon')
    @endif
</button>
