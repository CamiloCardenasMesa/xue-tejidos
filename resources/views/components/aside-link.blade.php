@props(['active'])

@php
    $classes =
        $active ?? false
            ? 'bg-black inline-flex items-center font-medium text-white focus:outline-none transition duration-150 ease-in-out'
            : 'bg-gray-100 inline-flex items-center font-medium text-[#666666] hover:text-gray-100 hover:bg-[#666666] focus:outline-none transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    <div class="flex gap-2 pl-9 pr-12 py-4">
        {{ $slot }}
    </div>
</a>
